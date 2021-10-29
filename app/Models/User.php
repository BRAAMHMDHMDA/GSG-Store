<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'image_path',
    ];

    protected $appends = [
        'full_image_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getfullImagePathAttribute()
    {
        return asset('media/'.$this->image_path);
    }

    public function routeNotificationForMail($notification = null)
    {
        return $this->email;
    }

//    public function receivesBroadcastNotificationsOn()
//    {
//        return 'notification.' . $this->id;
//    }

    public function routeNotificationForNexmo($notification = null)
    {
        return $this->phone;
    }

    public function routeNotificationForTweetSms()
    {
        return $this->phone;
    }

    public function wishlists()
    {
        return $this->belongsToMany(Product::class, 'wishlists');
    }
    public function fav()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
