<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('category Management') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">category List</div>

                <div class="flex-auto text-right mt-2">
                    <a href="{{ route('addcategory') }}" class="btn btn-primary btn-md">Add category</a>
                </div>
            </div>
            <table class="w-full text-md rounded mb-4">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-3 ">ID</th>
                    <th class="text-left p-3 ">Name</th>
                    <th class="text-left p-3 ">Status</th>
                    <th class="text-left p-3 ">Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 ">
                        {{ $category->id }}
                        </td>
                        <td class="p-3 ">
                       <a href="{{route('showcategory')}}{{ $category->id }}">{{ ucwords($category->name) }}</a>
                        </td>
                        <td class="p-3 ">
                        {{ $category->status }}
                        </td>
                        <td class="p-3 ">

                            <a href="./category/id={{$category->id}}" name="edit" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('category')}}{{'/'.$category->id }}" method='post' class="inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>
</x-app-layout>
