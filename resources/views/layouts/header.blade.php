<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>{{isset($pagename)?$pagename:config('app.name','e-news')}}</title>
    <link rel="icon" href="<?= asset('favicon.ico') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/all.min.css')?>">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=211575796776720&autoLogAppEvents=1"></script>
    <style>

 </style>
</head>
<body>  
    <?php
    if (isset($home_1)) {
    ?>
        <div class="container" style="margin-top: 5px">
            <div class="row">
                <div class="col-12">
                    <a href="<?php echo $home_1->link ?>" target='_ads'>
                        <img src="<?php echo config('constants.storage_url') . '/ad/' . $home_1->image ?>" alt="<?php echo $home_1->title ?>" class="img img-fluid">
                    </a>
                </div>
            </div>
        </div>
    <?php  } ?>
    <!--Top_Head-->
    <div class="top_head ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo_holder bg-dark">
                        <a href="./">
                            <img src="<?php echo config('constants.asset_url').'/logo'?>/logo.png">
                        </a>
                    </div>
                    <div class="date_note">
                        <?php
                        echo date('l\, jS \of F Y h:i:s A');
                        ?>
                    </div>
                </div>
                <?php
                if (isset($home_2)) {
                ?>
                    <div class="col-md-6">
                        <div class="info">
                            <a href="<?php echo $home_2->link ?>" target="_ads">
                                <img src="<?php echo config('constants.storage_url') . '/ad/' . $home_2->image ?>" style="width: 100%;" alt="<?php echo $home_2->title ?>">
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--Top_head end-->
    <!-- NavBar-Open -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark menu sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('allnews') }}">Home</a>
                    </li> 
                @isset($categories)
                    @foreach ($categories as $cats)
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('category')}}/showall=<?php echo $cats->id ?>">
                                    <?php echo $cats->name ?>
                                </a>
                            </li>
                     @endforeach
                 @endisset
             @if (Route::has('login'))
                @auth 
                <li class="nav-item" >
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
                @else
                <li class="nav-item" >
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                 @endauth
            @endif                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- NavBar-closed -->
    
    