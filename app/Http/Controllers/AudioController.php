<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AudioInfo;
use App\CollectorUser;
use Illuminate\Support\Facades\Storage;

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
        
        $user = CollectorUser::where('account', '=', $search)->first();
        if($user === null){
            $data =  AudioInfo::paginate(20);
        }else{
            $data = AudioInfo::where('user_id', '=', $user->id)->paginate(20);
        }

        

        return view('data.audioindex')->with('data', $data);
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
            'account' => 'required',
            'bytes' => 'required'
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

        $audio = new AudioInfo;
        $audio->path = $request->input('path');
        $audio->date = $request->input('date');


        Storage::disk('local')->put($audio->path, $request->input('bytes'));
	//Storage::put('file.txt', 'Contents');		
	//Storage::disk('local')->put('file.txt', 'Contents');

        $user->audioinfos()->save($audio);
        $audio->collectoruser()->associate($user);

        try{
            $audio->save();
        }catch(\Exception $e){
                // do task when error
            echo $e->getMessage();   // insert query
        }
            
        return response('OK SERVER', 200);
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
        return redirect('collector/audio')->with('success', 'Audio Removed');
    }

    public function download($filename){
        return response()->download(storage_path("app/public/{$filename}"));
    }
}
