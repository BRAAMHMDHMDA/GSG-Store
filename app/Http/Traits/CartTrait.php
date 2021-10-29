<?php

namespace App\Http\Traits;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

trait CartTrait {

    protected $cart;

    public function getCart() {
        if (!$this->cart) {
            $this->cart = Cart::where('cookie_id', $this->getCookieId())
                ->orWhere('user_id', Auth::id())
                ->get();
            $this->cart->total = $this->total();
            $this->cart->quantity = $this->quantity();
            $this->cart->is_empty = $this->quantity()==0? true:false;
        }
        return $this->cart;
    }
    public function cart_destroy()
    {
        foreach ($this->getCart() as $cart)
        {
            $cart->delete();
        }
    }
    protected function quantity()
    {
        $cart = $this->getCart();
        return $cart->sum('quantity');
    }
    protected function total()
    {
        $total = $this->cart->sum(function ($item){
            return $item->quantity * $item->product->price;
        });
        return $total;
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
