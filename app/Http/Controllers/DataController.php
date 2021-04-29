<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\dataExport;
use App\Imports\DataImport;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //view/read
        $title = 'data list';

        $data = Data::all();
        return view('data.index')
        ->with('title', $title)
        ->with('data', $data) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
        $title = 'data entry';
        return view('data.create')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nilai_1' => 'required'
        ]);
        Data::create([
            'nama' => '-',
            'nilai_1' => request('nilai_1'),
        ]);
        return redirect('/Data')->with('success', 'data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
       
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        //
        $title = 'data edit';
        $data = Data::find($id);
        if(!$data){
            abort(404);
        }
        return view('data.edit')
        ->with('title', $title)
        ->with('data', $data) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Data::find($id);
        
     
        $data->nilai_1 = $request->nilai_1;  
        $data->save();

        return redirect('/Data')->with('success', 'data saved');                
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Data::find($id);       //cari id yang dipencet
        $data-> delete();                  //delete id tersebut

        return redirect('/Data')->with('success', 'data deleted');                //redirect lagi ke home
    }

    public  function export(){
        return Excel::download(new dataExport, 'data.xlsx');
    }

    public function import(){
        $title = 'import from spreadsheet';
        return view('data.import')
        ->with('title', $title);
    }

    public function importFile(Request $request){
        // $request->validate([
        //     'file' => 'required|max:10000|mimes:xlsx,xls',
        // ]);
        Excel::import(new DataImport, $request->file('file'));
        
        return redirect('/')->with('success', 'All good!');
    }
}
