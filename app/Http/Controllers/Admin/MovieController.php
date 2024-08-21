<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Movie;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function movies(){
        $movies = Movie::latest()->get();
        $pageTitle = "Movie List";
        return view('dashboard.movies.index', compact('movies', 'pageTitle'));
    }

    public function movieAdd(){
        $pageTitle = "Add New Movie";
        $categories = Category::whereNull('category_id')->latest()->get();
        $subCategories = Category::whereNotNull('category_id')->latest()->get();
        $tags = Tag::all();
        $languages = Language::all();
        $genres = Genre::all();
        return view('dashboard.movies.insert',
        compact('pageTitle', 'categories', 'subCategories', 'tags', 'languages', 'genres'));
    }

    public function movieSave(Request $request){
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required',
            'description' => 'required',
            'short_desc' => 'required|max:350',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'language' => 'required|string',
            'rating' => 'required|string',
            'version' => 'required|string',
            'tags.*' => 'exists:tags,id',
            'download_titles.*' => 'string',
            'download_links.*' => 'url',
        ]);

        try {
            $image = $request->file('image');
            $image_name = 'Poster' .'-'. microtime().".".$image->getClientOriginalExtension();
            $image_path = 'uploads/movies/' . $image_name;
            $image->move('uploads/movies/', $image_name);

            $banner = $request->file('banner');
            $banner_name = 'Banner' .'-'. microtime().".".$banner->getClientOriginalExtension();
            $banner_path = 'uploads/movies/' . $banner_name;
            $banner->move('uploads/movies/', $banner_name);

            $content = $request->description;

                if (extension_loaded('tidy')) {
                    $tidy = new \tidy();
                    $tidy->parseString($content, [
                        'indent' => true,
                        'output-xhtml' => true,
                        'wrap' => 200
                    ], 'utf8');
                    $tidy->cleanRepair();
                    $content = $tidy->value;
                }

                $dom = new \DomDocument();
                @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

                $imageFile = $dom->getElementsByTagName('img');
                foreach($imageFile as $item => $image) {
                    $data = $image->getAttribute('src');
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);
                    $imgeData = base64_decode($data);
                    $image_name = "/uploads/movie_contents/" . time() . $item . '.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imgeData);

                    $image->removeAttribute('src');
                    $image->setAttribute('src', $image_name);
                }

                $content = $dom->saveHTML();

                // Generate a unique slug
                $slug = Str::slug($request->title);
                $originalSlug = $slug;
                $count = 1;

                while (Movie::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }

                $downloadLinks = [];
                foreach ($request->download_titles as $key => $title) {
                    $downloadLinks[] = [
                        'title' => $title,
                        'link' => $request->download_links[$key],
                    ];
                }

                $movie = Movie::create([
                'title' => $request->title,
                'slug' => $slug,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'genre' => $request->genre,
                'description' => $content,
                'short_desc' => $request->short_desc,
                'image' => $image_path,
                'banner' => $banner_path,
                'language' => $request->language,
                'rating' => $request->rating,
                'director' => $request->director,
                'casts' => $request->casts,
                'version' => $request->version,
                'download_links' => json_encode($downloadLinks),
                'release_date' => $request->release_date,
                'trailer' => $request->trailer,
                'status' => $request->status,
                'feature' => $request->feature,
                'created_at' => now(),
            ]);
            $movie->MovieRelationTags()->attach($request->tags);
            $movie->save();

            return back()->with('success', 'New Movie added successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function movieEdit($id){
        $pageTitle = "Movie Edit";
        $movie = Movie::find($id);
        $categories = Category::whereNull('category_id')->latest()->get();
        $subCategories = Category::whereNotNull('category_id')->latest()->get();
        $tags = Tag::all();
        $languages = Language::all();
        $genres = Genre::all();
        return view('dashboard.movies.edit',
        compact('movie', 'pageTitle', 'categories', 'subCategories', 'tags', 'languages', 'genres')
        );
    }

    public function movieUpdate(Request $request, $id){
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required',
            'description' => 'required',
            'short_desc' => 'required|max:350',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048|nullable',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048|nullable',
            'language' => 'required|string',
            'rating' => 'required|string',
            'version' => 'required|string',
            'tags.*' => 'exists:tags,id',
            'download_titles.*' => 'string',
            'download_links.*' => 'url',
        ]);
        $movie = Movie::find($id);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = 'Poster' .'-'. microtime().".".$image->getClientOriginalExtension();
            $image_path = 'uploads/movies/' . $image_name;
            $image->move('uploads/movies/', $image_name);

            // Delete the old image
            if ($movie->image) {
                $oldImagePath = base_path($movie->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $movie->image = $image_path;
        }
        if($request->hasFile('banner')){
            $banner = $request->file('banner');
            $banner_name = 'Banner' .'-'. microtime().".".$banner->getClientOriginalExtension();
            $banner_path = 'uploads/movies/' . $banner_name;
            $banner->move('uploads/movies/', $banner_name);

            // Delete the old image
            if ($movie->banner) {
                $oldbannerPath = base_path($movie->banner);
                if (file_exists($oldbannerPath)) {
                    unlink($oldbannerPath);
                }
            }
            $movie->banner = $banner_path;
        }

        $content = $request->description;

        if (extension_loaded('tidy')) {
            $tidy = new \tidy();
            $tidy->parseString($content, [
                'indent' => true,
                'output-xhtml' => true,
                'wrap' => 200
            ], 'utf8');
            $tidy->cleanRepair();
            $content = $tidy->value;
        }

        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $imageFile = $dom->getElementsByTagName('img');
        foreach($imageFile as $item => $image) {
            $data = $image->getAttribute('src');

            // Ensure the data URL is properly formatted
            if (strpos($data, ';') !== false && strpos($data, ',') !== false) {
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name = "/uploads/movie_contents/" . time() . $item . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }
        }

        $content = $dom->saveHTML();

        $downloadLinks = [];
        foreach ($request->download_titles as $key => $title) {
            $downloadLinks[] = [
                'title' => $title,
                'link' => $request->download_links[$key],
            ];
        }

        $movie->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'genre' => $request->genre,
            'description' => $content,
            'short_desc' => $request->short_desc,
            'language' => $request->language,
            'rating' => $request->rating,
            'director' => $request->director,
            'casts' => $request->casts,
            'version' => $request->version,
            'download_links' => json_encode($downloadLinks),
            'release_date' => $request->release_date,
            'trailer' => $request->trailer,
            'status' => $request->status,
            'feature' => $request->feature,
            'updated_at' => now(),
        ]);
        $movie->MovieRelationTags()->sync($request->tags);
        $movie->save();
        return redirect()->route('admin.movies')->with('success', 'Movie updated successfully!');
    }

    public function movieDelete($id)
    {
        $movie = Movie::find($id);
        if (!$movie) {
            return response()->json(['success' => false, 'message' => 'Movie not found'], 404);
        }

        if ($movie->image) {
            $oldImagePath = public_path('uploads/movies/' . $movie->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        if ($movie->banner) {
            $oldImagePath = public_path('uploads/movies/' . $movie->banner);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Parse the description to find and delete images
        $content = $movie->description;
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $imageFile = $dom->getElementsByTagName('img');
        foreach ($imageFile as $image) {
            $src = $image->getAttribute('src');
            if (file_exists(public_path('uploads/movie_contents/' . $src))) {
                unlink(public_path('uploads/movie_contents/' . $src));
            }
        }

        $movie->delete();

        return response()->json(['success' => true, 'message' => 'Movie deleted successfully!']);
    }

    public function status($id)
{
    $movie = Movie::find($id);

    $movie->update([
        'status' => !$movie->status,
        'updated_at' => now(),
    ]);

    return response()->json(['success_alert' => true, 'status' => $movie->status]);
}

public function feature($id)
{
    $movie = Movie::find($id);

    $movie->update([
        'feature' => !$movie->feature, 
        'updated_at' => now(),
    ]);

    return response()->json(['success_alert' => true, 'feature' => $movie->feature]);
}


}
