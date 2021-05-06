<?php
$no_news = false;
        if (!$post) {
            $no_news = true;
        }
?>
@include('layouts.header') 
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <?php
            if ($no_news) {
                echo "<h1 class='alert alert-danger'>No News.</h1>";
            } else {
            ?>
                <div class="row">
                    <div class="col-12 text-dark" >
                        <h1 class="text-center">
                            <?php echo $post->title; ?>
                        </h1>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 text-center ">
                        @if (!empty($post->image) && file_exists(config('constants.storage_path').'/news/'.$post->image))                        
                            <img src="<?php echo config('constants.storage_url').'/news/'.$post->image;?>" alt="" class="img img-fluid">                        
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="text-justify">
                            <?php
                            echo html_entity_decode($post->description);
                            ?>
                        </div>
                        <?php
                        ?>
                        <p>
                            <span>
                                <i class="fa fa-map-marker"></i>
                                <?php echo $post->location; ?>,
                            </span>
                            <span>
                                <i class="fa fa-calendar"></i>
                                <?php echo $post->news_date ?>
                            </span>

                            <br>
                            <samll>
                                <em>
                                    Source: <?php echo $post->source; ?>
                                </em>
                            </samll>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <ul class="css-nav bg-dark">
                            <li>
                                <h4 class="text-white">Comments</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="fb-comments" data-href="<?php echo ''//getCurrentUrl();?>" data-width="100%" data-numposts="5"></div>
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
                <div class="row">
                    <div class="col-12">
                        <ul class="css-nav bg-dark">
                            <li>
                                <h4 class="text-white">Related News</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="row">                           
                            @if (isset($related_news)) 
                                @foreach ($related_news as $related) 
                                <div class="col-sm-12 col-md-3 ">
                                        <div class="row">
                                            <div class="col-12">
                                                <img src="<?php echo config('constants.storage_url') . '/news/' . $related->image ?>" alt="" class="img img-fluid img-thumbnail">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 header1">
                                                <a href="news/id=<?php echo $related->id ?>">
                                                    <h4>
                                                        <?php
                                                        echo $related->title
                                                        ?>
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
            <?php } ?>
        </div>
    </div>
</div>
@include('layouts.footer') 
