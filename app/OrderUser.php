<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    protected $table = 'order_users';
    protected $guarded = [];

    public function order()
    {
        return $this->hasOne(Order::class, 'order_user_id', 'id')->with('products');
    }
}
