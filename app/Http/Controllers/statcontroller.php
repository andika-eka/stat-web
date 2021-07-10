<?php

namespace App\Http\Controllers;

use App\Models\Moment;
use App\Models\Anava;
use App\Models\UjiT;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\momentExport;
use App\Exports\ujitExport;
use App\Exports\anavaExport;
use App\Imports\momentImport;
use App\Imports\ujitimport;
use App\Imports\anavaimport;
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

    public  function exportMoment(){
        return Excel::download(new momentExport, 'data Product Moment.xlsx');
    }
    public  function exportujit(){
        return Excel::download(new ujitExport, 'data uji T.xlsx');
    }
    public  function exportanava(){
        return Excel::download(new anavaExport, 'data uji anava.xlsx');
    }

    public function importMoment(Request $request){
        Excel::import(new momentImport, $request->file('file'));
        return redirect('/indexMoment')->with('success', 'All good!');
    }
    public function importUjit(Request $request){
        Excel::import(new ujitimport, $request->file('file'));
        return redirect('/indedxUjit')->with('success', 'All good!');
    }
    public function importAnava(Request $request){
        Excel::import(new anavaimport, $request->file('file'));
        return redirect('/indexAnava')->with('success', 'All good!');
    }

    public function truncateMoment()
    {
        Moment::truncate();       
        return redirect('/indexMoment')->with('success', 'all data in table deleted');
    }
    public function truncateUjit()
    {
        UjiT::truncate();       
        return redirect('/indedxUjit')->with('success', 'all data in table deleted');
    }
    public function truncateAnava()
    {
        Anava::truncate();       
        return redirect('/indexAnava')->with('success', 'all data in table deleted');
    }

}
