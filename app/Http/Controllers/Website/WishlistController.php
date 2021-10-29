<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()){
            return redirect()->route('home');
        }
        $user = Auth::guard('web')->user();
        $wishlist = $user->wishlists()->get();

        return view('website.wishlist')->with([
            'wishlist' => $wishlist,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user_id = Auth::guard('web')->id();
        $product_id = $request->product_id;
        if (is_null($request->is_fav))
        {
            Wishlist::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
            ]);
        }else{
            Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->delete();
        }

        return redirect()->route('website.products.index');
    }

    public function destroy($id)
    {
        $user_id = Auth::guard('web')->id();
        $product_id = $id;
        Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->delete();
        return redirect()->route('website.wishlist.index')->with([
            'success' => 'Deleted Successfully'
        ]);
    }

}
