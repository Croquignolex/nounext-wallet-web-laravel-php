<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'color', 'amount', 'user_id'
    ];

    /**
     * Honer of the account
     * @return App\Models\User
     */
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
