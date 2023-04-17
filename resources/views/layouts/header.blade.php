<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- bootstrap must be above normal styles --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">

    <title>{{isset($pagename)?$pagename:config('app.name','e-news')}}</title>
    <link rel="icon" href="<?= asset('favicon.ico') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">


</head>
<body>
    @isset($ad_1)
        <div class="container mt-3" >
            <div class="row">
                <div class="col-12">
                    <a href="<?= $ad_1->link ?>" target='_blank'>
                        <img src="<?= config('constants.storage_url') . '/ad/' . $ad_1->image ?>" alt="<?= $ad_1->title ?>" class="img img-fluid">
                    </a>
                </div>
            </div>
        </div>
    @endisset
    <!--Top_Head-->
    <div class="top_head ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo_holder bg-dark my-0">
                        <a href="{{ route('login') }}">
                            <img src="<?= config('constants.asset_url').'/logo'?>/logo.png" class="img">
                        </a>
                    </div>
                    <div class="date_note d-inline">
                        <?= date('l\, jS \of F Y h:i:s A');?>
                    </div>
                </div>
                @isset($ad_2)
                    <div class="col-md-6">
                        <div class="info">
                            <a href="<?= $ad_2->link ?>" target="_ads">
                                <img src="<?= config('constants.storage_url') . '/ad/' . $ad_2->image ?>" style="width: 100%;" alt="<?= $ad_2->title ?>">
                            </a>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
    <!--Top_head end-->
    <!-- NavBar-Open -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark menu sticky-top">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('allnews') }}">Home</a>
                    </li>
                    @isset($categories)
                        @foreach ($categories as $cats)
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('category')}}/showall=<?= $cats->id ?>">
                                        <?= $cats->name ?>
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
            <div class="container d-inline-block" >
                <ul class="navbar-nav">
                    <li class="nav-item " >
                        <form action="{{ route('search') }}" method="GET" role="search">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" placeholder="Search news" id="term">
                                <span class="input-group-btn ">
                                    <button class="btn btn-info" type="submit" title="Search news">
                                        <span class="fas fa-search"></span>
                                    </button>
                                </span>
                                <span class="input-group-btn ">
                                    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon bg-light"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
    </nav>
    <!-- NavBar-closed -->

