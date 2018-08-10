<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];
    public $timestamps = false;
    protected $primaryKey = 'key';
    public $incrementing = false;

    public function scopeGetOptions($query)
    {
        $options = Option::get();
        $data = [];
        if (count($options) > 0) {
            foreach ($options as $option) {
                if (in_array($option->key, config('site.assets'))) {
                    $data[$option->key] = asset('storage/site/' . $option->value);
                } else {
                    $data[$option->key] = $option->value;
                }
            }
        }

        return $data;
    }
}
