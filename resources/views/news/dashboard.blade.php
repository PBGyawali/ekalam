<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">News List</div>

                <div class="flex-auto text-right mt-2">
                    <a href="{{ route('createnews') }}" class="btn btn-primary btn-md">Add News</a>
                </div>
            </div>
            <table class="w-full text-md  rounded mb-4 text-center table-striped table-bordered">
                <thead>
                <tr class="border-b">
                    <th class="py-3">ID</th>
                    <th class="py-3">News</th>
                    <th class=" py-3">Category</th>
                    <th class=" py-3">Status</th>
                    <th class="py-3">Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr class="border-b hover:bg-orange-100">
                    <td class="py-3 ">
                       {{ $post->id }}
                        </td>
                        <td class="py-3">
                        <a href="{{route('singlenews',$post->id)}}">{{ $post->title }}</a>
                        </td>
                        <td class="py-3 ">
                       {{ ucfirst($post->category->name) }}
                        </td>
                        <td class="py-3 ">

                        <span class="badge badge-{{$post->is_active()?'success':'danger'}} text-white">{{ $post->status }}</span>
                        </td>
                        <td class="py-3">

                            <a href="./news/{{$post->id}}/edit" name="edit" class="bg-blue-500 hover:bg-green-700 text-white font-semibold px-2  rounded">Edit</a>

                            @if(auth()->user()->is_admin())
                            <form action="{{ route('news')}}{{'/'.$post->id }}" method='post' class="inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" name="delete" class="bg-red-500 hover:bg-green-700 text-white font-semibold px-1 py-0 rounded">Delete</button>

                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
</div>
</x-app-layout>
