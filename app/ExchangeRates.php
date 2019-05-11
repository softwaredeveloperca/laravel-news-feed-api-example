<?php

namespace App;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
     public static function getLatest()
	{
		$client = new Client();
 
		$us_can = $client->get(env('STOCK_EXCHANGE_US_CAN_URL') . "apikey=" . env('STOCK_EXCHANGE_KEY'));
		$can_us = $client->get(env('STOCK_EXCHANGE_CAN_US_URL') . "apikey=" . env('STOCK_EXCHANGE_KEY'));
		
		return [
			'us_can' => json_decode($us_can->getBody()->getContents(), true), 
			'can_us' => json_decode($can_us->getBody()->getContents(), true), 
			];
		
	}
}
