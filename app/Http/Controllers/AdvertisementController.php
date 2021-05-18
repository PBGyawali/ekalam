<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{

    public function index()
    {
        $advertisements  = Advertisement::paginate(10);
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
        Advertisement::create($request->all());
        return back()->with(['message' => 'Advertisement updated successfully.']);
    }

    public function show(Advertisement $advertisement)
    {
        //returns the view with the advertisement
        return view('advertisement.advertisementlist',['advertisement'=>$advertisement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //returns the edit view with the advertisement
        return view('advertisement.form', ['advertisement' => $advertisement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $this->validate($request, [
            'title'  => 'required|string',
            'position'  => 'required',
            ]);
            $advertisement->update($request->all());
            return back()->with('message', 'The advertisement was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return back()->with('message', 'The advertisement was deleted!');
    }

}
