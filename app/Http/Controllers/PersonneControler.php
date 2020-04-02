<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonneControler extends Controller
{
    //
    public function afficherVue(){
        
         $allComites = \App\modeles\Comite::all();
         $allvilles = \App\modeles\Ville::all();
         $communes = \App\modeles\Commune::all();
         $allpays = \App\modeles\Pays::all();
         /*foreach ($allComites as $comite) {
             
             echo $comite->comite_libelle ."<br>";
         }*/
         return view('admin/insererVolontaire',["comites"=>$allComites,"villes"=>$allvilles,
             "pays"=>$allpays,"communes"=>$communes]);
    }
}
