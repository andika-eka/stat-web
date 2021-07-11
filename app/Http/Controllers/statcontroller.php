<?php

namespace App\Http\Controllers;

use App\Models\Moment;
use App\Models\Anava;
use App\Models\UjiT;
use App\Models\Ttable;
use App\Models\Ftable;
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

    private function label($index){
        $col_label = ['nol', 'satu','dua','tiga','empat','lima'];
        $Label =  $col_label[$index];
        return $Label;
    }


    public function Anava(){
        $title = "Uji Anava";

        $Anava = Anava::all();
        $count = Anava::count();

        $sumX1 = Anava::sum('x1');
        $sumX2 = Anava::sum('x2');
        $sumX3 = Anava::sum('x3');

        $avgX1 = Anava::avg('x1');
        $avgX2 = Anava::avg('x2');
        $avgX3 = Anava::avg('x3');

        $nx1 = Anava::count('x1');
        $nx2 = Anava::count('x2');
        $nx3 = Anava::count('x3');

        $total = $nx1+ $nx2+ $nx3;

    
        $k = 4;


        $sigmaX1Sqr = 0;
        $sigmaX2Sqr = 0;
        $sigmaX3Sqr = 0;
        $sigmaXtotal = 0;
        $sigmaXtotalSqr = 0;

        for ($i=0; $i < $count; $i++){
            $X1Sqr[$i] = $Anava[$i]->x1 * $Anava[$i]->x1;
            $X2Sqr[$i] = $Anava[$i]->x2 * $Anava[$i]->x2;
            $X3Sqr[$i] = $Anava[$i]->x3 * $Anava[$i]->x3;
        

            $sigmaX1Sqr += $X1Sqr[$i];
            $sigmaX2Sqr += $X2Sqr[$i];
            $sigmaX3Sqr += $X3Sqr[$i];
            
            $Xtotal[$i] = $Anava[$i]->x1 + $Anava[$i]->x2 + $Anava[$i]->x3;
            $XtotalSqr[$i] =  $Xtotal[$i] * $Xtotal[$i];

            $sigmaXtotal += $Xtotal[$i];
            $sigmaXtotalSqr += $XtotalSqr[$i];
        }

        if($nx1 !== 0 ){
            $a1 =  ($sumX1/$nx1);
        }else {
            $a1 = 0;
        }

        if($nx2 !== 0 ){
            $a2 =  ($sumX2/$nx2);
        }else {
            $a2 = 0;
        }

        
        if($nx3 !== 0 ){
            $a3 =  ($sumX3/$nx3);
        }else {
            $a3 = 0;
        }

        if($total !== 0 ){
            $a5 =  ($sigmaXtotal/$total);
        }else {
            $a5 = 0;
        }

        $JKA =  $a1 + $a2 + $a3 + - $a5;

        $DKA = $k - 1;

        if($DKA !== 0 ){
            $RJKA = $JKA/$DKA;
        } else {
            $RJKA = 0;
        }


        $sigmaYSqr = $sigmaX1Sqr + $sigmaX2Sqr + $sigmaX3Sqr ;

        if ($total !== 0) { 
            $JKT = $sigmaYSqr - (($sigmaXtotal * $sigmaXtotal)/$total);
        } else {
            $JKT =0;
        }

        $JKD = $JKT - $JKA;


        $DKD = $total - $k;


        if($DKD !== 0) { 
            $RJKD = $JKD/$DKD;  
        } else {
            $RJKD = 0;
        }
        

        if($RJKD !== 0 ){ 
            $F = $RJKA/ $RJKD;
        }else{
            $F = 0;
        }

        $DKT = $DKD + $DKA;

        // function label($index){
        //     $col_label = ['nol', 'satu','dua','tiga','empat','lima'];
        //     $Label =  $col_label[$nilai];
        //     return $Label;
        // }

        // function label($nilai){            

        //     switch($nilai){
        //         case '0': 
        //             $sLabel = 'nol';
        //             break;
        //         case '1': 
        //             $sLabel = 'satu';
        //             break;
        //         case '2': 
        //             $sLabel = 'dua';
        //             break;
        //         case '3': 
        //             $sLabel = 'tiga';
        //             break;
        //         case '4': 
        //             $sLabel = 'empat';
        //             break;
        //         case '5': 
        //             $sLabel = 'lima';
        //             break;                
        //         default: $sLabel = 'Tidak ada field';
        //     }
            
        //     return $sLabel;
        // }

        //1. cek label
        $labelDKA = $this->label($DKA);
        
        //2. cek di tabel f
        $kolom = Ftable::where('df1', '=', $DKD)->get();                 
        $fTabel = $kolom[0]->$labelDKA;               

        //cek keterangan
        if ($F > $fTabel){
            $status =  "Signifikan";
        } else {
            $status =   "Tidak Signifikan";
        }
        return view('/pages.anava', ['Anava' => $Anava,
                                    'count' => $count,
                                    'X1Sqr' => $X1Sqr,
                                    'X2Sqr' => $X2Sqr,
                                    'X3Sqr' => $X3Sqr,
                                    'Xtotal' => $Xtotal,
                                    'XtotalSqr' => $XtotalSqr,
                                    'sumX1' => $sumX1,
                                    'sumX2' => $sumX2,
                                    'sumX3' => $sumX3,
                                    'sigmaX1Sqr' => $sigmaX1Sqr,
                                    'sigmaX2Sqr' => $sigmaX2Sqr,
                                    'sigmaX3Sqr' => $sigmaX3Sqr,
                                    'sigmaXtotal' => $sigmaXtotal,
                                    'sigmaXtotalSqr' => $sigmaXtotalSqr,
                                    'avgX1' => $avgX1,
                                    'avgX2' => $avgX2,
                                    'avgX3' => $avgX3,
                                    'JKA' => $JKA,
                                    'DKA' => $DKA,
                                    'RJKA' => $RJKA,
                                    'F' => $F,
                                    'fTabel' => $fTabel,
                                    'status' => $status,
                                    'JKD' => $JKD,
                                    'DKD' => $DKD,
                                    'RJKD' => $RJKD,
                                    'JKT' => $JKT,
                                    'DKT' => $DKT,
                                    'title' => $title]);
    }

}
