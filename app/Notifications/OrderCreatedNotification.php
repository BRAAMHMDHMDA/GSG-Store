<?php

namespace App\Notifications;

use App\Channels\TweetSmsChannel;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    public $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $via = [
            'broadcast',
            'mail',
            'database',
//            'nexmo',
//            TweetSmsChannel::class,
        ];
        return $via;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject(__('New Order #:number',['number' => $this->order->number]))
                    ->from('invoices@localhost' , 'GSG Billing')
                    ->greeting(__('Hello, :name', ['name' => $notifiable->name]))
                    ->line(__('A new order has been created (Order #:number).',[
                        'number' => $this->order->number,
                    ]))
                    ->action('View Order', url('/'))
                    ->line('Thank you for Shopping with us!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => __('New Order #:number',['number' => $this->order->number]),
            'body' => __('A new order has been created (Order #:number).',[
                'number' => $this->order->number,
            ]),
            'icon' => '',
            'url' => url('/'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => __('New Order #:number', ['number' => $this->order->number]),
            'body' => __('A new order has been created (Order #:number).', [
                'number' => $this->order->number,
            ]),
            'icon' => '',
            'url' => url('/'),
            'time' => Carbon::now()->diffForHumans(),
        ]);
    }

    public function toNexmo($notifiable)
    {
        $message = new NexmoMessage();
        $message->content(__('New Order #:number', ['number' => $this->order->number]));
        return $message;
    }

    public function toTweetSms($notifiable)
    {
        $message = __('New Order #:number', ['number' => $this->order->number]);
        return $message;
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
