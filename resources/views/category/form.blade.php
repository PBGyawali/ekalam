<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Category Management') }}
    </h2>
</x-slot>
<div class="container container-fluid">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('category') }}" class="btn btn-outline-primary btn-sm">Go back</a>

                <div class="border rounded  mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">{{ isset( $category)?'Edit':'Add' }} category</h1>
                    <hr>
                    <form action="" method="Post" id="form" enctype="multipart/form-data">
                        @csrf
                        @if(isset($category))
                        @method('PUT')
                        @endif
                        <div class="row">
                            <div class="control-group col-12">

                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter category name" value="{{ old('name')?old('name'):(isset( $category)?$category->name:'') }}"required>
                                       @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group row mt-2">
                                <label for="status" class="col-sm-3">Status:</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" required class="form-control form-control-sm">
                                    <option value="active" {{ old('status') == 'active'||(old('status') != 'inactive' && isset( $category)&&  $category->status=='active')?'selected': '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive'||(old('status') != 'active' && isset( $category)&&  $category->status=='inactive')?'selected': '' }}>In-Active</option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" id="id" name="id" value="{{ isset( $category)?$category->id:'' }}" >
                            <input type="hidden" id="user_id" name="user_id" value="{{ isset( $category)?$category->user_id:'' }}" >
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                {{ isset( $category)?'Update':'Add' }} category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



</x-app-layout>


