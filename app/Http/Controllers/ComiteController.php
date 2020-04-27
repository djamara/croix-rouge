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
        $comites = \App\modeles\Comite::addSelect([
            
                    'ville' => function($ville) {
                        $ville->select('VIL_NOM')
                                ->from('villes')
                                ->whereColumn('VIL_IDENTIFIANT', 'comite_ville');
                    },
                    'commune' => function($commune) {
                        $commune->select('commune_libelle')
                                ->from('commune')
                                ->whereColumn('idcommune', 'comite_commune');
                    }
        ])->get();
        
        return view('admin/tableComite', ["comites"=>$comites,"communes"=>$communes,"villes"=>$villes]);
    }
    
    public function InsererComite(Request $request){
        
        extract($request->all());
        $comite = new \App\modeles\Comite();
        
        $comite->comite_libelle = $nomComite;
        $comite->comite_ville = $villeComite;
        $comite->comite_commune = $communeComite;
        
        if($comite->save()){
            echo 'succes';
        }else{
            echo 'echec';
        }
    }
}
