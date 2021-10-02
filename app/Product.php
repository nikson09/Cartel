<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    protected $appends = ['discount_sum'];

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function getDiscountSumAttribute()
    {
        $sum = 0;
        if($this->attributes['is_sales']){
            $sum = $this->attributes['sum'] - ($this->attributes['sum'] / 100 * $this->attributes['discount_percent']);
        }

        return ceil($sum);
    }
}
