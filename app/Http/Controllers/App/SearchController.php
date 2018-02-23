<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
