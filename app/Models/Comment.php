<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'parent_id',
        'product_id',
        'user_id',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'parent_id', 'id');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment', 'parent_id', 'id');
    }

    public function scopeAllComments($query, $search = null)
    {
        return $query->where('content', 'like', '%' . $search . '%')
                    ->with('comment')
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->join('products', 'comments.product_id', '=', 'products.id')
                    ->select('comments.*', 'products.name as name', 'users.email as email')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(config('database.paginate'));
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function scopeParentComments($query, $id)
    {
        return $query->where('product_id', '=', $id)->with('user')->with(['comments' => function ($query) {
            $query->with('user');
        }])->where('parent_id', '=', null)->get();
    }

    public static function saveComment($request)
    {
        $comment = new Comment();
        $comment->product_id = $request->id;
        $comment->user_id = Auth::user()->id;
        $comment->fill($request->all());
        $comment->save();
        
        return $comment;
    }

    public function loggedOwner()
    {
        if (Auth::check()) {
            return $this->user_id === Auth::user()->id;
        }
        
        return false;
    }

    public function parentComment()
    {
        $parent = $this->comment;
        
        return $parent !== null ? $parent->content : null;
    }

    public function scopeDeleteSubComment($query, $id)
    {
        return $query->where('parent_id', '=', $id)->delete();
    }
}
