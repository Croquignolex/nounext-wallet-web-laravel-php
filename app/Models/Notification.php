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
        'type', 'icon', 'url', 'color', 'user_id', 'account_id'
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
     * Honer of the account
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Models\Account');
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

    /**
     * @return mixed
     */
    public function getDetailsAttribute()
    {
        $detail = '';
        $account_name = $this->account->name;

        switch ($this->type)
        {
            case 'NEW': $detail = 'Le compte ' . $account_name . ' vient d\'être créé'; break;
            case 'REACHED':$detail = ' Le seuil du compte ' . $account_name . ' est atteint'; break;
            case 'PASSED':$detail = 'Le seuil du compte ' . $account_name . ' est dépassé de ' . $this->account->diff; break;
        }

        return $detail;
    }

    /**
     * @return mixed
     */
    public function getTitleAttribute()
    {
        $title = '';

        switch ($this->type)
        {
            case 'NEW': $title = 'Nouveau compte'; break;
            case 'REACHED': $title = 'Seuil atteint'; break;
            case 'PASSED': $title = 'Seuil dépassé'; break;
        }

        return $title;
    }

    /**
     * @return mixed
     */
    public function getUrlAttribute()
    {
        return route_manager('accounts.show', ['account' => $this->account]);
    }

    /**
     * @return mixed
     */
    public function getIconAttribute()
    {
        $icon = '';

        switch ($this->type)
        {
            case 'NEW': $icon = 'plus'; break;
            case 'REACHED': $icon = 'audio'; break;
            case 'PASSED': $icon = 'beaker'; break;
        }

        return $icon;
    }

    /**
     * @return mixed
     */
    public function getColorAttribute()
    {
        $color = '';

        switch ($this->type)
        {
            case 'NEW': $color = 'success'; break;
            case 'REACHED': $color = 'warning'; break;
            case 'PASSED': $color = 'danger'; break;
        }

        return $color;
    }
}