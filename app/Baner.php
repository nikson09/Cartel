<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baner extends Model
{
    protected $table = 'baners';
    protected $guarded = [];

    public function bannerRelation()
    {
        return $this->hasOne(BanerRelation::class, 'id', 'relation_id');
    }
}
