<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
class GalleryController extends Controller
{
   public $fields=array();
    public $related_images=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all blog galleries from DB
        $galleries = Gallery::paginate(10);
        return view('gallery.gallerylist', ['galleries'=>$galleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required',Rule::unique('galleries')]
        ]);
        if($request->hasFile('image')){
            $this->fields['image']= $this->uploadimage($request->file('image'));
        }
         Gallery::create(array_merge($request->all(), $this->fields));

         if($request->hasFile('related_images')){
            foreach ($request->related_images as $photo) {
                $galleryimage= $this->uploadimage($photo);
                GalleryImage::create([
                    'image' => $galleryimage,
                    'gallery_id' => $request->id,
                ]);
            }
        }


        if($request->hasFile('related_images')){
            $galleryImages = collect($request->related_images)->map(function ($photo) {
                $galleryimage= $this->uploadimage($photo);
                return [
                    'image' => $galleryimage,
                    'gallery_id' => $request->id,
                ];
            });

            GalleryImage::insert($galleryImages->toArray());
        }


        return redirect()->back()->with('message', 'The gallery was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //returns the view with the gallery
        return view('gallery.show',['gallery'=>$gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //returns the edit view with the gallery
        $galleryImages = GalleryImage::where('gallery_id', $gallery->id)->paginate(6);
        return view('gallery.form', compact(['gallery' ,'galleryImages']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    function uploadimage($image,$oldimage=null){
        $imageName=$image->store('public/gallery');
        if($oldimage)
            $this->deleteimage($oldimage);
        return basename($imageName);
    }
    function deleteimage($image){
        $destinationPath = config('constants.storage_path').'gallery/';
        if(!is_dir($destinationPath.$image) && file_exists($destinationPath.$image))
            File::delete($destinationPath.$image);
    }
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'name' => ['required',Rule::unique('galleries')->ignore($gallery)]
            ]);
           if($request->hasFile('image')){
                $this->fields['image']= $this->uploadimage($request->file('image'),basename($request->oldimage));
            }
            if($request->hasFile('related_images')){
                foreach ($request->related_images as $photo) {
                    $galleryimage= $this->uploadimage($photo);
                    GalleryImage::create([
                        'image' => $galleryimage,
                        'gallery_id' => $request->id,
                    ]);
                }
            }

            if($request->has('delete_images')){
                foreach ($request->delete_images as $image) {
                    $this->deleteimage(basename($image));
                    GalleryImage::where('image', basename($image))->delete();
                }
            }
            $gallery->update(array_merge($request->all(), $this->fields));


            return redirect()->back()->with('message','The gallery was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->back()->with('message', 'The gallery was deleted!');
    }
}
