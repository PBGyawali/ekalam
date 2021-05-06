<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{

    public function index()
    {
        $advertisements  = Advertisement::all();
        return view('advertisement.advertisementlist',compact('advertisements'));
    }

    public function create()
    {
        return view('advertisement.form');
    }
    public function store(Request $request)
    {        
        $request->validate([
            'title'  => 'required|string',
            'position'  => 'required',
        ]);
        Advertisement::create([$request->all()]);
        return back()->with(['message' => 'Advertisement updated successfully.']);
    }

    public function show(Advertisement $advertisment)
    {
        //returns the view with the advertisment
        return view('advertisement.advertisementlist',['advertisment'=>$advertisment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisment
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisment)
    {
        //returns the edit view with the advertisment
        return view('advertisment.form', ['advertisment' => $advertisment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisment)
    {
        $this->validate($request, [
            'title'  => 'required|string',
            'position'  => 'required',     
            ]); 
            $advertisment->update($request->all());
            return redirect()->back()->with('message', 'The advertisment was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisment)
    { 
        $advertisment->delete();
        return redirect()->back()->with('message', 'The advertisment was deleted!');
    }

}
