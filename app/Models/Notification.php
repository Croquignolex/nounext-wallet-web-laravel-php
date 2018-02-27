<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'details', 'icon', 'url', 'color', 'user_id'
    ];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($notification) {
            $notification->viewed = false;
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