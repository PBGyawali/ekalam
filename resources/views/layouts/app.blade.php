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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased" id="page-top">
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
            <?php $usermessages = array('message','error'); ?>
            <span class="text-center w-100 position-absolute mb-3 message" id="message">
                @foreach($usermessages as $key)
                    @if(session()->has($key))
                        <div class="alert alert-{{$key=='message'?'success':'danger'}} alert-dismissible fade show" x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 4000)" x-show.transition.opacity.out.duration.1500ms="show">
                            {{ session()->get($key) }}
                        <button type="button" class="close" x-on:click="show=false">&times;</button>
                        </div>
                     @endif
                @endforeach
            </span>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <a class="absolute right-0" href="#page-top"><i class=" fas fa-angle-up fa-4x"></i></a>
        </div>
        @stack('modals')
        @livewireScripts

    </body>
</html>
