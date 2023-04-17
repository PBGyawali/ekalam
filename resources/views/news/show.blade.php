@include('layouts.header')
<div class="container">

    @if(empty($newsPost))

    <div class="row d-flex align-items-center min-vh-100">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <h1 class='text-center text-info'>
                        The choosen News was not found.
                    </h1>
                </div>
            </div>
        </div>
    </div>

    @elseif (!$newsPost->is_active())

    <div class="row d-flex align-items-center min-vh-100">
        <div class="col-12">
            <div class="row">
                <div class="col-12 ">
                    <h1 class='text-center text-danger'>
                        Sorry the news post is currently not available.
                    </h1>
                </div>
            </div>
        </div>
    </div>
    @else

    <div class="row mt-5">
        <div class="col-12">
                <div class="row">
                    <div class="col-12 text-dark" >
                        <h1 class="text-center">
                            {{$newsPost->title}}
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center ">
                     <img src="<?php echo $newsPost->image;?>" alt="" class="img w-100">

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="text-justify" style="font-size: 20px; font-family: serif;">
                            {!! html_entity_decode($newsPost->description) !!}

                        </div>
                        <p>
                            <span>
                                <i class="fa fa-map-marker"></i>
                                {{$newsPost->location}},
                            </span>
                            <span>
                                <i class="fa fa-calendar"></i>
                                <?php echo $newsPost->news_date ?>
                            </span>

                            <br>
                            <small>
                                <em><p>
                                    Source:  {{$newsPost->source}}
                                </p>

                                </em>
                            </small>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <ul class="css-nav bg-dark">
                            <li>
                                <h4 class="text-white text-center">Comments</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                        <div class="col-12 fb-comments" data-href="<?= url()->current()?>" data-width="100%" data-numposts="5">
                        </div>
                </div>
                <hr>
                <div class="row mt-5">
                    <div class="col-12">
                        <h4>Share</h4>
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox_wyw2"></div>
                    </div>
                </div>


          @endif
                @if (isset($related_news) && !($related_news->isEmpty()))
                <div class="row">
                    <div class="col-12">
                        <ul class="css-nav bg-dark">
                            <li>
                                <h4 class="text-white text-center">Related News</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="row">
                                @foreach ($related_news as $related)
                                <div class="col-sm-12 col-md-3 ">
                                        <div class="row">
                                            <div class="col-12">
                                                <img src="<?php echo $related->image ?>" alt="" class="img img-fluid img-thumbnail">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 header1">
                                                <a href="id=<?php echo $related->id ?>">
                                                    <h4>
                                                        {{$related->title}}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>

@include('layouts.footer')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=211575796776720&autoLogAppEvents=1"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e8ca60b2eff2ca0"></script>



