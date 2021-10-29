<?php

namespace App\Http\Controllers\Website;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Traits\CartTrait;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\Intl\Countries;

class CheckoutController extends Controller
{
    use CartTrait;
    public function create()
    {
        if ($this->getCart()->is_empty)
        {
            return redirect()->route('website.products.index')->with([
                'cart_empty' => 'true'
            ]);
        }
        return view('website.shopping-proccess.checkout')->with([
            'user' => Auth::user(),
            'countries' => Countries::getNames(App::currentLocale()),
        ]);
    }

    public function store(Request $request)
    {
        if ($this->getCart()->is_empty)
        {
            return redirect()->route('website.products.index')->with([
                'cart_empty' => 'true'
            ]);
        }
        $request->validate([
            'billing_name' => ['required', 'string'],
            'billing_phone' => 'required',
            'billing_email' => 'required|email',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_country' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $request->merge([
                'total' => $this->getCart()->total,
            ]);
            $order = Order::create($request->all());

            $items = [];
            foreach ($this->getCart() as $item) {
                $items[] = [
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ];

                /*$order->items()->create([
                    //'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);*/

                /*$order->products()->attach($item->product_id, [
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);*/
            }
            $this->cart_destroy();
            DB::table('order_items')->insert($items);

            DB::commit();

            $users = Admin::all();
            Notification::send($users, new OrderCreatedNotification($order));
//            event(new OrderCreated($order));
//            event('order.created',$order);

            // delete cart
            // send invoice
            // send notification to admin

            return redirect()->route('website.order.show',$order->id)->with('new order', __('Order created.'));

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
