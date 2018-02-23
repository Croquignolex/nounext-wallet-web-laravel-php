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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    /*
     * TODO: Gerer l'alerte du seuil des que celui-ci est atteint
     */
}
