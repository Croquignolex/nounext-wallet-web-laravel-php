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
        <div class="card app-main-border">
            <div class="card-header text-center app-main-bg"><h4 class=" text-uppercase">{{ config('company.name') }} <strong>{{ config('app.name')}}</strong></h4></div>
            <div class="card-body"> 
                @yield('body')
            </div>
        </div>  
        <script src="{{ js_asset('jquery.min') }}"></script>
        <script src="{{ js_asset('bootstrap.min') }}"></script>
    </body>
</html>