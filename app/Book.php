<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // название таблицы
    protected $table = 'books';

    // created_at и updated_at
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'author_id',
        'title',
        'count_page',
        'annotation',
        'picture',
    ];

    public function author()
    {
        return $this->hasOne('App\Author', 'id', 'author_id');
    }
}
