<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ucwords( __('advertisement Management')) }}
    </h2>
</x-slot>
<div class="container container-fluid">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('advertisement') }}" class="btn btn-outline-primary btn-sm">Go back</a>

                <div class="border rounded  mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">{{ ucwords((isset( $advertisement)?'Edit':'Add').' '.'advertisement') }} </h1>
                    <hr>
                    <form action="" method="Post" id="form" enctype="multipart/form-data">
                        @csrf
                        @if(isset($advertisement))
                        @method('PUT')
                        @endif
                        <div class="row">
                            <div class="control-group col-12">

                                <label for="title">Title:</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter advertisement title" value="{{ isset( $advertisement)?$advertisement->title:'' }}"required>
                                       @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
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
                                    @if (isset($advertisement) && $advertisement->image != null )
                                        <img src="{{$advertisement->image }}" title="{{$advertisement->title}}" class="img img-fluid img-thumbnail">
                                      @endif

                                </div>
                            </div>

                            <div class="control-group col-12 mt-2">
                                <label for="" class="col-sm-3">Related Image:</label>
                                <div class="col-sm-4 mb-2">
                                    <input type="file" name="related_images[]" multiple accept="image/*">
                                </div>
                            </div>
                            @if (isset($advertisementImages) && !empty($advertisementImages))
                                <div class="form-group row">
                                    @foreach ($advertisementImages as $advertisement_image)
                                        @if ($advertisement_image->image != null ))
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <div class="col-12"> <img src="{{ $advertisement_image->image }}" title="{{$advertisement_image->title }}"class="img img-fluid img-thumbnail"></div>
                                                <div class="col-12 text-center mt-1"><input name="delete_images[]" type="checkbox" value="{{ $advertisement_image->image }}"> Delete</div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                             @endif
                             <div class="control-group col-12 col-sm-6 mt-2">
                                <label for="" class="col-3 col-sm-6">Start Date: </label>
                                <div class="col-sm-9">
                                    <input type="date" name="start_date" class="form-control form-control-sm" value="{{old('start_date')?old('start_date'):(isset($advertisement)?$advertisement->start_date->format('Y-m-d'): '' ) }}" id="start_date"  placeholder="Enter start date..." >
                                </div>
                                @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="control-group col-12 col-sm-6 mt-2">
                                <label for="" class="col-3 col-sm-6">End Date: </label>
                                <div class="col-sm-9">
                                    <input type="date" name="end_date" class="form-control form-control-sm" value="{{old('end_date')?old('end_date'):(isset($advertisement)?$advertisement->end_date->format('Y-m-d'): '' ) }}" id="end_date"  placeholder="Enter end date..." >
                                </div>
                                @error('end_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="control-group col-12 col-sm-6 mt-2">
                                <label for="status" class="col-12">Status:</label>
                                <div class="col-12 col-sm-6">
                                    <select name="status" id="status" required class="form-control form-control-sm">
                                    <option value="active" {{(isset( $advertisement) &&  $advertisement->status == 'active') ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{(isset( $advertisement) &&  $advertisement->status == 'inactive') ? 'selected' : '' }}>In-Active</option>
                                   </select>
                                </div>
                            </div>
                            <div class="control-group col-12 col-sm-6 mt-2">
                                <label for="status" class="col-12">Position:</label>
                                <div class="col-12 col-sm-6">
                                    <select name="position" id="status" required class="form-control form-control-sm">
                                    <option value="top" {{(isset( $advertisement) &&  $advertisement->position == 'top') ? 'selected' : '' }}>Top</option>
                                    <option value="bottom" {{(isset( $advertisement) &&  $advertisement->position == 'bottom') ? 'selected' : '' }}>Bottom</option>
                                   </select>
                                </div>
                            </div>
                            <input type="hidden" name="oldimage" value="{{isset($advertisement)?$advertisement->image :''}}">
                            <input type="hidden" id="id" name="id" value="{{isset($advertisement)?$advertisement->id:'' }}" >
                            <input type="hidden" id="user_id" name="added_by" value="{{ isset( $advertisement)?$advertisement->user_id:'' }}" >
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                {{ isset( $advertisement)?'Update':'Add' }} advertisement
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



</x-app-layout>


