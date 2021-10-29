<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT = 'draft';

    protected $appends = ['image_path'];

    protected $fillable = [
        'name', 'username', 'phone', 'email', 'password', 'status', 'image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImagePathAttribute()
    {
        return asset('media/' . $this->image);
    }

    public static function validateRules($id){
        return [
            'name' => ['required','min:3'],
            'username' => ['required','min:3',Rule::unique('admins', 'username')->ignore($id)],
            'image' => 'nullable|image',
            'password' => 'sometimes|min:6|confirmed',
            'roles' => 'required|array|exists:roles,id',
            'status' => 'in:' . self::STATUS_ACTIVE . ',' . self::STATUS_DRAFT,
        ];
    }
}

