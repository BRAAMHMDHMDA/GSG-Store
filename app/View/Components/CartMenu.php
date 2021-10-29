<?php

namespace App\View\Components;

use App\Http\Traits\CartTrait;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CartMenu extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('website.shopping-proccess.cart-menu');
    }
}
