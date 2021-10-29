<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('website.categories.index')->with([
            'categories' => $categories,
        ]);
    }

    public function show($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('category_id', $category->id)->latest()->paginate(12);
        $category['products'] = $products;
        return view('website.categories.show')->with([
            'category' => $category,
        ]);
    }
}
