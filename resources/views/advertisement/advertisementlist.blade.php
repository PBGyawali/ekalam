<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ ucwords(__('Advertisement Management')) }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">Advertisement List</div>

                <div class="flex-auto text-right mt-2">
                    <a href="{{ route('addadvertisement') }}" class="btn btn-primary btn-md">Add advertisement</a>
                </div>
            </div>
            <table class="w-full text-md rounded mb-4">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-3 ">ID</th>
                    <th class="text-left p-3 ">Name</th>
                    <th class="text-left p-3 ">Image</th>
                    <th class="text-left p-3 ">Position</th>
                    <th class="text-left p-3 ">Start date</th>
                    <th class="text-left p-3 ">End date</th>
                    <th class="text-left p-3 ">Status</th>
                    <th class="text-left p-3 ">Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($advertisements as $advertisement)
                    <tr class="border-b hover:bg-orange-100">
                        <td class="p-3 ">
                        {{ $advertisement->id }}
                        </td>
                        <td class="p-3 ">
                        {{ ucwords($advertisement->title) }}
                        </td>
                        <td class="p-3 ">
                        @if ($advertisement->image != null))
                                <img src="{{ $advertisement->image }}" title="{{$advertisement->title}}" class="img img-fluid img-thumbnail">
                        @endif
                        </td>
                        <td class="p-3 ">
                        {{ $advertisement->position }}
                        </td>
                        <td class="p-3 ">
                        {{ $advertisement->start_date }}
                        </td>
                        <td class="p-3 ">
                        {{ $advertisement->end_date }}
                        </td>
                        <td class="p-3 ">
                        {{ $advertisement->status }}
                        </td>
                        <td class="p-3 ">
                            <a href="./advertisement/id={{$advertisement->id}}" name="edit" class="bg-blue-500 hover:bg-green-700 text-white font-semibold px-2  rounded">Edit</a>
                            <form action="{{ route('advertisement')}}{{'/'.$advertisement->id }}" method='post' class="inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" name="delete" class="bg-red-500 hover:bg-green-700 text-white font-semibold px-1 py-0 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $advertisements->links() }}
        </div>
    </div>
</div>
</x-app-layout>
