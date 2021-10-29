<?php

namespace App\Listeners;

use App\Http\Traits\CartTrait;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreUserIdInCart
{
    use CartTrait;
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        foreach ($this->getCart() as $item)
        {
            $item->user_id = $event->user->id;
            $item->update();
        }
    }
}
