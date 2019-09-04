<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // название таблицы
    protected $table = 'authors';

    // created_at и updated_at
    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
    ];

    public function books()
    {
        return $this->hasMany('App\Book');
    }

}
