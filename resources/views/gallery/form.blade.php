<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Gallery Management') }}
    </h2>
</x-slot>
<div class="container container-fluid">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('gallery') }}" class="btn btn-outline-primary btn-sm">Go back</a>

                <div class="border rounded  mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">{{ isset( $gallery)?'Edit':'Add' }} gallery</h1>
                    <hr>
                    <form action="" method="Post" id="form" enctype="multipart/form-data">
                        @csrf
                        @if(isset($gallery))
                        @method('PUT')
                        @endif
                        <div class="row">
                            <div class="control-group col-12">

                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter gallery name" value="{{ isset( $gallery)?$gallery->name:'' }}"required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="control-group col-12 mt-2 ">
                                <label for="summary" class="col-sm-3">Summary: </label>
                                <div class="col-sm-12">
                                    <textarea name="summary" id="summary" rows="5" placeholder="Enter gallery Summary." style="resize:none;" class="form-control form-control-sm">{{ (isset($gallery) ) ?$gallery->summary: ''  }}</textarea>
                                </div>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="" class="col-12 col-sm-3">Cover Image:</label>
                                <div class="col-12 col-sm-3">
                                    <input type="file" name="image" id="image" accept="image/*">
                                </div>
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                                <div class="col-12 col-sm-6">
                                    @if (isset($gallery) && $gallery->image != null))
                                        <img src="{{$gallery->image }}" title="{{basename($gallery->image)}}" class="img img-fluid img-thumbnail">
                                      @endif

                                </div>
                            </div>

                            <div class="control-group col-12 mt-2">
                                <label for="" class="col-sm-3">Related Image:</label>
                                <div class="col-sm-4 mb-2">
                                    <input type="file" name="related_images[]" multiple accept="image/*">
                                </div>
                            </div>

                            <div class="control-group row mt-2">
                                 @if (isset($galleryImages) && !$galleryImages->isEmpty())
                                    @foreach ($galleryImages as $gallery_image)
                                        @if ($gallery_image->image!= null)
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <div class="col-12"> <img src="{{ $gallery_image->image }}" title="{{basename($gallery_image->image) }}"class="img img-fluid img-thumbnail"></div>
                                                <div class="col-12 text-center mt-1"><input name="delete_images[]" type="checkbox" value="{{ $gallery_image->image }}"> Delete</div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>

                             @isset($galleryImages)
                                {{$galleryImages->links()}}
                             @endisset
                            <div class="control-group col-12 mt-2">
                                <label for="status" class="col-sm-3">Status:</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" required class="form-control form-control-sm">
                                    <option value="active" {{(isset( $gallery) &&  $gallery->status == 'active') ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{(isset( $gallery) &&  $gallery->status == 'inactive') ? 'selected' : '' }}>In-Active</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="oldimage" value="{{isset($gallery)?$gallery->image :''}}">
                            <input type="hidden" id="id" name="id" value="{{isset($gallery)?$gallery->id:'' }}" >
                            <input type="hidden" id="user_id" name="added_by" value="{{ isset( $gallery)?$gallery->user_id:'' }}" >
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                {{ isset( $gallery)?'Update':'Add' }} gallery
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



</x-app-layout>


