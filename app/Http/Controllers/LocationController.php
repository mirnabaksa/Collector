<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LocationInfo;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data =  LocationInfo::all();
        return view('data.locationindex')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'latitude' => 'required',
            'longitude' => 'required',
            'datetime' => 'required',
            'address' => 'required',
            'account' => 'required'
        ]);


        $location = new LocationInfo;
        $location->latitude = $request->input('latitude');
        $location->longitude = $request->input('longitude');
        $location->datetime = $request->input('datetime');
        $location->address = $request->input('address');
        $location->account = $request->input('account');

        try{
        $location->save();
        }catch(\Exception $e){
            // do task when error
            echo $e->getMessage();   // insert query
         }
        
        return response('OK SERVER', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = LocationInfo::find($id);
        $location->delete();
        return redirect('/location')->with('success', 'Location Removed');
    }
}
