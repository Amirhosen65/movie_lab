<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function category(){
        $categories = Category::whereNull('category_id')->latest()->get();
        return view('dashboard.category.index', compact('categories'));
    }

    public function categoryAdd(Request $request){
        $request->validate([
            'name' => 'required|unique:categories|string|max:50',
        ], [
            'name.required' => 'Please insert category name.',
        ]);
        $slug = Str::slug($request->name);
                $originalSlug = $slug;
                $count = 1;

                while (Category::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }
        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'status' => $request->status,
            'created_at' => \Carbon\Carbon::now(),
        ]);
        return back()->with('success', 'New Category added successfully!');
    }

    public function categoryEdit(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $category = Category::find($id);
        if($request->category_id){
            $category->category_id = $request->category_id;
        }
        $category->name = $request->name;
        $category->status = $request->status;
        $category->updated_at = now();
        $category->save();

        return back()->with('success', 'Category updated successfully!');
    }

    public function subCategory(){
        $pageTitle = 'Sub Category';
        $subCategories = Category::whereNotNull('category_id')->latest()->get();
        $categories = Category::whereNull('category_id')->latest()->get();
        return view('dashboard.category.subCate', compact('subCategories', 'categories', 'pageTitle'));
    }

    public function categoryDelete($id){
        Category::find($id)->delete();
        return back()->with('success', 'Category deleted successfully!');
    }

    public function subCategoryAdd(Request $request){
        $request->validate([
            'name' => 'required|unique:categories|string|max:50',
            'category_id' => 'required',
        ], [
            'name.required' => 'Please insert sub category name.',
        ]);
        $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;

            while (Category::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'created_at' => \Carbon\Carbon::now(),
        ]);
        return back()->with('success', 'New Sub Category added successfully!');
    }

    public function tagAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        $tag = Tag::create([
            'name' => $request->name,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'tag' => $tag]);
        }

        return back()->with('success', 'Tag created successfully!');
    }

}
