<?php

namespace App\View\Composers;

use App\Http\Traits\CartTrait;
use Illuminate\View\View;

class CartComposer
{
    use CartTrait;
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('cart', $this->getCart());
    }
}
