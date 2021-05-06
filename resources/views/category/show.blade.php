@include('layouts.header')
<div class="container mt-3">
    @if(empty($category_info)) 
        <h1 class='alert alert-danger text-center'>The choosen Category was not found.</h1>
    @else 
        <div class="row">
            <div class="col-12">
                <ul class="css-nav bg-dark">
                    <li>
                        <h4 class="text-white">{{$category_info->name}}</h4>
                    </li>
                </ul>
            </div>
        </div>
        @if (empty($news[0]->id))
            <h1 class='alert alert-danger text-center'>No News was found</h1>;
        @else
            @foreach ($news as $category_news)
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <img src="<?php echo config('constants.storage_url') . '/news/' . $category_news->image ?>" alt="" class="img img-fluid img-thumbnail">
                    </div>
                    <div class="col-sm-12 col-md-8 linkhead">
                        <a class="link" href="{{route('shownews')}}<?php echo $category_news->id?>">
                            <h2 class="linkhead">{{$category_news->title}}</h2>
                        </a>
                        <p>
                            {{$category_news->summary }}
                        </p>
                        <p>
                            <a href="{{route('shownews')}}<?php echo $category_news->id?>">
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