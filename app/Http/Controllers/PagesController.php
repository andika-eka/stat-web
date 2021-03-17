<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
        $title = 'Andika';
        return view('pages.index')->with('title', $title); 
    }

    public function info(){
        $title = 'Information';
        $data = Data::all();
        
        $max1 = Data::max('nilai_1');
        $max2 = Data::max('nilai_2');
        $max3 = Data::max('nilai_3');

        $min1 = Data::min('nilai_1');
        $min2 = Data::min('nilai_2');
        $min3 = Data::min('nilai_3');

        $avg1 = number_format(Data::average('nilai_1'),2);
        $avg2 = number_format(Data::average('nilai_2'),2);
        $avg3 = number_format(Data::average('nilai_3'),2);


        return view('pages.info',[  'title' => $title,
                                    'max1' => $max1, 'max2' => $max2, 'max3' => $max3, 
                                    'min1' => $min1, 'min2' => $min2, 'min3' => $min3,
                                    'avg1' => $avg1, 'avg2' => $avg2, 'avg3' => $avg3,]);
    }
    public function about(){
        $title = 'about';
        return view('pages.about')->with('title', $title);
    }
    
}
