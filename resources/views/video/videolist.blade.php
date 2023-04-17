<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucwords(__('Video Management')) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex">
                    <div class="flex-auto text-2xl mb-4">Video List</div>

                    <div class="flex-auto text-right mt-2">
                        <a href="{{ route('addvideo') }}" class="btn btn-primary btn-md">Add video</a>
                    </div>
                </div>
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">ID</th>
                        <th class="text-left p-3 px-5">Name</th>
                        <th class="text-left p-3 px-5">Image</th>
                        <th class="text-left p-3 px-5">Status</th>
                        <th class="text-left p-3 px-5">Actions</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $video)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 ">
                            {{ $video->id }}
                            </td>
                            <td class="p-3 ">
                            {{ ucwords($video->title) }}
                            </td>
                            <td class="p-3 ">
                                <iframe width="" height="" src="https://www.youtube.com/embed/<?php echo $video->video_id;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </td>
                            <td class="p-3 ">
                                <span class="badage badge-<?php echo ($video->status == 'active') ? 'success' : 'danger' ?>"><?php echo ucfirst($video->status) ?></span>

                            </td>
                            <td class="p-3 ">
                                <a href="./video/id={{$video->id}}" name="edit" class="bg-blue-500 hover:bg-green-700 text-white font-semibold px-2  rounded">Edit</a>
                                <form action="{{ route('video')}}{{'/'.$video->id }}" method='post' class="inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" name="delete" class="bg-red-500 hover:bg-green-700 text-white font-semibold px-1 py-0 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $videos->links() }}
            </div>
        </div>
    </div>
    </x-app-layout>
