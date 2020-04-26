<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Accueil extends Controller
{
    //
    public function accueil(){
        
        $personne = \App\modeles\Personne::all();
        $persHomme = \App\modeles\Personne::all()->where('personne_civilite', '=', 'Mr');
        $persFemme = \App\modeles\Personne::all()->whereIn('personne_civilite',['Mme','Mlle'],true);
        $comite = \App\modeles\Comite::all();
        
        return view('admin/index',["volontaire"=>$personne, "comite"=>$comite,
            "homme"=>$persHomme,"femme"=>$persFemme]);
    }
}
