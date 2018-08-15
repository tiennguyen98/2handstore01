<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Provider_user extends Model
{
    protected $fillable = [
        'user_id',
        'provider_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeProvider($query, $provider_id)
    {
        return $this->where('provider_id', $provider_id);
    }

    public static function saveProvider($array)
    {
        if (self::provider($array['provider_id'])->first() || self::find($array['user_id'])) {
            return false;
        }
        
        return self::create($array);
    }

    public static function findUser($provider_id, $provider_email)
    {
        $findById = self::provider($provider_id)->first();
        $findByEmail = User::where('email', $provider_email)->first();
        if ($findById && $user = $findById->user) {
            return $user;
        } elseif($findByEmail) {
            self::saveProvider([
                'provider_id' => $provider_id,
                'user_id' => $findByEmail->id
            ]);

            return $findByEmail;
        } else {
            return null;
        }
    }

}
