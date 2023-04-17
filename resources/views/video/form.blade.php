<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ucwords( __('Video Management')) }}
        </h2>
    </x-slot>
    <div class="container container-fluid">
            <div class="row">
                <div class="col-12 pt-2">
                    <a href="{{ route('video') }}" class="btn btn-outline-primary btn-sm">Go back</a>
         <div class="border rounded  mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">{{ ucwords((isset( $video)?'Edit':'Add').' '.'video') }} </h1>
                        <hr>
                        <form action="" method="Post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($video))
                            @method('PUT')
                            @endif
                            <div class="row">
                                <div class="control-group col-12">
                                    @if(isset($data))
                                    {{$data->title }}
                                    @endif

                                    <label for="title">Title</label>
                                    <input type="text" id="title" class="form-control" name="title"
                                           placeholder="Enter video title" value="{{ isset( $video)?$video->title:'' }}"required>
                                           @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="control-group col-12 mt-2 ">
                                    <label for="summary" class="col-sm-3">Summary: </label>
                                    <div class="col-sm-12">
                                        <textarea name="summary" id="summary" rows="5" placeholder="Enter video Summary." style="resize:none;" class="form-control form-control-sm">{{ (isset($video) ) ?$video->summary: ''  }}</textarea>
                                    </div>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="" class="col-12">Cover link:</label>
                                    <div class="col-12">
                                        <input type="text" name="link" id="link" class="form-control"  placeholder="Enter video link" value="{{ isset( $video)?$video->link:'' }}"required>
                                        @if ($errors->has('link'))
                                            <span class="text-danger">{{ $errors->first('link') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="control-group col-12 mt-2">
                                    <label for="status" class="col-12">Status:</label>
                                    <div class="col-12 col-sm-3">
                                        <select name="status" id="status" required class="form-control form-control-sm">
                                        <option value="active" {{(isset( $video) &&  $video->status == 'active') ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{(isset( $video) &&  $video->status == 'inactive') ? 'selected' : '' }}>In-Active</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="id" name="id" value="{{isset($video)?$video->id:'' }}" >
                                <input type="hidden" id="user_id" name="user_id" value="{{ isset( $video)?$video->user_id:'' }}" >
                            </div>
                            <div class="row mt-2">
                                <div class="control-group col-12 text-center">
                                    <button id="btn-submit" class="btn btn-primary">
                                    {{ isset( $video)?'Update':'Add' }} video
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



    </x-app-layout>


