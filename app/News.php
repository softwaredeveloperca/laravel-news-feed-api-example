<?php

namespace App;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Database\Eloquent\Model;



class News extends Model
{
	protected $guarded = ['id', 'created_at', 'updated_at'];
    
	public static function getLatest()
	{
		$client = new Client(); 
		$response = $client->get(env('NEWS_FEED_URL') . "apiKey=" . env('NEWS_API_KEY'));
		return $response = json_decode($response->getBody()->getContents(), true);
	}
}
