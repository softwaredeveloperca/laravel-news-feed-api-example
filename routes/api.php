<?php

use Illuminate\Http\Request;

use App\Weather;
use App\ExchangeRates;
use App\News;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('get_weather', function(Request $request) {


   // if (Cache::has('weather')){
	   Cache::remember('weather', 1, function()  {
	       return Weather::getLatest()['list'];
	   });
    //}
	
	return response()->json([
		'success'=>true, 
		'data'=>Cache::get('weather')
	]);
	
});


Route::get('get_news', function(Request $request) {
	
    $News=News::orderBy('created_at', 'desc')->take(10)->get();

	return response()->json([
		'success'=>true, 
		'data'=>$News
	]);
});

Route::get('get_exchange_rates', function(Request $request) {
	

	return response()->json([
		'success'=>true, 
		'data'=>ExchangeRates::getLatest()
	]);

});