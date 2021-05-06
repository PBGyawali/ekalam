<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ucwords( config('app.name', 'enews')) }}</title>
        <!-- Required meta tags -->    
    <!-- Bootstrap CSS -->
    <meta property="og:url" content="">
    <meta property="og:title" content="<?php echo (isset($meta['title'])) ? $meta['title'] :ucwords(config('app.name')) ?>">
    <meta property="og:type" content="article">   
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
   </head>
    <body>
        <div class="antialiased">
        <div class="flex items-top justify-center bg-dark text-white w-100 sm:items-center  sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0  w-100 bg-dark sm:block">
                    @auth
                       <a href="{{ url('/dashboard') }}" class="text-sm text-white btn badge-dark ">Dashboard</a>
                    @else
                        @if(!request()->routeIs('login'))
                            <a href="{{ route('login') }}" class="text-sm text-white btn badge-dark">Log in</a> 
                        @endif                     
                    @endauth
                @if(!request()->routeIs('allnews'))
                <a href="{{ route('allnews') }}" class="text-sm text-white btn badge-dark">All news</a>
                @endif

                </div>
            @endif
            </div>
   @if(isset($slot))
        {{ $slot }}
    @endif    
        </div>
     @if(isset($section))
        @section
    @endif  
    @extends('layouts.footer')  
    </body>
</html>
