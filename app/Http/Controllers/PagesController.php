<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\LocationInfo;
use App\KeyboardInfo;
use App\AudioInfo;


class PagesController extends Controller
{
    public function index(){
        $title = "Index";

        
        $table  = \Lava::DataTable();
        
        $table->addStringColumn('Collectable')
              ->addNumberColumn('#')
              ->addRow(['Location', LocationInfo::all()->count()])
              ->addRow(['Keyboard',  KeyboardInfo::all()->count()])
              ->addRow(['Audio',  AudioInfo::all()->count()]);
        
             \Lava::PieChart('DBRecords', $table, [
                'is3D'   => true,
            ]);

        return view('pages.index')->with('title', $title);
    }

    public function about(){
        return view ('pages.about');
    }

    public function services(){
        return view ('pages.services');
    }
}
