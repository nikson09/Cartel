<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attributes';
    protected $guarded = [];

    public function attribute()
    {
        return $this->hasOne(Attribute::class, 'id', 'attribute_id');
    }
}
