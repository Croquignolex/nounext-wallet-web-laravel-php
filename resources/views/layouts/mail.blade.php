<!doctype html>

<html lang="{{ App::getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Nembol wallet for wallet and budget management">
        <meta name="author" content="Alex Ngombol">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ css_asset('bootstrap.min') }}" type="text/css">
    </head>
    
    <body>  
        <div class="card border-success">
            <div class="card-header text-center text-white bg-success"><h4 class=" text-uppercase">{{ config('app.name')}}</h4></div>
            <div class="card-body"> 
                @yield('body')
            </div>
        </div>  
        <script src="{{ js_asset('jquery.min') }}"></script>
        <script src="{{ js_asset('bootstrap.min') }}"></script>
    </body>
</html>