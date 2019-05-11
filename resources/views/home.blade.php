@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Exchange Rates <i class="fa fa-money" aria-hidden="true"></i>
</div>

                <div class="card-body">
                   <div class="card text-center text-white bg-secondary">
                 
                      <div class="card-body">
                   
                        <h5 class="card-title">US TO CAN</h5>
                        <p class="card-text">{{ round($ExchangeRates['us_can']['Realtime Currency Exchange Rate']['5. Exchange Rate'], 2) }}</p>
                        <h5 class="card-title">CAN TO US</h5>
                        <p class="card-text">{{ round($ExchangeRates['can_us']['Realtime Currency Exchange Rate']['5. Exchange Rate'], 2) }}</p>
               
                     </div>
                     </div>

       
                </div>
            </div>
            <br />
            <div class="card">
                <div class="card-header">Weather</div>
				<div class="card-body">
                   <div id="weather_main" class="card text-center bg-light">
                 
                      
                     </div>

       
                </div>
                
            </div>
        </div>
    
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">News Feed</div>

					<div class="card-body" id="news_main">
                     <input type="text" value="" class="form-control" id="box" placeholder="Start Typing to Search..">
                     </div>

       
                </div>
               

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
