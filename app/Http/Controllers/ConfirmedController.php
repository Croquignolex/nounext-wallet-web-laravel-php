<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Traits\TokenTrait;
use Illuminate\Http\Request;

class ConfirmedController extends Controller
{  
    /**
     * @return string
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * @param Request $request
     * @param $language
     * @param $token
     * @param $email
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke(Request $request, $language, $token, $email)
    {
        session()->flush();
        try
        {
            $user = User::where(['token' => $token, 'email' => $email, 'confirmed' => false])
                ->firstOrFail();

            $user->confirmed = true; 
            $user->save();

            flash_message(
                __('general.success'), __('general.well_confirmed', ['name' => $user->name]), 'success', 'oi oi-thumb-up'
            ); 
        }
        catch (Exception $exception)
        {
            flash_message(
                __('general.error'), __('general.bad_link'), 
                'danger', 'oi oi-thumb-down'
            );
        }

        return view('auth.confirmed');
    }
}