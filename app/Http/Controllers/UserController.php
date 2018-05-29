<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CollectorUser;

class UserController extends Controller
{
    public function index()
    {
        $data =  CollectorUser::paginate(15);
        return view('data.userindex')->with('data', $data);
    }
}
