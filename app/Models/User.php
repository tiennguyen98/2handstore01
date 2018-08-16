<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ConfirmEmailNotification;
use App\Notifications\PasswordResetNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'description',
        'status',
        'avatar',
        'verify_token',
        'role_id',
        'social',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verify_token'
    ];

    public function rateds()
    {
        return $this->belongsToMany('App\User', 'rates', 'rater_id', 'rated_id')->withPivot('stars');
    }

    public function raters()
    {
        return $this->belongsToMany('App\User', 'rates', 'rated_id', 'rater_id')->withPivot('stars');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function reports()
    {
        return $this->belongsToMany('App\Product', 'reports')->withPivot('content', 'type');
    }

    public function commentProducts()
    {
        return $this->belongsToMany('App\Product', 'comments')->withPivot('content', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Product', 'orders', 'buyer_id')->withPivot('address', 'note');
    }

    public function provider_users()
    {
        return $this->hasMany('provider_users');
    }

    public function verified()
    {
        return $this->status == 1;
    }

    public function scopeCustomer($query, $search = null)
    {
        return $query->where('role_id', '>', '1')->where('email', 'like', '%' . $search . '%')->orderBy('updated_at', 'desc')->paginate(config('database.paginate'));
    }

    public function getAvatar()
    {
        return asset(Storage::url($this->avatar != null ? $this->avatar : 'images/default.png'));
    }

    public function scopeVerified($query)
    {
        return $query->where('status', '=', '1');
    }

    public function scopeUnverify($query)
    {
        return $query->where('status', '=', '0');
    }

    public function scopeBlocked($query)
    {
        return $query->where('status', '=', '-1');
    }

    public function scopeOption($query, $option)
    {
        if ($option === 'verified') {
            return $this->scopeVerified($query);
        }
        if ($option === 'unverify') {
            return $this->scopeUnverify($query);
        }
        if ($option === 'blocked') {
            return $this->scopeBlocked($query);
        }
        
        return $query;
    }

    public function saveUser($data)
    {
        if (isset($data['avatar']) && $this->avatar !== null) {
            Storage::delete($this->avatar);
        }
        
        $this->fill($data);
        
        return $this->save();
    }

    public function getNameAttribute($value)
    {
        return strlen($value) < 45 ? $value : (substr($value, 0, 42) . '...');
    }

    public function scopeCustomerOption($query, $option, $search = null)
    {
        return $query->option($option)->customer($search);
    }

    public function getAverageRate()
    {
        $rates = [
            'avg' => 0,
            'votes' => 0
        ];
        if (count($this->raters) > 0) {
            $rates['avg'] = round($this->raters()->avg('stars'), 1);
            $rates['votes'] = count($this->raters);
        }

        return $rates;
    }

    public function saveRater(User $user, $stars)
    {
        if (!$this->raters()->find($user->id)) {
            return $this->raters()->save($user, ['stars' => $stars]);
        } else {
            return $this->raters()->updateExistingPivot($user, ['stars' => $stars]);
        }
    }

    public function getVote(User $user)
    {
        if ($rater = $this->raters()->find($user->id)) {
            return $rater->pivot->stars;
        }
        
        return false;
    }

    public function isBought($product_id)
    {
        if ($this->orders()->where('product_id', $product_id)->first()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function blocked()
    {
        return $this->status == -1;
    }
}
