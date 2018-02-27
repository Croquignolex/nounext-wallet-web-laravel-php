<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
                Auth::user()->notifications()->create([
                    'title' => 'Seuil atteint',
                    'details' => 'Seuil du compte ' . $account->getName() . ' est atteint.',
                    'icon' => 'audio',
                    'url' => route_manager('accounts.show', ['account' => $account]),
                    'color' => 'warning',
                ]);
            } else if ($account->amount < $account->threshold) {
                Auth::user()->notifications()->create([
                    'title' => 'Seuil dépassé',
                    'details' => 'Seuil du compte ' . $account->getName() . ' est dépassé de ' . $account->diff,
                    'icon' => 'beaker',
                    'url' => route_manager('accounts.show', ['account' => $account]),
                    'color' => 'danger',
                ]);
            }
        });
    }

    /**
     * @return mixed
     */
    public function getDiffAttribute()
    {
        return number_format(( $this->threshold - $this->amount), 0, $this->getFormaters()['decimal'], $this->getFormaters()['separator']) . ' ' .currency();
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
        return 'Solde: <strong>' . number_format($this->amount, 0, $this->getFormaters()['decimal'], $this->getFormaters()['separator']) . '</strong> ' . currency();
    }

    /**
     * @return mixed
     */
    public function getThreshold()
    {
        return 'Seuil: <strong>' . number_format($this->threshold, 0, $this->getFormaters()['decimal'], $this->getFormaters()['separator']) . '</strong> ' . currency();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return strtoupper($this->name);
    }

    /**
     * @return array
     */
    private function getFormaters()
    {
        if(App::getLocale() == 'fr')
            return ['decimal' => ',', 'separator' => '.'];
        else if (App::getLocale() == 'en')
            return ['decimal' => '.', 'separator' => ','];
    }
}