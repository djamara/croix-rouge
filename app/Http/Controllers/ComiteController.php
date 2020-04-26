<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComiteController extends Controller
{
    //
    public function AfficherComite(){
        
        $comite = \App\modeles\Comite::all();
        $communes = \App\modeles\Commune::all();
        $villes = \App\modeles\Ville::all();
        
        return view('admin/tableComite', ["comites"=>$comite,"communes"=>$communes,"villes"=>$villes]);
    }
    
    public function InsererComite(){
        
        var_dump(extract($request->all()));
    }
}
