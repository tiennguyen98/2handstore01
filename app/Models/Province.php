<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'name',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function scopeGetProvinces($query, $id)
    {
        return $query->where('city_id', $id)->pluck('name', 'id');
    }
}
