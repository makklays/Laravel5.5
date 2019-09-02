<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    // название таблицы
    protected $table = 'persons';

    /**
     * @var array
     */
    protected $fillable = [
        'login',
        'email',
        'created_at',
        'updated_at'
    ];

    /**
     * Атрибуты, которые должны быть преобразованы к датам.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        //'deleted_at'
    ];
}
