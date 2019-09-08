<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TTable extends Model
{
    // название таблицы
    protected $table = 't_table';

    // created_at и updated_at
    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'storeys',
        'bathrooms',
        'garages',
    ];

    /**
     * @param $query
     * @param $request
     * @return mixed
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if (isset($request->price_min)) {
            $query->where('price', '>=', $request->price_min);
        }
        if (isset($request->price_max)) {
            $query->where('price', '<=', $request->price_max);
        }

        if (isset($request->bedrooms)) {
            $query->where('bedrooms', '=', $request->bedrooms);
        }
        if (isset($request->storeys)) {
            $query->where('storeys', '=', $request->storeys);
        }
        if (isset($request->bathrooms)) {
            $query->where('bathrooms', '=', $request->bathrooms);
        }
        if (isset($request->garages)) {
            $query->where('garages', '=', $request->garages);
        }

        return $query;
    }
}
