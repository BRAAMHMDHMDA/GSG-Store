<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','slug','parent_id','status','image'];
    protected $guarded = ['id'];
    protected $appends = ['image_path'];


    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id')->with('children');
    }

    public function parent()
    {
        return $this->hasOne(Category::class , 'id' ,'parent_id')->withDefault([
            'name' => "<span class='badge badge-pill badge-light-danger mr-1'>No Parent</span>"
        ]);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function validateRules($id){
        return [
            'name' => ['required','min:3',Rule::unique('categories', 'name')->ignore($id)],
            'image' => 'nullable|image',
            'parent_id' => 'nullable|int|exists:categories,id',
            'status' => 'in:active,draft'
        ];
    }

    public function getImagePathAttribute()
    {
        return asset('media/'.$this->image);
    }//end of get image path

    //    public function getNameAttribute($value)
    //    {
    //        return $this->trashed()? $value . ' (Trashed)':$value;
    //    }

    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = Str::title($value);
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', 'active');
    }


}
