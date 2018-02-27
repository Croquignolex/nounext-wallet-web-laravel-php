<?php

namespace App\Http\Controllers\App;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CurrenciesController extends Controller
{
    use PaginationTrait;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $language
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $language)
    {
        $currencies = Auth::user()->currencies->sortByDesc('updated_at');

        $this->parginate($request, $currencies);
        return view('currencies.index', ['paginationTools' => $this->paginationTools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CurrencyRequest $request
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function store(CurrencyRequest $request)
    {
        $this->currencyExist($request->title);

        Auth::user()->currencies()->create($request->input());

        flash_message(
            __('general.success'), 'Dévise ajouté avec succès',
            'success', 'oi oi-thumb-up'
        );

        return redirect($this->redirectTo());
    }

    /**
     * Display the specified resource.
     *
     * @param $language
     * @param Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function show($language, Currency $currency)
    {
        return view('currencies.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $language
     * @param Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function edit($language, Currency $currency)
    {
        return view('currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurrencyRequest $request
     * @param $language
     * @param Currency $currency
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function update(CurrencyRequest $request, $language, Currency $currency)
    {
        $this->currencyExist($request->title, $currency->id);

        $currency->update($request->all());

        flash_message(
            __('general.success'), 'Dévise modifié avec succès.',
            'success', 'oi oi-thumb-up'
        );

        return redirect($this->redirectTo());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $language
     * @param Currency $currency
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($language, Currency $currency)
    {
        $currency->delete();

        flash_message(
            'Information', 'Dévise supprimé avec succès.'
        );

        return redirect($this->redirectTo());
    }

    /**
     * Check if the account already exist
     *
     * @param $title
     * @param int $currency_id
     * @return void
     * @throws ValidationException
     */
    private function currencyExist($title, $currency_id = 0)
    {
        if(Auth::user()->currencies->where('title', $title)->where('id', '<>', $currency_id)->count() > 0)
            throw ValidationException::withMessages([
                'title' => 'Une dévise existe déjà avec ce titre',
            ])->status(423);
    }

    /**
     * Give the redirection path
     *
     * @return Router
     */
    private function redirectTo()
    {
        return route_manager('currencies.index');
    }
}
