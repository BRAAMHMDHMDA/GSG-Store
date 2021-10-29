<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;

class wishlist extends Pivot
{
    protected $table = 'wishlists';
    public $timestamps = false;
    protected $fillable = [
        'product_id' , 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

//    protected function setKeysForSaveQuery(Builder $query)
//    {
//        return $query->where('user_id', '=', $this->attributes['user_id'])
//            ->where('product_id', '=', $this->attributes['product_id']);
//    }


}
