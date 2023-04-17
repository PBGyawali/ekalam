@include('layouts.header')
<div class="container mt-3">
    @if(empty($category_info))

    <div class="row d-flex align-items-center min-vh-100">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <h1 class='text-center text-info'>
                        The choosen Category was not found.
                    </h1>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="row">
            <div class="col-12">
                <ul class="css-nav p-0 bg-dark ">
                    <li>
                        <h4 class="text-white text-center">{{$pagename}}</h4>
                    </li>
                </ul>
            </div>
        </div>
        @if ($news->isEmpty())
            <div class="row d-flex align-items-center min-vh-100">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h1 class='text-center text-info'>
                                No News was found.
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @foreach ($news as $category_news)
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <img src="<?php echo $category_news->image ?>" alt="" class="img img-fluid img-thumbnail">
                    </div>
                    <div class="col-sm-12 col-md-8 linkhead">
                        <a class="link" href="{{route('singlenews',$category_news->id)}}">
                            <h2 class="linkhead">{{$category_news->title}}</h2>
                        </a>
                        <p>
                            {{$category_news->summary }}
                        </p>
                        <p>
                            <a href="{{route('singlenews',$category_news->id)}}">
                                Read More...
                            </a>
                        </p>
                    </div>
                </div>
                <hr>
            @endforeach
            {{$news->links()}}
        @endif
    @endif
</div>
@include('layouts.footer')
