@extends('layouts.loginapp')
@section('content')
    <div class="container container-fluid">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Our News Portal!</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    <div class="col-4">                        
                        <a href="./news/create/post" class="btn btn-primary btn-sm">Add Post</a>
                    </div>
                </div> 
                <table class=" table-striped table-bordered table-responsive w-100 ">
                <thead>
                <tr class="border-b">
                    <th class="text-center p-3 px-5">News</th>
                    <th class="text-center p-3 px-5">Actions</th>                   
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr class="border-b hover:bg-orange-100">
                        <td class="p-3 px-5">
                        <a href="./news/{{ $post->id }}">{{ ucfirst($post->title) }}</a>
                        </td>
                        <td>
                        <a href="./news/{{ $post->id }}/edit" name="edit" class="d-inline-block btn btn-primary btn-sm ">Edit</a>                     
                            <form id="" class="d-inline-block" action="./news/{{$post->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger d-inline-block">Delete</button>
                            </form>
                            
                        </td>
                    </tr>
                @empty
                <p class="text-warning">No News available</p>
                @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
