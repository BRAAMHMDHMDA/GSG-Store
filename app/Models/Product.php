<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\This;
use \NumberFormatter;
use Illuminate\Support\Facades\App;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT = 'draft';

    protected $fillable =[
        'name', 'slug', 'description', 'image_path',
        'price', 'sale_price', 'quantity', 'weight',
        'width', 'height', 'length', 'status',
        'category_id', 'sku', 'brand_id'
    ];
    protected $with = ['category'];
    protected $appends = ['image_url', 'permalink'];
    protected $casts = [
        'price' => 'float',
        'quantity' => 'int',
    ];
    protected $perPage = 9;

    public static function validateRules($price)
    {
        return [
            'name' => 'required|max:255',
            'category_id' => 'required|int|exists:categories,id',
            'description' => 'required',
            'main_image' => 'required|image|dimensions:min_width=200,min_height=200',
            'price' => 'required|numeric|min:0',
            'sale_price' => ['nullable', 'numeric', 'min:0', function ($attr, $value, $fail) {
                $price = request()->input('price');
                if ($value >= $price) {
                    $fail(__('The Sale Price Should Be Lower Than The Original Price.'));
                }
            }],
            'quantity' => 'required|int|min:0',
            'sku' => 'nullable|unique:products,sku',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'status' => 'in:' . self::STATUS_ACTIVE . ',' . self::STATUS_DRAFT,
        ];
    }

    public function getFormattedPriceAttribute()
    {
        $defualtCurrncy = Currency::where('is_primary', 1)->first();
//        $fmt = new NumberFormatter( App::getLocale(), NumberFormatter::CURRENCY  );
//        return $fmt->formatCurrency($this->price, $defualtCurrncy->code);
        return number_format($this->price, $defualtCurrncy->decimal_numbers);
    }

    public function getFormattedSalePriceAttribute()
    {
        $defualtCurrncy = Currency::where('is_primary', 1)->first();
        return number_format($this->sale_price, $defualtCurrncy->decimal_numbers);

//        $defualtCurrncy = Currency::where('is_primary',1)->first();
//        $fmt = new NumberFormatter( App::getLocale(), NumberFormatter::CURRENCY  );
//        return $fmt->formatCurrency($this->sale_price, $defualtCurrncy->code);
    }

    public function getImageUrlAttribute()
    {
        return asset('media/' . $this->image_path);
    }//end of get image Url

    public function getPermalinkAttribute()
    {
        return route('website.product.details', $this->slug);
    }//end of get Permalink

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', 'active');
    }

    public function scopePrice(Builder $builder, $from, $to)
    {
        $builder->whereBetween('price', [$from, $to]);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(
            ProductImage::class,
            'product_id',
            'id'
        );
    }
    public function wishlists()
    {
        return $this->belongsToMany(Product::class, 'wishlists');
    }

}
