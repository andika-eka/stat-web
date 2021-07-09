<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\ZTable;
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

    public function import(){
        $title = 'import';
        return view('pages.import')->with('title', $title);
    }

    public function export(){
        $title = 'export';
        return view('pages.export')->with('title', $title);
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
            $frek[$i] = Data::select(DB::raw('count(*) as frekuensi, nilai_1'))
                    ->where([['nilai_1', '>=', $botlimit],['nilai_1', '<=', $toplimit]])
                    ->count();

            $data[$i] =  $botlimit.'-'.$toplimit;
            $botlimit = $toplimit +1;

        }
        return view('pages.grouped',['title' => $title,
                                    'class' => $class,
                                    'data' => $data,
                                    'frek' => $frek]);
    }

//Processing Z table
    private function decimal($nilai){
        if($nilai<0){
            $des = substr($nilai,0,4);
        } else {
            $des = substr($nilai,0,3);
        }
        return $des;
    }

    private function label($nilai){
        if($nilai<0){
            $str1 = substr($nilai,4,1);
        } else {
            $str1 = substr($nilai,3,1);
        }
        $Lable = ['nol','satu','dua','tiga','empat','lima','enam','tujuh','delapan','sembilan'];
        $sLabel = $Lable[$str1];

        return $sLabel;
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

    public function chi(){
        $title = 'Chi-Kuadrat';

        $valMax = Data::max('nilai_1');
        $valMin = Data::min('nilai_1');
        $dataNum = Data::count('nilai_1');
        $avg = number_format(Data::average('nilai_1'), 2);

        $Data = Data::select('nilai_1')->get();
        $index = 0;

        foreach ($Data as $x){
            $dataArr[$index] = $x->nilai_1;
            $index++;            
        }
        
        $Sdev = number_format($this->std_dev($dataArr), 2);

        $range = $valMax - $valMin;
        $class = ceil(3.3 * log10($dataNum) + 1);
        $interval = ceil($range/$class);
        $botlimit = $valMin;
        $toplimit = 0;
        
        $chi = 0;
        for($i = 0; $i < $class; $i++){
            $toplimit = $botlimit + $interval - 1;

            $botlim[$i] = $botlimit - 0.5;
            $toplim[$i] = $toplimit + 0.5;

            $botZval[$i] = number_format(($botlim[$i]- $avg)/$Sdev, 2);
            $topZval[$i] = number_format(($toplim[$i]- $avg)/$Sdev, 2);
            
            $zbot = ZTable::where('z', '=', $this->decimal($botZval[$i]))->get(); 
            $ztop = ZTable::where('z', '=', $this->decimal($topZval[$i]))->get();
            
            $tmp = $this->label($botZval[$i]);
            $zTabelBot[$i] = $zbot[0]->$tmp;
            $tmp =$this->label($topZval[$i]);
            $zTabelTop[$i] = $ztop[0]->$tmp;

            $Lpps[$i] = abs($zTabelBot[$i] - $zTabelTop[$i]);

            $Fe[$i] = $Lpps[$i]*$dataNum;   

            $frek[$i] = Data::select(DB::raw('count(*) as frekuensi, nilai_1'))
            ->where([['nilai_1', '>=', $botlimit],['nilai_1', '<=', $toplimit]])
            ->count();

            $data[$i] =  $botlimit.'-'.$toplimit;
            $botlimit = $toplimit +1;

            $kai[$i] = number_format(pow(($frek[$i] - $Fe[$i]),2)/$Fe[$i], 7);
            $chi += $kai[$i];   
        }


        return view('pages.chi',[   'title' => $title,
                                    'class' => $class,
                                    'data' => $data,
                                    'frek' => $frek,
                                    'botlim' => $botlim,
                                    'toplim' => $toplim,
                                    'botZval' => $botZval,
                                    'topZval' => $topZval,
                                    'zTabelBot'=>$zTabelBot,
                                    'zTabelTop'=>$zTabelTop,
                                    'Lpps'=>$Lpps,
                                    'Fe'=>$Fe,
                                    'kai'=>$kai,
                                    'chi'=>$chi]);
    }

    public function Lilliefors(){
        $title = "Lilliefors";

        $dataNum = Data::count('nilai_1');
        $avg = number_format(Data::average('nilai_1'), 2);

        $Data = Data::select('nilai_1')->get();
        $index = 0;
        foreach ($Data as $x){
            $dataArr[$index] = $x->nilai_1;
            $index++;            
        }
        
        $Sdev = number_format($this->std_dev($dataArr), 2);
        
        for($i = 0; $i < $dataNum; $i++){
            $frek[$i] = Data::select( 'nilai_1', DB::raw('count(*) as frekuensi'))
            ->groupBy('nilai_1')
            ->get();
            $countData = count($frek[$i]);
        }

        $totalfrek = 0;
        $totalLLF = 0;
        for($i = 0; $i < $countData; $i++){
            
            $totalfrek += $frek[0][$i]->frekuensi;
            $frekKum[$i] = $totalfrek;

            $Zi[$i] = number_format(($frek[0][$i]->nilai_1 - $avg)/$Sdev, 2);
            $Zrow = ZTable::where('z', '=', $this->decimal($Zi[$i]))->get();
            $tmp = $this->label($Zi[$i]);
            $F_zi[$i] = $Zrow[0]->$tmp;

            $S_zi[$i] = number_format($frekKum[$i]/$dataNum, 5);

            $LLF[$i] = abs($F_zi[$i]-$S_zi[$i]);
            $totalLLF = $LLF[$i];
        }


        return view('pages.Lilliefors',[    'title' => $title,
                                            'frek' => $frek,
                                            'countData' => $countData,
                                            'frekKum' => $frekKum,
                                            'Zi' => $Zi,
                                            'F_zi' => $F_zi,
                                            'S_zi' => $S_zi,
                                            'LLF' => $LLF,
                                            'totalLLF' => $totalLLF,
                                            'dataNum' => $dataNum]);
    }
}
