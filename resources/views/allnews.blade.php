@include('layouts.header')
    <!-- Banner open-->
    <div class="banner-news mt-4">
    @foreach ($featured_news as $key => $list_news)
            <div class=" pt-3 text-center ">
                <div class="container">
                    <h1 class="header1 linkhead">
                        <a href="{{route('shownews')}}{{$list_news->id}}"> {{$list_news->title}} </a>
                    </h1>
                    @if ($key == 0)
                        @if (file_exists(config('constants.storage_path') . '/news/' . $list_news->image) && !empty($list_news->image))
                            <div class="mr-0 p-0">
                                <img src="{{   config('constants.storage_url').'/news/' . $list_news->image}}" class="w-100 img ">
                            </div>
                        @else
                            <img src="{{config('constants.asset_url').'/logo'}}'/logo.png'" class="img ">
                        @endif
                        <p class="img_content">
                            {{$list_news->summary}}
                        </p>
                    @endif
                </div>
            </div>
            <hr>
    @endforeach
    </div>
    <!-- Banner Closed-->
    <!-- Content Open -->
    <div class="listing">
        <div class="container">
            <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card img">
                            <img src="<?php echo  config('constants.storage_url').'/news/' . $first_element->image; ?>" class=" main-image-1 w-100 " alt="...">
                            <div class="card-body">
                                <p class="blacklink linkhead h2">
                                        <a href="{{route('shownews')}}{{$first_element->id }}">
                                            {{  $first_element->title }}
                                        </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                    @foreach($next_featured_news as $other_news)
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <img src="<?php echo  config('constants.storage_url').'/news/' . $other_news->image ?>"  class="w-100 img">
                                    </div>
                                    <div class="col-md-5">
                                        <p style="font-weight: 600; font-size: 1em;" class="list11">
                                        <h4 class="header1">
                                        <a href="{{route('shownews')}}<?=$other_news->id?>">
                                                {{ $other_news->title }}
                                            </a>
                                        </h4>
                                        </p>
                                    </div>
                                </div>

                    @endforeach
                    </div>
                    <hr>
                    </div>
            </div>
        </div>
    </div>
    <!-- Content Closed -->

        <!-- Listing_paage -->
        <div class="title_news">
            <div class="container">
                <ul class="css-nav p-0">
                    <li class="w-100 bg-dark text-center "><a href="{{route('showcategory')}}11" class="text-white"><h2>Politics</h2></a></li>
                </ul>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="header1 linkhead">
                                    <a href="{{route('shownews')}}<?php echo $first_category_element->id; ?>">
                                        {{ $first_category_element->title}}
                                    </a>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class=" linkhead">
                                <a href="{{route('shownews')}}<?php echo $first_category_element->id; ?>">
                                    <img src="<?php echo  config('constants.storage_url').'/news/'.$first_category_element->image  ?>" class="img ">
                                </a>
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <p class="summary-text">
                                   {{  $first_category_element->summary}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    @foreach ($first_category as $cat_news)
                            <div class="col-12 col-sm-4 col-md-3">
                                <img src="<?php echo config('constants.storage_url').'/news/' . $cat_news->image ?>"  class="img ">
                                <p class="three_nepali mt-3">
                                       <h5 class="header1">
                                       <a href="{{route('shownews')}}{{$cat_news->id}}">
                                        {{ $cat_news->title }}
                                    </a>
                                       </h5>
                                </p>
                            </div>
                    @endforeach
                </div>
                <hr>

                    <div class="row mt-3">
                        <div class="col-md-6">
                        @foreach ($second_category as $cat_news_left)
                                <div class="row mt-3">
                                    <div class="col-md-5">
                                        <img src="<?php echo config('constants.storage_url').'/news/'.$cat_news_left->image  ?>" class="img " style="border:1px solid #e8edf4;">
                                    </div>
                                    <div class="col-md-5">
                                        <p style="font-weight: 600; font-size: 1em;" class="list11 header1">
                                            <a href="{{route('shownews')}}<?php echo $cat_news_left->id ?>">
                                                {{$cat_news_left->title }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        <div class="col-md-6">
                        @foreach ($third_category as $right_news)
                                    <div class="row mt-3">
                                        <div class="col-md-5">
                                            <img src="<?php echo  config('constants.storage_url').'/news/' . $right_news->image; ?>"  class="img " style="border:1px solid #e8edf4;">
                                        </div>
                                        <div class="col-md-5">
                                            <p style="font-weight: 600; font-size: 1em;" class="list11 header1">
                                                <a href="{{route('shownews')}}{{$right_news->id}}">
                                                    {{ $right_news->title}}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>

            </div>
        </div>
        <!-- ListingPage closed -->

    <!-- State Open -->
 <div class="country">
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <nav class="navbar navbar-dark bg-dark w-100" style="border-radius: 20px;">
                    <span class="navbar-brand text-white">State</span>
                    <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                       <a class="shadow-none nav-item btn bg-dark text-white loading invisible" >
                             <i class="fa fa-spinner fa-pulse"></i> PLEASE WAIT
                        </a>
                        <?php $all=config('constants.states');array_shift($all);?>
                        @foreach( $all as $key=> $state)
                            <a class="nav-item nav-link btn btn-rounded bg-dark text-white btn-outline-warning statestab {{ $key == 'state1' ? 'active' : 'text-white' }}" data-state="{{ $key}}"id="nav-{{ $key}}-tab" data-toggle="tab" href="#nav-{{$key}}" role="tab" >
                                {{ $state}}
                            </a>
                        @endforeach
                    </div>
                </nav>
                <!--tab content open-->
                <div class="tab-content" id="nav-tabContent">
                    <span class="statenewsdata">
                    @foreach($state_wise as $mainkey=>$statenews)
                    <!--tab pane open-->
                        <div class="tab-pane fade <?= $mainkey=='state1'?'show active '.$mainkey : '' ?>" id="nav-{{$mainkey}}" role="tabpanel" aria-labelledby="nav-{{$mainkey}}-tab">
                            <div class="pb-5 spacing div"><!--spacing div open-->
                                @foreach ($statenews as $key=>$news_list)
                                @if($loop->first)
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <a href="{{route('shownews')}}<?= $news_list->id; ?>">
                                                <img src="<?= config('constants.storage_url').'/news/'.$news_list->image; ?>" class="img img-fluid" >
                                        </a>
                                        <h1 class="nagdunga">
                                            <a href="{{route('shownews')}}<?= $news_list->id; ?>">
                                                {{$news_list->title}}
                                            </a>
                                        </h1>
                                        <p>{{$news_list->summary}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                @endif
                                @if(!$loop->first && !$loop->last)
                                    <div class="col-sm-6 col-md-4 header1 h5">
                                        <a href="{{route('shownews')}}<?= $news_list->id; ?>">
                                                <img src="<?= config('constants.storage_url').'/news/'.$news_list->image; ?>" class="img img-fluid">
                                        </a>
                                        <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">
                                            <a href="{{route('shownews')}}<?= $news_list->id; ?>">
                                                {{$news_list->title}}
                                            </a>
                                        </p>
                                    </div>
                                @endif
                                @if($loop->last)
                                            <div class="col-sm-6 col-md-4 header1 h5">
                                                <a href="{{route('shownews')}}<?= $news_list->id; ?>">
                                                    <img src="<?= config('constants.storage_url').'/news/'.$news_list->image; ?>" class="img img-fluid">
                                                </a>
                                                <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">
                                                    <a href="{{route('shownews')}}<?= $news_list->id; ?>">
                                                        {{$news_list->title}}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                            </div><!--spacing div closed-->
                        </div><!--tab pane closed-->
                    @endforeach
                </span>
                </div><!--tab content Closed-->
            </div>
        </div>
    </div>
</div>
  <!--State Closed-->


        <!-- Listing_page -->
        <div class="title_news">
            <div class="container">
                <ul class="css-nav p-0">
                    <li class="w-100 bg-dark text-center "><a href="category/showall=11" > <h2 class="text-white">Sports</h2></a></li>
                </ul>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <h1 class=" text-center mt-2 header1 linkhead">
                                    <a href="{{route('shownews')}}<?php echo $second_news->id; ?>">
                                        {{ $second_news->title}}
                                    </a>
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('shownews')}}">
                                    <img src="<?php echo config('constants.storage_url').'/news/' . $second_news->image ?>" style="height: auto; width: 100%;">
                                </a>
                            </div>
                            <div class="col-md-6">
                                <p class="summary-text">
                                    <?php echo $second_news->summary; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                @foreach ($sports_news as $sop_news)
                            <div class="col-md-3">
                                <img src="<?php echo  config('constants.storage_url').'/news/' . $sop_news->image ?>"  class="img img-fluid">

                                <p class="three_nepali mt-3 linkhead h5">
                                    <a href="{{route('shownews')}}{{$sop_news->id}}">
                                        <?php echo $sop_news->title ?>
                                    </a>
                                </p>
                            </div>
                @endforeach
                </div>
            </div>
        </div>
        <!-- ListingPage closed -->

        @include('layouts.footer')
        <script>
            $(document).ready(function(){
                $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                $(document).on('click', '.statestab', function(){
                    var state = $(this).data('state');
                    url='{{route('news')}}'
                    $.ajax({
                          url: url,
                          method:"POST",
                          data:{statename:state},
                          dataType:'JSON',
                          error:function(request)
                            {
                                alert(request.responseJSON.message);
                            },
                            beforeSend:function()
                            {
                                $(".loading").removeClass('invisible');
                            },
                            complete:function()
                            {
                                $(".loading").addClass('invisible');
                            },
                          success:function(data)
                          {
                            $(".tab-pane").replaceWith(data);
                          }
                    })
                });

            });
            </script>
