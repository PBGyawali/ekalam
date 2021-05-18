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
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?php $all=config('constants.states');
                                array_shift($all);
                        ?>
                            @foreach( $all as $key=> $state)
                                <a class="nav-item nav-link btn btn-rounded bg-dark text-white btn-outline-warning {{ $key == 'state1' ? 'active' : 'text-white' }}" id="nav-{{ $key}}-tab" data-toggle="tab" href="#nav-{{$key}}" role="tab" >
                                    {{ $state}}
                                </a>
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <?php $first_state_news = array_shift($state_wise);?>
                            <div class="tab-pane fade <?php echo '$key' == 'state1' ? 'show active' : '' ?>" id="nav-<?php echo' $key'; ?>" role="tabpanel" aria-labelledby="nav-<?php echo'' //$key; ?>-tab">
                                  <div class="row mt-3">
                                        <div class="col-md-6">
                                            <a href="{{route('shownews')}}<?=$first_state_news[0]->id?>">
                                            @if(file_exists(config('constants.storage_path') . '/news/' . $first_state_news[0]->image) && !empty($first_state_news[0]->image))
                                                    <img src="<?php echo config('constants.storage_url').'/news/'.$first_state_news[0]->image; ?>" style="width: 100%; height: auto;">
                                                @else
                                                    <img src="<?php echo config('constants.asset_url').'/logo'.'/logo.png'; ?>" style="width: 100%; height: auto;">
                                                @endif
                                            </a>
                                            <h1 class="nagdunga">
                                                <a href="{{route('shownews')}}<?=$first_state_news[0]->id?>">
                                                   {{ $first_state_news[0]->title}}
                                                </a>
                                            </h1>
                                            <p>{{ $first_state_news[0]->summary}}</p>
                                        </div>

                                        <div class="col-md-6">

                                        @foreach($state_wise as $mainkey=>$statenews)

                                            <div class="row">
                                                @foreach ($statenews as $news_list)
                                                        <div class="col-sm-6 col-md-4 header1 h5 mt-2">
                                                            <a href="{{route('shownews')}}<?php echo $news_list->id; ?>">
                                                            @if(file_exists(config('constants.storage_path') . '/news/' . $news_list->image) && !empty($news_list->image))
                                                                    <img src="<?php echo  config('constants.storage_url').'/news/' . $news_list->image; ?>" class="">
                                                              @else
                                                                    <img src="<?php echo config('constants.asset_url').'/logo'.'/logo.png'; ?> " class="">
                                                             @endif
                                                            </a>
                                                            <p class="pt-5 header1 "style="font-weight: 400; font-size: 16px;">
                                                                <a class="h5" href="{{route('shownews')}}<?php echo $news_list->id; ?>">
                                                                   {{  $news_list->title}}
                                                                </a>
                                                            </p>
                                                        </div>
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>

                    </div>
                </div>
                @if(isset($advertisements))
                    @foreach($advertisements as $home_2)
                        <div class="col-md-3">
                            <div class="ad">
                                <a href="" target="_ads">
                                    <img src="<?php echo config('constants.storage_path') . '/ad/' . $home_2->image ?>" style="width: 100%;" alt="<?php echo $home_2->title ?>">
                                </a>
                            </div>
                        </div>
                    @endforeach
               @endif
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
                                <img src="<?php echo  config('constants.storage_url').'/news/' . $sop_news->image ?>"  style="width: 100%; height: auto;">

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
