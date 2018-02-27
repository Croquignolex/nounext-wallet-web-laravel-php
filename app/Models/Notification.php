<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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

    /**
     * @return mixed
     */
    public function getDateAttribute()
    {
        $date = new Carbon($this->created_at);
        if(App::getLocale() == 'fr')
            return $date->format('d-m-Y à h:i:s');
        else if (App::getLocale() == 'en')
            return $date->format('m-d-Y \a\t h:i:sa');
    }
}