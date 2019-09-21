<?php

namespace App\Modules\Bitcoin\models;

use Illuminate\Database\Eloquent\Model;

class Bitcoin extends Model
{
    protected $table = 'bitcoins';

    public $timestamps = false;

    protected $fillable = [
        'title',
        //'price',
        //'price_2',
        'fees',
        /*'fees_in_fix',
        'fees_out_fix',
        'fees_in_per',
        'fees_out_per',*/
        'limits',
        /*'limits_min',
        'limits_max',
        'limits_min_out',
        'limits_max_out',*/
    ];

    protected $guarded = [
        'price',
        //'price_2'
    ];
}
