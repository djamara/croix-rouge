<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonneControler extends Controller {

    //
    public $Matricule;
    public $retout;
    public $retour1;
    public $retour2;

    public function genererMatricule($comite) {

        //$personne = \App\modeles\Personne::first();
        //$personne = \App\modeles\Personne::find(\DB::table('personne')->max('personne.idpersonne'));
        $id = \App\modeles\Personne::max('idpersonne');
//      $personne = DB::table('personne')->latest()->first();
        $id = $id + 1;
        $this->Matricule = "CRCI/" . date("Y") . "/C" . $comite . "/" . $id;
        return $this->Matricule;
    }

    public function afficherVue() {

        $allComites = \App\modeles\Comite::all();
        $allvilles = \App\modeles\Ville::all();
        $communes = \App\modeles\Commune::all();
        $TypePieces = \App\modeles\TypePiece::all();
        $groupeSanguin = \App\modeles\GroupeSanguin::all();
        $profession = \App\modeles\Profession::all();
        $diplomes = \App\modeles\Diplome::all();
        $pays = \App\modeles\Pays::all();
        $affections = \App\modeles\MaladieChronique::all();
        $comites = \App\modeles\Comite::all();
        /* foreach ($allComites as $comite) {


          echo $comite->comite_libelle ."<br>";
          } */

        //$this->Matricule = $this->genererMatricule("RAF");
        return view('admin/insererVolontaire', ["comites" => $allComites, "Matricule" => $this->Matricule,
            "villes" => $allvilles,
            "paysNaiss" => $pays, "communes" => $communes, 'paysNat' => $pays, "comites" => $comites,
            "typePiece" => $TypePieces, "groupesanguin" => $groupeSanguin, "affections" => $affections,
            "profession" => $profession, "diplomes" => $diplomes, "groupesanguin" => $groupeSanguin]);
    }

    public function insererVolontaire(Request $request) {

        extract($request->all());
        //echo json_encode($request->all());
//        extract($request->all());

        $personne = new \App\modeles\Personne;
        $this->Matricule = $this->genererMatricule($comite); //

        $personne->personne_civilite = $civilite; //inserer les civilités
        $personne->personne_nom = $nomVolontaire; // inserer le nom
        $personne->personne_prenom = $prenomVolontaire; //inserer le prenom
        $personne->personne_immat = $this->Matricule; //random_int(1000, 2000); //inserer immat
        $personne->personne_date_naiss = $dateNaissVolontaire; //date de naissance
        $personne->personne_pays_naiss = $paysNaiss; //pays_de_naissance
        $personne->personne_pays_nationalite = $nationalite; //pays_de_nationalite
        $personne->personne_ville_naiss = $vilNaiss; //ville de naissance
        $personne->personne_commune_naiss = $comNaiss; //commune de naissance
        $personne->personne_ville_habitation = $vilHabitVolontaire; //ville habitation
        $personne->personne_commune_habitation = $comHabitVolontaire; //commune habitattion

        $personne->personne_antecedent_medic = $antecMedicVolont; //antecedent medicaux

        $personne->personne_qualification = $qualifVolontaire; //qualification
        $personne->personne_activite = $activiteVolontaire; //activite

        $personne->personne_telephone_1 = $tel1Volontaire; //telephone 1
        $personne->personne_telephone_2 = $tel2Volontaire; //telephone 2
        $personne->personne_email = $emailVolontaire; //email
        //
        
        $personne->fonctionCR_idfonctionCR = 1;
        $personne->profession_idprofession = $profVolontaire; //profession
        if (!empty($groupeSanguin))
            $personne->groupeSanguin = $groupeSanguin; //groupe sanguin

        $personne->personne_nom_urgence = $nomPersUrgence; //nom urgence
        $personne->personne_tel_urgence = $prenomPersUrgence; //prenom urgence
        $personne->personne_email_urgence = $telPersUrgence; //email urgence
        //personne->personne_profil = 1; //profil volontaire

        $retour = $personne->save();

        // INSERER MALADIE
        //$personne->personne_affection = $maladieVolontaire;// inserer maladie

        if (!empty($maladieVolontaire)) {

            foreach ($maladieVolontaire as $maladie) {

                $personneAffection = new \App\modeles\personneAffection();
                $personneAffection->personneImmat = $this->Matricule;
                $personneAffection->idaffection = $maladie;
                $retour = $personneAffection->save();
            }
        }

        //INSERER DIPLOME
        if (!empty($diplomes)) {

            foreach ($diplomes as $diplome) {

                $personneDiplome = new \App\modeles\personneDiplome();
                $personneDiplome->persImmat = $this->Matricule;
                $personneDiplome->diplome_iddiplome = $diplome;
                $retour = $personneDiplome->save();
            }
        }
        //dd($personne);


        if ($retour == true) {
            echo "succes";
        } else {
            echo "echec";
        }
    }

    public function insertInfoGeneral(Request $request) {

        extract($request->all());

        $personne = new \App\modeles\Personne;

        $personne->personne_civilite = $civilite;
        $personne->personne_nom = $nomVolontaire;
        $personne->personne_prenom = $prenomVolontaire;
        $personne->personne_date_naiss = $dateNaissVolontaire;
        $personne->personne_pays_naiss = $paysNaiss;
        $personne->personne_pays_nationalite = $nationalite;
        $personne->personne_ville_naiss = $vilNaiss;
        $personne->personne_commune_naiss = $comNaiss;
        $personne->personne_ville_habitation = $vilHabitVolontaire;
        $personne->personne_commune_habitation = $comHabitVolontaire;
        $personne->personne_affection = $maladieVolontaire;
        $personne->fonctionCR_idfonctionCR = $maladieVolontaire;
        $personne->profession_idprofession = $profVolontaire;


        $personne->save();
    }

    public function afficherListerVolontaire() {

        //$personnes = \App\modeles\Personne::all();
        $req = "SELECT *,(SELECT commune.commune_libelle FROM commune WHERE personne.personne_commune_naiss = commune.idcommune) AS communenaissance,
               (SELECT commune.commune_libelle FROM commune WHERE personne.personne_commune_habitation = commune.idcommune) AS communehabitation
               FROM personne";

        /*$personnes = \Illuminate\Support\Facades\DB::table('personne')
                        ->select(\Illuminate\Support\Facades\DB::Raw($req))
                        ->get();
        */
        
        $personnes = \App\modeles\Personne::addSelect([
            
                        'ville_naiss'=>function($query){
                        $query->select('VIL_NOM')
                                ->from('villes')
                                ->whereColumn('VIL_IDENTIFIANT','personne_ville_naiss');
                        },
                        'ville_habita'=>function($join){  
                        $join->select('VIL_NOM')
                             ->from('villes')
                             ->whereColumn('VIL_IDENTIFIANT','personne_ville_habitation');
                        },
                        'pays_naissance'=>function($pays){
                           $pays->select("PAYS_NOM")
                                ->from("pays_nationalite")
                                ->whereColumn('PAYS_CODE','personne_pays_naiss');
                        },
                        'pays_habitation'=>function($paysi){
                           $paysi->select("PAYS_NOM")
                                ->from("pays_nationalite")
                                ->whereColumn('PAYS_CODE','personne_pays_nationalite');
                        },
                        'profession'=>function($profession){
                            $profession->select('profession_libelle')
                                    ->from('profession')
                                    ->whereColumn('idprofession','profession_idprofession');
                            
                        },
                        'communeNaiss'=>function($communeNaiss){
                           $communeNaiss->select('commune_libelle')
                                    ->from('commune')
                                    ->whereColumn('idcommune','personne_commune_naiss');
                            
                        },
                        'communeHabitation'=>function($communeHabitation){
                           $communeHabitation->select('commune_libelle')
                                    ->from('commune')
                                    ->whereColumn('idcommune','personne_commune_habitation');
                            
                        },
                        'profession'=>function($profession){
                            $profession->select('profession_libelle')
                                    ->from('profession')
                                    ->whereColumn('idprofession','profession_idprofession');
                            
                        },
                        'comiteLocal'=>function($comite){
                            $comite->select('comite_libelle')
                                    ->from('comite')
                                    ->whereColumn('idcomite','comiteActuel');
                            
                        }
                       ])->get();
        
        return view('admin/tableVolontaire', ["personnes" => $personnes]);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }

}
