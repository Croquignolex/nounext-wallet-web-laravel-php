<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $language, $token)
    {
        try
        { 
            $user = User::where(['token' => $token])
                ->firstOrFail();
 
            return view('auth.passwords.reset', [
                'token' => $user->token, 
                'email' => $user->email,
                'name' => $user->name]);
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

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {   
        $this->validate($request, $this->rules());  
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->resetProcess($this->credentials($request));  
        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if($response == Password::PASSWORD_RESET)
        {
            flash_message(
                'Information',
                'Votre mot de passe à été réinitialisé avec succèss', 
                'success', 'oi oi-thumb-up'
            );
            return $this->sendResetResponse($response);
        }
        else
        {
            flash_message(
                __('general.error'),
                'Impossible de réinitialisé le mots de passe, certains paramètres sont incorrecte', 
                'danger', 'oi oi-thumb-down', 'bounceIn', 'bounceOut'
            );
            return $this->sendResetFailedResponse($request, $response);
        }
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|max:255|confirmed',
        ];
    }

    /**
     * Reset the password for the given token.
     *
     * @param  array  $credentials
     * @param  \Closure  $callback
     * @return mixed
     */
    protected function resetProcess(array $credentials)
    {  
        // If the responses from the validate method is not a user instance, we will
        // assume that it is a redirect and simply return it from this method and
        // the user is properly redirected having an error message on the post.
        if (is_null($user = $this->getUser($credentials))) {
            return Password::INVALID_USER;
        }
         
        // Once the reset has been validated, we'll call the given callback with the
        // new password. This gives the user an opportunity to store the password
        // in their persistent storage. Then we'll delete the token and return.
        $this->resetPassword($user, $credentials['password']);

        return Password::PASSWORD_RESET;
    } 

    /**
     * Get the user for the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\CanResetPassword|null
     *
     * @throws \UnexpectedValueException
     */
    protected function getUser(array $credentials)
    {
        $credentials = Arr::except($credentials, ['password_confirmation, name']); 
        try{
            $user = User::where(['email' => $credentials['email'], 'token' => $credentials['token']])
                ->firstOrFail(); 
            return $user;
        }
        catch(Exception $exception) { return null; }
    } 

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);

        $user->save(); 

        event(new PasswordReset($user));
    } 

    /**
     * @return string
     */
    protected function redirectTo()
    {
        return  route_manager('login');
    }
}