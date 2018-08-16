<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image',
        'link',
    ];

    public function getImage()
    {
        return asset('storage/slides/' . $this->image);
    }

    public function link()
    {
        if (filter_var($this->link, FILTER_VALIDATE_URL)) {
            return $this->link;
        } else {
            return url($this->link);
        }
    }
}
