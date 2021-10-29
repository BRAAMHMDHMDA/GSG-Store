<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::whereNull('parent_id')->with('children:id,name,parent_id')->get(['id', 'name']);
        $brands = Brand::latest()->get(['id', 'name']);
        $per_page = $request->per_page ? "$request->per_page" : "12";
//        dd(wishlist::where('user_id', \Auth::id())->pluck('product_id'));
        $products = Product::latest()->paginate($per_page);
        if (Auth::check())
        {
            $fav_products = Auth::user()->wishlists()->select('id')->pluck('id')->toArray();
            foreach ($products as $product){
                if (in_array($product->id, $fav_products)){
                    $product['is_fav'] = true;
                }
            }
        }


        return view('website.products.index')->with([
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('website.products.show')->with([
            'product' => $product,
        ]);
    }

    public function quickview($id)
    {
        return view('website.ajax.quickview')->with([
            'product' => Product::where('id', $id)->firstOrFail(),
        ]);
    }
}
