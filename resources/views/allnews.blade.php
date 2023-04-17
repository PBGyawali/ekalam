@include('layouts.header')
    <!-- Banner open-->
    <div class="banner-news mt-4">
    @foreach ($featured_news as $list_news)
        @if(!($loop->iteration>3))
            <div class=" pt-3 text-center ">
                <div class="container">
                    <h1 class="header1 linkhead">
                        <a href="{{route('singlenews',$list_news->id)}}"> {{$list_news->title}} </a>
                    </h1>
                    @if($loop->index==0)
                            <div class="mr-0 p-0">
                                <img src="{{ $list_news->image}}" class="w-100 img ">
                            </div>
                        <p class="img_content">
                            {{$list_news->summary}}
                        </p>
                    @endif
                </div>
            </div>
            <hr>
        @endif
    @endforeach
    </div>
    <!-- Banner Closed-->
       <!-- Content Open -->
       <div class="listing">
        <div class="container">
            <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card img">
                            @foreach ($featured_news as $key => $first_element)
                                @if($loop->remaining==0)
                                    <img src="<?php echo $first_element->image; ?>" class=" main-image-1 w-100 " alt="...">
                                    <div class="card-body">
                                        <p class="blacklink linkhead h2">
                                                <a href="{{route('singlenews',$first_element->id) }}">
                                                    {{  $first_element->title }}
                                                </a>
                                        </p>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        @foreach ($featured_news as $key => $other_news)
                                @if($loop->iteration>3 && $loop->iteration<=6)
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <img src="<?php echo $other_news->image ?>"  class="w-100 img">
                                    </div>
                                    <div class="col-md-5">
                                        <p style="font-weight: 600; font-size: 1em;" class="list11">
                                        <h4 class="header1">
                                        <a href="{{route('singlenews',$other_news->id)}}">
                                                {{ $other_news->title }}
                                            </a>
                                        </h4>
                                        </p>
                                    </div>
                                </div>
                                @endif
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
                    <li class="w-100 bg-dark text-center "><a href="{{route('categorynews',11)}}" class="text-white"><h2>Politics</h2></a></li>
                </ul>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="header1 linkhead">
                                @foreach ($category_news as $first_category_element)
                                    @if($loop->iteration==1)
                                                    <a href="{{route('singlenews',$first_category_element->id)}}">
                                                        {{ $first_category_element->title}}
                                                    </a>
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class=" linkhead">
                                                <a href="{{route('singlenews',$first_category_element->id)}}">
                                                    <img src="<?php echo  $first_category_element->image  ?>" class="img ">
                                                </a>
                                                </h5>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="summary-text">
                                                {{  $first_category_element->summary}}
                                                </p>
                                            </div>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    @foreach ($category_news as $cat_news)
                        @if($loop->iteration>1 && $loop->iteration<=4)
                                    <div class="col-12 col-sm-4 col-md-3">
                                        <img src="<?php echo $cat_news->image ?>"  class="img ">
                                        <p class="three_nepali mt-3">
                                            <h5 class="header1">
                                            <a href="{{route('singlenews',$cat_news->id)}}">
                                                {{ $cat_news->title }}
                                            </a>
                                            </h5>
                                        </p>
                                    </div>
                            @endif
                    @endforeach
                </div>
                <hr>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            @foreach ($category_news as $cat_news_left)
                                    @if($loop->iteration>4 && $loop->iteration<=7)
                                        <div class="row mt-3">
                                            <div class="col-md-5">
                                                <img src="<?php echo $cat_news_left->image  ?>" class="img " style="border:1px solid #e8edf4;">
                                            </div>
                                            <div class="col-md-5">
                                                <p style="font-weight: 600; font-size: 1em;" class="list11 header1">
                                                    <a href="{{route('singlenews',$cat_news_left->id)}}">
                                                        {{$cat_news_left->title }}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            @foreach ($category_news as $right_news)
                                @if($loop->count>=10 && $loop->remaining<3)
                                        <div class="row mt-3">
                                            <div class="col-md-5">
                                                <img src="<?php echo $right_news->image; ?>"  class="img " style="border:1px solid #e8edf4;">
                                            </div>
                                            <div class="col-md-5">
                                                <p style="font-weight: 600; font-size: 1em;" class="list11 header1">
                                                    <a href="{{route('singlenews',$right_news->id)}}">
                                                        {{ $right_news->title}}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                @endif
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
                            <a class="nav-item nav-link btn btn-rounded bg-dark text-white btn-outline-warning statestab
                            {{ $key == 'state1' ? 'active' : 'text-white' }}" data-state="{{$key}}"
                            data-url="{{route('statenews')}}"  role="tab" >
                                {{ ucfirst($state)}}
                            </a>
                        @endforeach
                    </div>
                </nav>
                <!--tab content open-->
                <div class="tab-content" id="nav-tabContent">
                  @include('news.statenews')
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
                    @foreach ($sports_news as $second_news)
                         @if($loop->iteration==1)
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class=" text-center mt-2 header1 linkhead">
                                            <a href="{{route('singlenews',$second_news->id)}}">
                                                {{ $second_news->title}}
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{route('singlenews',$second_news->id)}}">
                                            <img src="<?php echo $second_news->image ?>" style="height: auto; width: 100%;">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="summary-text">
                                            <?php echo $second_news->summary; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                <div class="row mt-3">
                @foreach ($sports_news as $sop_news)
                    @if($loop->iteration!=1)
                            <div class="col-md-3">
                                <img src="<?php echo $sop_news->image ?>"  class="img img-fluid">

                                <p class="three_nepali mt-3 linkhead h5">
                                    <a href="{{route('singlenews',$sop_news->id)}}">
                                        <?php echo $sop_news->title ?>
                                    </a>
                                </p>
                            </div>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
        <!-- ListingPage closed -->
        @include('layouts.footer')
        <script>


    //all other ajax function need to be below this or they will throw error
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $( document ).ajaxError(function( event, request, settings, thrownError ) {
            alert(request.responseText)
    });

                $(document).on('click', '.statestab', function(){
                    $('.statestab').removeClass('active');
                    $(this).addClass('active');
                    var state = $(this).data('state');
                    url=$(this).data('url')
                    $.ajax({
                          url: url,
                          method:"POST",
                          data:{state:state},
                            beforeSend:function(){
                                $(".loading").removeClass('invisible');
                            },
                            complete:function(){
                                $(".loading").addClass('invisible');
                            },
                            success:function(data){
                                $(".tab-pane").replaceWith(data);
                            }
                    })
                });

            </script>
