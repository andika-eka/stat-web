<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
        $title = 'Andika';
        $data = Data::count();
        return view('pages.index')->with('title', $title) ->with('data', $data); 
    }

    public function info(){

        //awal nya ada 3 set data nilai 
        //tapi karena disuruh pakek 1 set aja 
        //name variable nya jadi aneh
        $title = 'Information';
        
        $max1 = Data::max('nilai_1');
       
        $min1 = Data::min('nilai_1');
        
        $avg1 = number_format(Data::average('nilai_1'),2);
      

       

        // $nilai1 = data::select('nilai_1 as nilai');
        // $nilai2 = data::select('nilai_2 as nilai')->unionAll($nilai1);
        // // $frek = data::select('nilai_3 as nilai')->unionAll($nilai2)->select('nilai', DB::raw('count(*) as frek')) 
        // // ->groupBy('nilai')                     
        // // ->get();

        // $frek = data::select('nilai_3 as nilai') ->unionAll($nilai2) // kalo bisa pake ini
        //                         ->groupBy('nilai')                     
        //                         ->get();

        $frek1 = Data::select('nilai_1 as nilai', DB::raw('count(*) as frek'))->groupBy('nilai_1')->get();
        
        
                                

       




        return view('pages.info',[  'title' => $title,
                                    'max1' => $max1, 
                                    'min1' => $min1, 
                                    'avg1' => $avg1, 
                                    'frek1' => $frek1]);
    }
    public function about(){
        $title = 'about';
        return view('pages.about')->with('title', $title);
    }

    public function DataBergolong(){
        $title = 'Data Bergolong';

        $valMax = Data::max('nilai_1');
        $valMin = Data::min('nilai_1');
        
        $range = $valMax - $valMin;

        $dataNum = Data::count('nilai_1');

        $class = ceil(3.3 * log10($dataNum) + 1);
        $interval = ceil($range/$class);

        $botlimit = $valMin;
        $toplimit = 0;
        
        for($i = 0; $i < $class; $i++){
            $toplimit = $botlimit + $interval - 1;
            $frek[$i] = Data::select('nilai_1 as value', DB::raw('count(*) as frek'))
                    ->where([['nilai_1', '>=', $botlimit],['nilai_1', '<=', $toplimit]])
                    ->groupBy('nilai_1')
                    ->count('nilai_1');

            $data[$i] =  $botlimit.'-'.$toplimit;
            $botlimit = $toplimit +1;

        }
        return view('pages.grouped',['title' => $title,
                                    'class' => $class,
                                    'data' => $data,
                                    'frek' => $frek]);
    }
}
