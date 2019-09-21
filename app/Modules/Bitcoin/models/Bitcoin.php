<?php

namespace App\Modules\Bitcoin\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Bitcoin extends Model
{
    protected $table = 'bitcoins';

    public $timestamps = false;

    protected $fillable = [
        'title',
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
    ];

    public function scopeSearch($query, $request)
    {
        if (isset($request->name)) {
            $query->where('title', 'LIKE', '%'.$request->name.'%');
        }
        if (isset($request->date)) {
            $query->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), $request->date);
        }

        return $query;
    }
}
