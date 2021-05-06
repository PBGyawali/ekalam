<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('User Management') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">User List</div>
                
                <div class="flex-auto text-right mt-2">
                    <a href="{{ route('adduser') }}" class="btn btn-primary btn-md">Add User</a>
                </div>
            </div>
            <table class="w-full text-md rounded mb-4 table-">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">ID</th>
                    <th class="text-left p-3 px-5">Name</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">User Type</th>
                    <th class="text-left p-3 px-5">Status</th>
                    <th class="text-left p-3 px-5">Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="border-b table-striped table-bordered">
                        <td class="p-3 ">
                        {{ $user->id }}
                        </td>
                        <td class="p-3 ">
                        {{ ucwords($user->name) }}
                        </td>
                        <td class="p-3 ">
                        {{ $user->email }}
                        </td>
                        <td class="p-3 ">
                        {{ $user->user_type }}
                        </td>
                        <td class="p-3 ">
                        {{ $user->status }}
                        </td>
                        <td class="p-3 ">
                            
                            <a href="./user/id={{$user->id}}" name="edit" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('user')}}{{'/'.$user->id }}" method='post' class="inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
</x-app-layout>