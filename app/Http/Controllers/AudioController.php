<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AudioInfo;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \Request::get('search'); //<-- we use global request to get the param of URI
        
        $data = AudioInfo::where('account','like','%'.$search.'%')
            ->orderBy('id')
            ->paginate(20);

        return view('data.audioindex')->with('data', $data);
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
            'path' => 'required',
            'date' => 'required',
            'account' => 'required'
        ]);

        $audio = new AudioInfo;
        $audio->path = $request->input('path');
        $audio->date = $request->input('date');
        $audio->account = $request->input('account');

        try{
            $audio->save();
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
        $audio = AudioInfo::find($id);
        $audio->delete();
        return redirect('/audio')->with('success', 'Audio Removed');
    }
}
