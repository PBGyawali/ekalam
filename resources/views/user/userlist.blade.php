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
            <table class="w-full text-md rounded mb-4 text-center table-striped table-bordered">
                <thead>
                <tr class="">
                    <th class="py-3">ID</th>
                    <th class=" py-3">Name</th>
                    <th class="py-3">Email</th>
                    <th class="py-3">User Type</th>
                    <th class="py-3">Status</th>
                    <th class=" py-3">Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="border-b ">
                        <td class="py-3 ">
                        {{ $user->id }}
                        </td>
                        <td class="py-3 ">
                        {{ ucwords($user->name) }}
                        </td>
                        <td class="py-3 ">
                        {{ $user->email }}
                        </td>
                        <td class="py-3 ">
                        {{ $user->user_type }}
                        </td>
                        <td class="py-3 ">
                        {{ $user->status }}
                        </td>
                        <td class="py-3 ">

                            <a href="./user/id={{$user->id}}" name="edit" class="bg-blue-500 hover:bg-green-700 text-white font-semibold px-2  rounded">Edit</a>
                            <form action="{{ route('user')}}{{'/'.$user->id }}" method='post' class="inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" name="delete" class="bg-red-500 hover:bg-green-700 text-white font-semibold px-1 py-0 rounded">Delete</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
</x-app-layout>
