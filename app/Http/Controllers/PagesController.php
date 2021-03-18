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
        $title = 'Information';
        
        $max1 = Data::max('nilai_1');
        $max2 = Data::max('nilai_2');
        $max3 = Data::max('nilai_3');

        $min1 = Data::min('nilai_1');
        $min2 = Data::min('nilai_2');
        $min3 = Data::min('nilai_3');

        $avg1 = number_format(Data::average('nilai_1'),2);
        $avg2 = number_format(Data::average('nilai_2'),2);
        $avg3 = number_format(Data::average('nilai_3'),2);

        $avgAll =number_format((Data::sum('nilai_1') + Data::sum('nilai_2') + Data::sum('nilai_3'))/(Data::count('nilai_1')+Data::count('nilai_2')+Data::count('nilai_3')) ,2 );

        // $nilai1 = data::select('nilai_1 as nilai');
        // $nilai2 = data::select('nilai_2 as nilai')->unionAll($nilai1);
        // // $frek = data::select('nilai_3 as nilai')->unionAll($nilai2)->select('nilai', DB::raw('count(*) as frek')) 
        // // ->groupBy('nilai')                     
        // // ->get();

        // $frek = data::select('nilai_3 as nilai') ->unionAll($nilai2) // kalo bisa pake ini
        //                         ->groupBy('nilai')                     
        //                         ->get();

        $frek1 = Data::select('nilai_1 as nilai', DB::raw('count(*) as frek'))->groupBy('nilai_1')->get();
        $frek2 = Data::select('nilai_2 as nilai', DB::raw('count(*) as frek'))->groupBy('nilai_2')->get();
        $frek3 = Data::select('nilai_3 as nilai', DB::raw('count(*) as frek'))->groupBy('nilai_3')->get();
        
                                

       




        return view('pages.info',[  'title' => $title,
                                    'max1' => $max1, 'max2' => $max2, 'max3' => $max3, 
                                    'min1' => $min1, 'min2' => $min2, 'min3' => $min3,
                                    'avg1' => $avg1, 'avg2' => $avg2, 'avg3' => $avg3, 'avgAll' => $avgAll,
                                    'frek1' => $frek1, 'frek2' => $frek2, 'frek3' => $frek3]);
    }
    public function about(){
        $title = 'about';
        return view('pages.about')->with('title', $title);
    }
    
}
