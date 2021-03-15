<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class PagesController extends Controller
{
    public function index(){
        $title = 'Andika';
        return view('pages.index')->with('title', $title); 
    }

    public function info(){
        $title = 'Information';
        return view('pages.info')->with('title', $title);
    }
    public function about(){
        $title = 'about';
        return view('pages.about')->with('title', $title);
    }
    
}
