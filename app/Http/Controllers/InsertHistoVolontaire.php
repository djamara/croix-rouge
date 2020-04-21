<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsertHistoVolontaire extends Controller
{
    //
    public function afficheHistorique(){
        
        return view('admin/histoVolontaire');
    }
}
