<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $fillable = [
        'name', 'code', 'symbol', 'is_primary' ,'decimal_numbers',
    ];
    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public static function validateRules($id){
        return [
            'name' => ['required','min:3',Rule::unique('currencies', 'name')->ignore($id)],
            'code' => 'required',
            'decimal_numbers' => 'required',
            'is_primary' => 'nullable|in:1'
        ];
    }
}
