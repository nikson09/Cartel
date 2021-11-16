<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];

    public const ACTIVE = 1;
    public const FAILED = 2;
    public const DELIVERY = 3;
    public const FINISHED = 4;

    public const STASUSES = [
        self::ACTIVE => 'Не рассмотрен',
        self::FAILED => 'Отмена',
        self::DELIVERY => 'Доставка',
        self::FINISHED => 'Закончен',
    ];
}
