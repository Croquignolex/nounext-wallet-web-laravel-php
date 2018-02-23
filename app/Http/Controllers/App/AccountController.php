<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest; 
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = User::find(Auth::user()->id)->accounts->sortByDesc('updated_at');
        return view('account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountRequest $request
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function store(AccountRequest $request)
    {  
        if($this->accountExist($request->name)) $this->returnError();
        else
        {
            $user = User::find(Auth::user()->id);
            $account = $user->accounts()->create($request->input());

            flash_message(
                __('general.success'), 'Compte ajouté avec succès', 
                'success', 'oi oi-thumb-up'
            );

            return redirect($this->redirectTo());
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param $language
     * @param Account $account
     * @return \Illuminate\Http\Response
     */
    public function show($language, Account $account)
    {
        return view('account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $language
     * @param Account $account
     * @return \Illuminate\Http\Response
     */
    public function edit($language, Account $account)
    { 
        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountRequest $request
     * @param $language
     * @param Account $account
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function update(AccountRequest $request, $language, Account $account)
    {
        if($this->accountExist($request->name, 1)) $this->returnError();
        else
        { 
            $account->update($request->all());

            flash_message(
                __('general.success'), 'Compte modifié avec succès.', 
                'success', 'oi oi-thumb-up'
            );

            return redirect($this->redirectTo());
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $language
     * @param Account $account
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($language, Account $account)
    {
        $account->delete();

        flash_message(
            'Information', 'Compte supprimé avec succès.'
        );

        return redirect($this->redirectTo());
    }

    /**
     * Check if the account already exist
     *
     * @param  string $name
     * @param int $offset
     * @return bool
     */
    private function accountExist($name, $offset = 0)
    {
        if(Account::where('name', $name)->count() > $offset) return true;
        else return false; 
    }

    /**
     * Return to form with error
     *
     * @return void
     * @throws ValidationException
     */
    private function returnError()
    {
        throw ValidationException::withMessages([
            'name' => 'Un compte existe déjà avec ce nom',
        ])->status(423);
    }

    /**
     * Give the redirection path
     * 
     * @return Router
     */
    private function redirectTo()
    {
        return route_manager('accounts.index');
    }
}
