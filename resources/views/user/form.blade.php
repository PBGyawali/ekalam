<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(' User Management') }}
    </h2>
</x-slot>
<div class="container container-fluid">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('user') }}" class="btn btn-outline-primary btn-sm">Go back</a>

                <div class="border rounded  mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">{{(isset($user) ) ? 'Edit ' : 'Add ' }} user</h1>
                    <hr>
                    <form action="" id="form" method="Post">
                        @csrf
                        @if(isset($user))
                         @method('PUT')
                        @endif
                        <div class="row">
                            <div class="control-group col-12">

                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter user name" value="{{ old('name')?old('name'):(isset($user)?$user->name:'') }}"required>
                                       @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="control-group col-12">

                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                       placeholder="Enter user email" value="{{ old('email')?old('email'):(isset($user)?$user->email:'') }}" required>
                                 @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="control-group col-12">

                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                       placeholder="Enter user password" value="{{ old('password')?old('password'):'' }}" {{ (!isset($user)?'required':'') }}>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-12 col-sm-6  mt-2">
                                <label for="status" class="col-sm-3">Status:</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" required class="form-control form-control-sm">
                                    <option value="inactive" {{(isset($user) && $user->status == 'inactive') ? 'selected' : '' }}>In-Active</option>
                                        <option value="active" {{(isset($user) && $user->status == 'active') ? 'selected' : '' }}>Active</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-12 col-sm-6  mt-2">
                                <label for="user_type" class="col-sm-3">Role:</label>
                                <div class="col-sm-9">
                                    <select name="user_type" id="user_type" required class="form-control form-control-sm">
                                    <option value="user" {{(isset($user) && $user->user_type== 'user') ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{(isset($user) && $user->user_type == 'admin') ? 'selected' : '' }}>Admin</option>
                                        <option value="editor" {{(isset($user) && $user->user_type == 'editor') ? 'selected' : '' }}>Editor</option>
                                        <option value="reporter" {{(isset($user) && $user->user_type == 'editor') ? 'selected' : '' }}>Reporter</option>

                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id" value="{{ isset($user)?$user->id:'' }}" >
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                {{(isset($user) ) ? 'Update ' : 'Add' }} user
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



</x-app-layout>


