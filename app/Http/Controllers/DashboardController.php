<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
