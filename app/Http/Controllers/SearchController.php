<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
	/**
     * @return string
     */
    public function __invoke()
    {
    	//--Search logic a return result to the view
        return view('search');
    }
}
