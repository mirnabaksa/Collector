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
        $data =  KeyboardInfo::all();
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
        $key->text = $request->input('address');
        $key->date = $request->input('date');
        $key->account = $request->input('account');

        $key->save();
        return redirect('/keyboard')->with('success', 'Keyboard Record Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->validate($request, [
            'text' => 'required',
            'date' => 'required',
            'account' => 'required'
        ]);

        $text = new KeyboardInfo;
        $text->text = $request->input('text');
        $text->date = $request->input('date');
        $text->account = $request->input('account');

        $text->save();
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
        //
    }
}
