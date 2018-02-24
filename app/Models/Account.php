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
        'name', 'description', 'color', 'amount', 'threshold', 'user_id'
    ];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::updated(function ($account) {
            if ($account->amount == $account->threshold) {
                //--TODO: declencher la notification du seil min atteint
            } else if ($account->amount < $account->threshold) {
                //--TODO: declencher la notification du seil min depasse
            }
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
    public function getAmount()
    {
        return 'Solde: <strong>' . $this->amount . '</strong> FCFA';
    }

    /**
     * @return mixed
     */
    public function getThreshold()
    {
        return 'Seuil: <strong>' . $this->threshold . '</strong> FCFA';
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return strtoupper($this->name);
    }
}