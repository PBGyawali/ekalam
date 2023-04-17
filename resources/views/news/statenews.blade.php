<div class="tab-pane fade show active"  role="tabpanel" >
        <div class="spacing div"><!--spacing div open-->
            @if($state_wise ->isEmpty())
                <div class="alert alert-warning text-center font-weight-bold h1">NO NEWS FOUND</div>
            @else
                        @foreach($state_wise  as $mainkey=>$news_list)
                            @if($mainkey==0)
                                <div class="row mt-3">
                                    <div class="col-12 col-md-6">
                                        <a href="{{route('singlenews',$news_list->id)}}">
                                            <img src="{{$news_list->image}}" class="img img-fluid" >
                                            </a>
                                        <h1 class="nagdunga header1">
                                                <a href="{{route('singlenews',$news_list->id)}}">
                                                    {{$news_list->title}}
                                                </a>
                                        </h1>
                                        <p>{{$news_list->summary}}</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                            @else
                                    <div class=" col-12 col-md-4 header1 h5">
                                    <a href="{{route('singlenews',$news_list->id)}}">
                                            <img src="{{$news_list->image}}" class="img img-fluid">
                                    </a>
                                    <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">
                                        <a href="{{route('singlenews',$news_list->id)}}">
                                                {{$news_list->title}}
                                        </a>
                                    </p>
                                </div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div><!--spacing div closed-->
</div><!--tab pane closed-->

