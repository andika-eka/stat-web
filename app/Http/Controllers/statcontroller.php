<?php

namespace App\Http\Controllers;
// use App\Exports\MomentExport;
// use App\Exports\BiserialExport;
use App\Models\Moment;
use App\Models\Anava;
use App\Models\UjiT;
use Illuminate\Http\Request;

class statcontroller extends Controller
{
    //
    public function indexMoment(){
        $title = "Data Product Moment";
        $moments = Moment::all();
        return view('/index.moment', ['moments' => $moments,
                                        'title' => $title]);
    }
    public function indedxUjit(){
        $title = "Data uji T";
        $UjiT = UjiT::all();
        return view('/index.UjiT', ['UjiT' => $UjiT,
                                    'title' => $title]);
    }

    public function indexAnava(){
        $title = "Data Anava";
        $anava = Anava::all();
        return view('/index.anava', ['anava' => $anava,
                                        'title' => $title]);
    }
}
