<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

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
            'nama' => 'required'
        ]);
        Data::create([
            'nama' => request('nama'),
            'nilai_1' => request('nilai_1'),
            'nilai_2' => request('nilai_2'),
            'nilai_3' => request('nilai_3'),
            'keterangan' => request('keterangan'),
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
        
        $data->nama = $request->nama;   
        $data->nilai_1 = $request->nilai_1; 
        $data->nilai_2 = $request->nilai_2;  
        $data->nilai_3 = $request->nilai_3;
        $data->keterangan = $request->keterangan;        
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
}
