<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'thumbnail',
        'detail',
        'category_id',
        'province_id',
        'user_id',
        'status',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->belongsToMany('App\User', 'comments')->withPivot('content', 'parent_id');
    }

    public function reports()
    {
        return $this->belongsToMany('App\User', 'reports')->withPivot('type', 'content');
    }

    public function orders()
    {
        return $this->belongsToMany('App\User', 'orders')->withPivot('address', 'note');
    }

    public function images()
    {
        return $this->hasMany('images');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'province_id', 'id');
    }

    public function thumbnail()
    {
        return asset(config('site.thumbnail') . $this->thumbnail);
    }

    public function status()
    {
        switch ($this->status) {
            case 0:
                return [
                    'css' => 'dark',
                    'status' => __('admin.product.status.sold')
                ];
                break;
            case 1:
                return [
                        'css' => 'success',
                        'status' => __('admin.product.status.available')
                    ];
                break;
        }
    }

    public function scopeList($query)
    {
        return $query->with('category', 'user')
                    ->latest();
    }

    public function getMoneyAttribute()
    {
        return number_format($this->price) . ' VND';
    }

}
