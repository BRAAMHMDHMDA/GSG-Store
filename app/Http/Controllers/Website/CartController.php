<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Traits\CartTrait;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    use CartTrait;
    public function show()
    {
        return view('website.shopping-proccess.cart');
    }


    public function store(Request $request)
    {

        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['nullable', 'int', function($attr, $value, $fail) {
                $id = request()->input('product_id');
                $product = Product::findOrFail($id);
                if ($value > $product->quantity) {
                    $fail(__('Quantity greater than quantity in stock.'));
                }
            }],
        ]);

        is_null($request->quantity)? $qty=1 : $qty= $request->quantity ;
        $cart = Cart::updateOrCreate([
            'cookie_id' => $this->getCookieId(),
            'product_id' => $request->input('product_id'),
        ], [
            'quantity' => DB::raw('quantity + ' . $qty),
        ]);

        if ($request->expectsJson())
        {
            $cart= $this->getCart();
            $cart['total'] = $this->total();
            $cart['quantity'] = $this->quantity();
            return $cart;
        }

        return redirect()->back()->with([
           'success' => 'Item Added To Cart!'
        ]);
    }





    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    protected function getCookieId()
    {
        $id = Cookie::get('cart_cookie_id');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_cookie_id', $id, 60 * 24 * 30 * 6); // 6 months
        }

        return $id;
    }

}
