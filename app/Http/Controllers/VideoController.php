<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        $videos  = Video::paginate(10);
        return view('video.videolist',compact('videos'));
    }

    public function create()
    {
        return view('video.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|string',
            'link'  => 'required',
        ]);
        $fields=[
            'video_id'=> $this->getYoutubeVideoIdFromurl($request->link),

        ];
        Video::create(array_merge($request->all(), $fields));
        //return view('video.form',['request'=>$request]);
        return back()->with(['message' => 'Video stored successfully.']);
    }

    public function show(Video $video)
    {
        //returns the view with the video
        return view('video.videolist',['video'=>$video]);
    }
    function getYoutubeVideoIdFromurl($url)
    {
        preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $url, $matches);

        if (isset($matches[2])) {
            return $matches[2];
        } else {
            return false;
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //returns the edit view with the video
        return view('video.form', ['video' => $video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $this->validate($request, [
            'title'  => 'required|string',
            'link'  => 'required',
            ]);
            $fields=['video_id'=> $this->getYoutubeVideoIdFromurl($request->link)];
            $video->update(array_merge($request->all(), $fields));
            return back()->with('message', 'The video was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return back()->with('message', 'The video was deleted!');
    }

}
