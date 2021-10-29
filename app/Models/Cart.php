<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id', 'cookie_id', 'product_id', 'user_id', 'quantity',
    ];

    protected $with = [
        'product',
    ];

    protected static function booted()
    {
        self::creating(function (Cart $cart){
            $cart->id = Str::uuid();
            $cart->user_id = Auth::id();
        });
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
