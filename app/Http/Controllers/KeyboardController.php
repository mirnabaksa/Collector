<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeyboardInfo;

class KeyboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \Request::get('search'); //<-- we use global request to get the param of URI
        
        $data = KeyboardInfo::where('account','like','%'.$search.'%')
            ->orderBy('id')
            ->paginate(20);

        return view('data.keyboardindex')->with('data', $data);
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
            'text' => 'required',
            'date' => 'required',
            'account' => 'required'
        ]);

        $key = new KeyboardInfo;
        $key->text = $request->input('text');
        $key->date = $request->input('date');
        $key->account = $request->input('account');

        try{
            $key->save();
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
        $key = KeyboardInfo::find($id);
        $key->delete();
        return redirect('/keyboard')->with('success', 'Keyboard Record Removed');
    }
}
