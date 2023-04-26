<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'body',
        'description',
        'title',
        'tags',
        'position',
        'active',
        'price',
        'discount',
        'eventId',
    ];
}
