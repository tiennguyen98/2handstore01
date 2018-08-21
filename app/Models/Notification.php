<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'content', 'user_id', 'link', 'status', 'detail'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getTimeAttribute()
    {
        if ($this->created_at == null) {
            return __('Undefined');
        }
        
        return __('notify.time', [
            'date' => date('d-m-Y', strtotime($this->created_at)),
            'time' => date('H:m', strtotime($this->created_at))
        ]);
    }
}
