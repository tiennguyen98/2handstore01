<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'parent_id',
        'product_id',
        'user_id',
    ];

    public function replies()
    {
        $this->hasMany('App\Comment', 'parent_id', 'id');
    }

    public function scopeComments($query)
    {
        return $query->orderBy('updated_at', 'desc')->paginate(config('database.paginate'));
    }
}
