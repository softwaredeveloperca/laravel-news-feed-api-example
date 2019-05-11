<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class APITest extends TestCase
{
	use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
	
	public function testWeatherEndPoint()
    {
		$response = $this->json('GET', '/api/get_weather');
		
		$response
			->assertStatus(200)
			->assertJsonCount(4, "data");

    }
	
	public function testExchangeEndPoint()
    {
		$response = $this->json('GET', '/api/get_exchange_rates');
		
		$response
			->assertStatus(200)
			->assertJsonCount(2, "data");
    }
	
	public function testNewsEndPoint()
    {
		$response = $this->json('GET', '/api/get_news');
		
		$response
			->assertStatus(200)
			->assertJsonCount(10, "data");
    }
}
