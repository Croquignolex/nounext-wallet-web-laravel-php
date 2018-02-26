<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'details', 'symbol', 'user_id'
    ];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($currency) {
            $currency->activated = false;
        });
    }

    /**
     * Honer of the account
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
