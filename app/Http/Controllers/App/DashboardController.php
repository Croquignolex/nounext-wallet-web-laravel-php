<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	/**
     * @return string
     */
    public function __invoke()
    {
        return view('dashboard');
    }
}
