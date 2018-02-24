<?php

namespace App\Models;

use App\Traits\TokenTrait;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'confirmed', 'token'
    ];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($user) {
            $user->token = User::getUniqueToken();
            $user->confirmed = false;
        });

        static::updating(function($user) {
            $user->token = User::getUniqueToken(); 
        });
    }

    /**
     * @return string
     */
    public static function getUniqueToken()
    {
        $token = Str::random(64);
        
        if(static::where(['token' => $token])->count() > 0)
            return static::getUniqueToken();
        
        return $token;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany('App\Models\Account');
    }
}
