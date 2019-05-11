<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExchangeRates;

class HomeController extends Controller
{
    public function index(Request $request)
	{  
	   return view('home', ['ExchangeRates' => ExchangeRates::getLatest()]);
	}
}
