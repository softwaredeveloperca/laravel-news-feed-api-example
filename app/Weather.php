<?php

namespace App;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    public static function getLatest()
	{
		$client = new Client(); 
		
		$response = $client->get(env('WEATHER_FEED_URL') . "&appid=" . env('WEATHER_API_KEY'));
		return $response = json_decode($response->getBody()->getContents(), true);
		
	}
}
