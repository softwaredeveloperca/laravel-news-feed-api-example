<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'News Feed Demo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'News Feed API') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<script>
$(window).load(function() {
    $.getJSON( "api/get_news", function( data ) {
			console.log('returned');
		  var items = [];
		 console.log(data);
		  $.each( data.data, function( key, val ) {
			  console.log(val.title);
			  $("#news_main").append('<div id="card-id-' +  val.id + '" class="card-body"><h5 id="title-id-' +  val.id + '" class="news-title card-title">' + val.title + '</h5><p class="card-text">' + val.description + '</p> <footer class="blockquote-footer">Author <cite title="Author">' + val.author + '</cite></footer></div>');
	
		  });
		 
		  
		});
});

$( document )
	.ready(function() {
		
		$('#box').keyup(function(){
			var valThis = $(this).val().toLowerCase();
			if(valThis.length > 1 || valThis.length == 0){
				$('.news-title').each(function(){					
					index_id=$(this).attr('id').replace('title-id-', '');
				 	var text = $(this).text().toLowerCase();   
					(text.indexOf(valThis) >= 0) ? $("#card-id-"+index_id).show() : $("#card-id-"+index_id).hide();         
				  });
			}
    	});
		
		$.getJSON( "api/get_weather", function( data ) {
			
		  var items = [];
		  $.each( data.data, function( key, val ) {
			  $("#weather_main").append('<div class="card-body"><h5 class="card-title">' + val.name + '</h5><p class="card-text">Temp: ' + val.main.temp + 'C</p><p class="card-text">Pressure: ' + val.main.pressure + '</p><p class="card-text">Humidity: ' + val.main.humidity + '%</p></div>');
		  });
		});
		
    
});
</script>
</body>
</html>
