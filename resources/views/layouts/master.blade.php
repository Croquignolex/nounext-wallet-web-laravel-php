<!DOCTYPE html>

<html lang="{{ App::getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Nounext wallet for wallet and budget management">
        <meta name="author" content="Alex Ngombol">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Page title -->
        @yield('title') 

        <!-- Frameworks css -->
        <link rel="stylesheet" href="{{ css_asset('bootstrap.min') }}" type="text/css">
        <link rel="stylesheet" href="{{ css_asset('animate') }}" type="text/css"> 
        <link rel="stylesheet" href="{{ css_asset('open-iconic-bootstrap.min') }}" type="text/css"> 
        <!-- Personalize css -->
        <link rel="stylesheet" href="{{ css_asset('master') }}" type="text/css">
        <!-- Layouts css -->
        @stack('style.layout') 
   
        <!-- Favicons -->
        <link rel="apple-touc h-icon" href="{{ favicon_img_asset('apple-touch-icon') }}" sizes="180x180">
        <link rel="icon" href="{{ favicon_img_asset('favicon-32x32') }}" sizes="32x32" type="image/png">
        <link rel="icon" href="{{ favicon_img_asset('favicon-16x16') }}" sizes="16x16" type="image/png"> 
    </head>

    <body class="bg-light">
        <div class="loader"></div>
        @yield('body')
         
        <!-- Frameworks js -->
        <script src="{{ js_asset('jquery.min') }}"></script>
        <script src="{{ js_asset('popper.min') }}"></script>
        <script src="{{ js_asset('bootstrap.min') }}"></script>
        <script src="{{ js_asset('bootstrap-notify.min') }}"></script>  
        <!-- Personalize js -->
        <script src="{{ js_asset('master') }}"></script>
         <!-- Personalize js -->
        @stack('script.layout')  
    </body>
</html>