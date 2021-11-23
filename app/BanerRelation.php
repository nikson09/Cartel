<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BanerRelation extends Model
{
    protected $table = 'baner_relation';
    protected $guarded = [];
    protected $appends = ['category'];

    public const HOME = 1;
    public const CATEGORY = 2;
    public const COUNTRY = 3;
    public const BRAND = 4;

    public const BANNER_TYPES = [
        self::HOME => 'главная',
        self::CATEGORY => 'категория',
        self::COUNTRY => 'страна',
        self::BRAND => 'бренд',
    ];

    public function getCategoryAttribute()
    {
        $category = '';
        switch ($this->attributes['baner_type']) {
            case BanerRelation::HOME:
                break;
            case BanerRelation::CATEGORY:
                $categoryFromCategories = Category::find($this->attributes['related_id']);
                $category = $categoryFromCategories->name;
                break;
            case BanerRelation::COUNTRY:
                $countryFromCategories = Country::find($this->attributes['related_id']);
                $category = $countryFromCategories->name;
                break;
            case BanerRelation::BRAND:
                $brandFromCategories = Brand::find($this->attributes['related_id']);
                $category = $brandFromCategories->name;
                break;
        }

        return $category;
    }
}
