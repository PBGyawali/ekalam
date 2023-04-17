<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('News Management') }}
    </h2>
</x-slot>
<div class="container container-fluid">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('news') }}" class="btn btn-outline-primary btn-sm">Go back</a>

                <div class="border rounded  mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">{{(isset($post) ) ? 'Edit ' : 'Add ' }} Post</h1>
                    <hr>
                    <form action="" method="POST" id="form" enctype="multipart/form-data" novalidate>
                        @csrf
                        @if(isset($post))
                         @method('PUT')
                        @endif
                    <div class="row">
                    <div class="control-group col-12">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Post Title" value="{{ old('title')?old('title'):(isset($post)?$post->title: '' )  }}" data-parsley-required>
                                    @error('title')
                                          <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="control-group col-12 mt-2 ">
                                <label for="summary" class="col-sm-3">Summary: </label>
                                <div class="col-sm-12">
                                    <textarea name="summary" id="summary" rows="5" placeholder="Enter Post Summary." style="resize:none;" class="form-control form-control-sm">{{ old('summary')?old('summary'):(isset($post)?$post->summary: '' ) }}</textarea>
                                </div>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="description">Post Description</label>
                                <textarea id="description" class="form-control" name="description" placeholder="Enter Post description"
                                          rows="5" >{{ old('description')?old('description'):(isset($post)?$post->description: '' )  }}</textarea>
                                    @error('description')
                                          <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="control-group col-12  mt-2 ">
                                <label for="" class="col-3 col-sm-6">Category:</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="category_id" class="form-control from-control-sm">
                                        <option value="" disabled selected>-- Select Any One --</option>
                                        @foreach($categories as $category)
                                                <option value="{{$category->id }}" {{old('category_id')==$category->id?'selected':((isset($post) && $post->category_id == $category->id) ? 'selected' : '') }}>
                                                {{ $category->name}}
                                                </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="control-group col-12 col-sm-6 mt-2">
                                <label for="" class="col-3 col-sm-6">States:</label>
                                <div class="col-sm-9">
                                    <select name="state" id="state" required class="form-control from-control-sm">
                                    @foreach( config('constants.states') as $key=> $state)
                                    <option value="{{$key}} " {{ old('state')==$key?'selected' :((isset($post) && $post->state == $key) ? 'selected' : '') }}>
                                            {{$state}}
                                            </option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group  col-12 col-sm-6 mt-2">
                                <label for="" class="col-3 col-sm-6">Location: </label>
                                <div class="col-sm-9">
                                    <input type="text" name="location" class="form-control form-control-sm" value="{{ old('location')?old('location'):(isset($post)?$post->location: '' ) }}" id="location" placeholder="Enter News Location..." >
                                </div>
                            </div>
                            <div class="control-group col-12 col-sm-6 mt-2">
                                <label for="" class="col-3 col-sm-6">Date: </label>
                                <div class="col-sm-9">
                                    <input type="date" name="news_date" class="form-control form-control-sm" value="{{old('news_date')?old('news_date'):(isset($post)?$post->news_date: '' ) }}" id="news_date"  placeholder="Enter News date..." >
                                </div>
                                @error('news_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="control-group col-12 col-sm-6 mt-2">
                                <label for="" class="col-3 col-sm-6">News Source: </label>
                                <div class="col-sm-9">
                                    <input type="text" name="source" class="form-control form-control-sm" value="{{ old('source')?old('source'):(isset($post)?$post->source: '' ) }}" id="source" placeholder="Enter News Source..." >
                                </div>
                            </div>

                            <div class="control-group col-12 mt-2">
                                <label for="" class="col-12 col-sm-6">Image:</label>
                                <div class="col-sm-4">
                                    <input type="file" name="image" id="image" accept="image/*">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @if(isset($post) && $post->has_image())
                                <div class="col-sm-12">
                                        <img src="{{ $post->image}}" alt="" class="img img-fluid img-thumbnail">
                                </div>
                                @endif
                            </div>
                            <div class="control-group col-12 col-sm-6  mt-2">
                                <label for="" class="col d-inline">Featured : </label>
                                    <input type="checkbox" class="" name="featured" value="1" {{ old('featured')==true||(isset($post) && $post->featured == true) ? 'checked=checked' : '' }} >
                            </div>
                            <div class="form-group col-12 col-sm-6  mt-2">
                                <label for="status" class="col-sm-3">Status:</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" required class="form-control form-control-sm">
                                    <option value="active" {{ old('status') == 'active'||(old('status') != 'inactive' && isset( $post)&&  $post->status=='active')?'selected': '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive'||(old('status') != 'active' && isset( $post)&&  $post->status=='inactive')?'selected': '' }}>In-Active</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id" value="{{(isset($post) )?$post->id:''}}" >
                        </div>

                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                {{(isset($post) ) ? 'Update ' : 'Add' }} Post
                                </button>
                                <button class="btn btn-danger" type="reset">
                                        <i class="fa fa-trash">Re-set</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- include libraries(jQuery, bootstrap) -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 


<script>
    $('#description').summernote({
        height: 250,
    })

</script>
</x-app-layout>


