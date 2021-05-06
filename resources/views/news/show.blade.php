@extends('layouts.loginapp')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="../news" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <p>{!! $post->body !!}</p> 
                <hr>
                
            </div>
        </div>
    </div>
@endsection