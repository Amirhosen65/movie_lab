<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

    public function index(){
        $pageTitle = 'Home';
        $movies = Movie::where('status', true)->latest()->paginate(10);
        return view('frontend.index', compact('movies', 'pageTitle'));
    }

    public function movieDetails($slug){
        $movie = Movie::where('slug', $slug)->firstOrFail();
        if($movie){
            Movie::where('slug', $slug)->update(["visitor"=> $movie->visitor + 1]);
        }
        $pageTitle = $movie->title;
        $relatedMovies = Movie::where('category_id', $movie->category_id)->latest()->paginate(10);
        return view('frontend.movie_details', compact('movie', 'relatedMovies', 'pageTitle'));
    }

    public function search(Request $request){
        $keyword = $request->keword;
        $movies = Movie::where('status', true)->where("title","LIKE","%".$keyword."%")->latest()->paginate(10);
        $pageTitle = 'Search Result: ' . $request->keword;
        return view('frontend.movie_list', compact('movies', 'keword', 'pageTitle'));
    }

    public function cateMovie($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();
        $movies = Movie::where('category_id', $category->id)->get();
        $pageTitle = $category->name . ' Movies';
        return view('frontend.movie_list', compact('movies', 'pageTitle'));
    }

    public function genreMovie($slug) {
        $genre = Genre::where('slug', $slug)->firstOrFail();
        $movies = Movie::where('genre', $genre->id)->get();
        $pageTitle = $genre->name . ' Movies';
        return view('frontend.movie_list', compact('movies', 'pageTitle'));
    }

}
