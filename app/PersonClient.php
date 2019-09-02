<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonClient extends Model
{
    // название таблицы
    protected $table = 'persons_client';

    /**
     * @var array
     */
    protected $fillable = [
        'login',
        'email',
        'created_at',
        'updated_at'
    ];
}
