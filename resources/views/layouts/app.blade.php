<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ucwords( config('app.name', 'Laravel')) }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <span class="text-center w-100 position-absolute mb-3 message" id="message">
                                @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show" id='alert'>
                                    {{ session()->get('message') }}
                                    <button type="button" class="close" onclick="hide_me()">&times;</button>
                                </div>
                                @elseif(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session()->get('error') }}
                                    <button type="button" class="close" onclick="hide_me()">&times;</button>
                                </div>
                                @endif
            </span>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    <script>
    function hide_me(){
        var myClasses = document.querySelectorAll('.alert'),
    i = 0,
    l = myClasses.length;
        for (i; i < l; i++) {
            myClasses[i].style.display = 'none';
        }
    }
    setTimeout(function(){ hide_me(); }, 4000);
    </script>
</html>
