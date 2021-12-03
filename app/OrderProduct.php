<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';
    protected $guarded = [];

    public function productAttributes()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
