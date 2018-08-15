<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
    ];

    public function provinces()
    {
        return $this->hasMany('App\Province');
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\Province');
    }


    public function scopeCities($query)
    {
        return $query->orderBy('name', 'asc')->pluck('name', 'id');
    }

    public function scopeGetProvinces($query)
    {
        $query->provinces->pluck('name', 'id')->get();
    }
    
    public function scopeConvertToArray($query)
    {
        $cities = City::get();
        $arrayCities = [];
        foreach ($cities as $city) {
            $arrayCities[$city->id] = $city->name;
        }
        
        return $arrayCities;
    }
}
