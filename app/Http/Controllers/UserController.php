<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CollectorUser;

class UserController extends Controller
{
    public function index()
    {
        $search = \Request::get('search');
        $data = CollectorUser::where('account', 'LIKE', $search)->paginate(15);
        return view('/data.userindex')->with('data', $data);
    }

    public function destroy($id)
    {
        $user = CollectorUser::find($id);
        $user->delete();
        return redirect('collector/users')->with('success', 'User Removed');
    }
}
