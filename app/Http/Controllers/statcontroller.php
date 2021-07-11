<?php

namespace App\Http\Controllers;

use App\Models\Moment;
use App\Models\Anava;
use App\Models\UjiT;
use App\Models\Ttable;
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

    public function Moment(){
        $title = "Koefisien korelasi product moment";

        $moments = Moment::all(); 
        $count = Moment::count();       
        $countX = Moment::count('x');   
        $countY = Moment::count('y');

        $avgX = Moment::average('x');
        $avgY = Moment::average('y');

        $sumX = Moment::sum('x');
        $sumY = Moment::sum('y');       

        $sumXSqr = 0;
        $sumYSqr = 0;
        $sumXY = 0;
        for ($i=0; $i < $countX; $i++) {

            $xmin[$i] = $moments[$i]->x - $avgX;
            $ymin[$i] = $moments[$i]->y - $avgY;
            
            $xSqr[$i] = $xmin[$i] * $xmin[$i];             
            $sumXSqr += $xSqr[$i];           

            $ySqr[$i] = $ymin[$i] * $ymin[$i];   
            $sumYSqr += $ySqr[$i];

            $XY[$i] = $xmin[$i] * $ymin[$i];                       
            $sumXY += $XY[$i];
        }
        $corelation = $sumXY/sqrt($sumXSqr*$sumYSqr); 
        
        return view('/pages.moment', [  'moments' => $moments,
                                        'count' => $count,
                                        'xmin' => $xmin,
                                        'ymin' => $ymin,
                                        'xSqr' => $xSqr,
                                        'ySqr' => $ySqr,
                                        'XY' => $XY,
                                        'sumX' => $sumX,
                                        'sumY' => $sumY,
                                        'sumXSqr' => $sumXSqr,
                                        'sumYSqr' => $sumYSqr,
                                        'sumXY' => $sumXY,
                                        'avgX' => $avgX,
                                        'avgY' => $avgY,
                                        'corelation' => $corelation,
                                        'title' => $title]);
    }

    private function std_dev($array){
        $length = count($array);
        $tmp = 0.0;
        $avg = array_sum($array)/$length;
        foreach($array as $i)
            {
                $tmp += pow(($i - $avg), 2);
            }
        return (float)sqrt($tmp/$length);
    }

    public function Ujit(){
        $title = "Uji T";
        $ujiT = UjiT::all();  
        $avgx1 = UjiT::average('x1');
        $avgx2 = UjiT::average('x2');
        $n1 = UjiT::count('x1');
        $n2 = UjiT::count('x2');

        $count = UjiT::count();
    
        $x1 = UjiT::select('x1')->get();        
        $x2 = UjiT::select('x2')->get();

        
        $i = 0;
        foreach ($x1 as $a){
            $arrX1[$i] = $a->x1;
            $i++;            
        }        
        $j = 0;
        foreach ($x2 as $b){
            $arrX2[$j] = $b->x2;
            $j++;            
        }

        $sdX1 = number_format($this->std_dev($arrX1), 2); 
        $sdX2 = number_format($this->std_dev($arrX2), 2); 


        $variansX1 = pow($sdX1, 2);
        $variansX2 = pow($sdX2, 2);
        
        $sumX1Sqr = 0;
        $sumX2Sqr = 0;
        $sumX1X2 = 0;

        for ($i=0; $i < $count; $i++) {

            $x1corel[$i] = $ujiT[$i]->x1 - $avgx1;
            $x2corel[$i] = $ujiT[$i]->x2 - $avgx2;

            $x1Sqr[$i] = $x1corel[$i] * $x1corel[$i];             
            $sumX1Sqr += $x1Sqr[$i];           

            $x2Sqr[$i] = $x2corel[$i] * $x2corel[$i];   
            $sumX2Sqr += $x2Sqr[$i];

            $x1x2[$i] = $x1corel[$i] * $x2corel[$i];                       
            $sumX1X2 += $x1x2[$i];
        }       

        
        $corelmoment = number_format($sumX1X2/sqrt($sumX1Sqr*$sumX2Sqr), 2);
        $resUjiT = number_format($avgx1 - $avgx2 / sqrt( ( ($variansX1/$n1)+($variansX2/$n2)) - 2*$corelmoment*( ($sdX1/sqrt($n1)) * ($sdX2/sqrt($n2)) ) ), 2 );
        $df = $count - 1;
        $labelnilai = "limapersen";       
        $kolom = Ttable::where('df', '=', $df)->get();
        $TTabel = $kolom[0]->$labelnilai;  

        if ($resUjiT < $TTabel){
            $status =  "Diterima";
        } else {
            $status =   "Tidak Diterima";
        }
        return view('/pages.ujit', ['ujiT' => $ujiT,
                                    'avgx1' => $avgx1,
                                    'avgx2' => $avgx2,
                                    'variansX1' => $variansX1,
                                    'variansX2' => $variansX2,
                                    'sdX1' => $sdX1,
                                    'sdX2' => $sdX2,
                                    'resUjiT' => $resUjiT,
                                    'TTabel' => $TTabel,
                                    'status' => $status,
                                    'title' => $title]);
    }

    public function Anava(){
        $title = "Koefisien korelasi product moment";
        return view('/pages.anava', [
                                    'title' => $title]);
    }

}
