<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPJasper\PHPJasper;

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
        $this->Matricule = "CRCI-" . date("Y") . "-C" . $comite . "-" . $id;
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
        $fonctionCR = \App\modeles\Fonction::all();
        $categoriePermis = \App\modeles\CategPermis::all();
        $situationMatrimoniale = \App\modeles\situationMatrimoniale::all();
        $lastPersonnInsert = \App\modeles\Personne::latest()->first(); // recuperer le dernier inssert dans personne

        /* foreach ($allComites as $comite) {
          echo $comite->comite_libelle ."<br>";
          } */
        //$this->Matricule = $this->genererMatricule("RAF");

        return view('admin/insererVolontaire', ["comites" => $allComites, "fonctionCR" => $fonctionCR, "Matricule" => $this->Matricule,
            "villes" => $allvilles, "lastPersonnInsert" => $lastPersonnInsert,
            "paysNaiss" => $pays, "communes" => $communes, 'paysNat' => $pays, "comites" => $comites,
            "typePiece" => $TypePieces, "groupesanguin" => $groupeSanguin, "affections" => $affections,
            "profession" => $profession, "diplomes" => $diplomes, "groupesanguin" => $groupeSanguin,
            'categoriePermis' => $categoriePermis,'situationMatrimoniale'=>$situationMatrimoniale]);
    }

    public function afficherVueModif($îd) {

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
        $fonctionCR = \App\modeles\Fonction::all();
        $categoriePermis = \App\modeles\CategPermis::all();
        $situationMatrimoniale = \App\modeles\situationMatrimoniale::all();
        $lastPersonnInsert = \App\modeles\Personne::latest()->first(); // recuperer le dernier inssert dans personne
        $volontaire = \App\modeles\Personne::where("idpersonne", $îd)->first();
        /* $diplomes_personne = \App\modeles\Personne::addSelect([
          'personne_diplome' => function($query) {
          $query->select('diplome_iddiplome')
          ->from('personne_diplome')
          ->whereColumn('persImmat', 'personne_immat');
          }
          ])->get(); */

        //var_dump($volontaire->personne_immat);

        $diplomes_personne = \App\modeles\personneDiplome::select('diplome_iddiplome')->where("persImmat", $volontaire->personne_immat)->get()->toArray();
        $diplomesVolontaire = array();

        $personneCategorie = new \App\modeles\personneCategPermis();
        $perscategoriesArray = $personneCategorie->select('idcategorie')->where("personne_immat", $volontaire->personne_immat)->get()->toArray();

        //dd($perscategoriesArray);
        //var_dump($diplomes_personne);

        foreach ($diplomes_personne as $diplome) {
            //var_dump($diplome);
            array_push($diplomesVolontaire, $diplome['diplome_iddiplome']);
        }

        /* foreach ($allComites as $comite) {
          echo $comite->comite_libelle ."<br>";
          } */
        //$this->Matricule = $this->genererMatricule("RAF");

        return view('admin/modifierVolontaire', ["comites" => $allComites, "fonctionCR" => $fonctionCR, "Matricule" => $this->Matricule,
            "villes" => $allvilles, "lastPersonnInsert" => $lastPersonnInsert,
            "paysNaiss" => $pays, "communes" => $communes, 'paysNat' => $pays, "comites" => $comites,
            "typePiece" => $TypePieces, "groupesanguin" => $groupeSanguin, "affections" => $affections,
            "profession" => $profession, "diplomes" => $diplomes,
            "groupesanguin" => $groupeSanguin, "volontaire" => $volontaire, "diplomes_personne" => $diplomesVolontaire,
            'categoriePermis' => $categoriePermis, 'personneCategorie' => $perscategoriesArray , 'situationMatrimoniale'=>$situationMatrimoniale]);
    }

    public function insererVolontaire(Request $request) {

        //if (!isset($request->input('ImageVolontaire')) && !isset($request->input('ImagePieceVolontaire'))) {
        extract($request->all());
        //var_dump($request->input('donnees'));
        //$parametre = $request->all();
        //echo json_encode($request->all());
//        extract($request->all());
        //var_dump($parametre);
//        var_dump($parametre['ImageVolontaire']);
        //$donnees = $parametre['donnees'];


        $personne = new \App\modeles\Personne;
        $this->Matricule = $this->genererMatricule($comite); //

        $personne->comiteActuel = $comite; //inserer le comité
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
        $personne->lieuDeNaissance = $lieuDeNaissance; // lieu d'habitation
        $personne->personne_situation_mat = $situaMat; // situation matrimoniale du volontaire

        $personne->personne_antecedent_medic = $antecMedicVolont; //antecedent medicaux

        $personne->personne_qualification = $qualifVolontaire; //qualification
        $personne->personne_activite = $activiteVolontaire; //activite

        $personne->personne_telephone_1 = $tel1Volontaire; //telephone 1
        $personne->personne_telephone_2 = $tel2Volontaire; //telephone 2
        $personne->personne_email = $emailVolontaire; //email
        //
        $personne->TypePiece = $typePiece; //type de la piece 
        $personne->NumerPiece = $numPieceVolontaire; //numero de la piece 

        $personne->fonctionCR_idfonctionCR = $fonctionCR;
        $personne->profession_idprofession = $profVolontaire; //profession
        if (!empty($groupeSanguin))
            $personne->groupeSanguin = $groupeSanguin; //groupe sanguin

            
//affectation de etat_pere et etat_mere
        $AvoirPermis = $AvoirPermis == null ? "" : $AvoirPermis;
        $etatMere = $etatMere == null ? "" : $etatMere;
        $etatPere = $etatPere == null ? "" : $etatPere;

        $personne->personne_nom_urgence = $nomPersUrgence; //nom urgence
        $personne->personne_prenom_urgence = $prenomPersUrgence; //prenom urgence
        $personne->personne_tel_urgence = $telPersUrgence; //telephone urgence
        $personne->personne_email_urgence = $emailPersUrgence; //email urgence
        //personne->personne_profil = 1; //profil volontaire
        $personne->personne_avoir_permis = $AvoirPermis;
        $personne->personne_numero_permis = $numeroPermis;
        $personne->personne_nom_pere = $nomPereVolontaire;
        $personne->personne_prenom_pere = $prenomPereVolontaire;
        $personne->personne_nationalite_pere = $nationalitePere;
        $personne->personne_etat_pere = $etatPere;
        $personne->personne_nom_mere = $nomMereVolontaire;
        $personne->personne_prenom_mere = $prenomMereVolontaire;
        $personne->personne_nationalite_mere = $nationaliteMere;
        $personne->personne_etat_mere = $etatMere;

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

        //INSERER DANS CATEGORIE PERMIS
        if ($AvoirPermis == "OUI" && !empty($categoriePermis)) {

            foreach ($categoriePermis as $categorie) {

                $personneCategorie = new \App\modeles\personneCategPermis();
                $personneCategorie->personne_immat = $this->Matricule;
                $personneCategorie->idcategorie = $categorie;
                $retour = $personneCategorie->save();
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
            //var_dump($request->file('ImageVolontaire'));
        } else {
            echo "echec";
        }
    }

    public function uplaodFile(Request $request) {

        $lastPersonnInsert = \App\modeles\Personne::latest()->first(); // recuperer le dernier inssert dans personne
        //$ImageVolontaire = $request->input('ImageVolontaire');
        //$ImagePieceVolontaire = $request->input('ImagePieceVolontaire');
        $lastMatricule = $lastPersonnInsert->personne_immat; //recuperer le matricule
        //$nameDossier = str_replace("/", "-", $lastPersonnInsert); // remplacer les "/" par "-"
        if (!is_dir('uploads')) {
            mkdir('uploads');
        }
        if (!is_dir($lastMatricule)) {
            mkdir('uploads/' . $lastMatricule);
        }

        $ImageVolontaire = $request->file('ImageVolontaire');
        $ImagePieceVolontaire = $request->file('ImagePieceVolontaire');
        //Move Uploaded File
        $destinationPath = 'uploads/' . $lastMatricule;
        $image = new \App\modeles\Images();
        $image->image_libelle = $ImageVolontaire->getClientOriginalName();
        $image->personne_idpersonne = $lastMatricule;
        $image->image_legende = "PHOTOVOLONTAIRE";

        $image2 = new \App\modeles\Images();
        $image2->image_libelle = $ImagePieceVolontaire->getClientOriginalName();
        $image2->personne_idpersonne = $lastMatricule;
        $image2->image_legende = "COPIEDELAPIECE";

        if ($ImageVolontaire->move($destinationPath, $ImageVolontaire->getClientOriginalName()) &&
                $ImagePieceVolontaire->move($destinationPath, $ImagePieceVolontaire->getClientOriginalName()) &&
                $image->save() && $image2->save()) {

            echo 'succes';
        } else {
            echo 'echec';
        }
    }

    public function afficherListerVolontaire() {

        //$personnes = \App\modeles\Personne::all();
        $req = "SELECT *,(SELECT commune.commune_libelle FROM commune WHERE personne.personne_commune_naiss = commune.idcommune) AS communenaissance,
               (SELECT commune.commune_libelle FROM commune WHERE personne.personne_commune_habitation = commune.idcommune) AS communehabitation
               FROM personne";

        /* $personnes = \Illuminate\Support\Facades\DB::table('personne')
          ->select(\Illuminate\Support\Facades\DB::Raw($req))
          ->get();
         */

        $personnes = \App\modeles\Personne::addSelect([
                    'ville_naiss' => function($query) {
                        $query->select('VIL_NOM')
                                ->from('villes')
                                ->whereColumn('VIL_IDENTIFIANT', 'personne_ville_naiss');
                    },
                    'ville_habita' => function($join) {
                        $join->select('VIL_NOM')
                                ->from('villes')
                                ->whereColumn('VIL_IDENTIFIANT', 'personne_ville_habitation');
                    },
                    'pays_naissance' => function($pays) {
                        $pays->select("PAYS_NOM")
                                ->from("pays_nationalite")
                                ->whereColumn('PAYS_CODE', 'personne_pays_naiss');
                    },
                    'pays_habitation' => function($paysi) {
                        $paysi->select("PAYS_NOM")
                                ->from("pays_nationalite")
                                ->whereColumn('PAYS_CODE', 'personne_pays_nationalite');
                    },
                    'profession' => function($profession) {
                        $profession->select('profession_libelle')
                                ->from('profession')
                                ->whereColumn('idprofession', 'profession_idprofession');
                    },
                    'communeNaiss' => function($communeNaiss) {
                        $communeNaiss->select('commune_libelle')
                                ->from('commune')
                                ->whereColumn('idcommune', 'personne_commune_naiss');
                    },
                    'communeHabitation' => function($communeHabitation) {
                        $communeHabitation->select('commune_libelle')
                                ->from('commune')
                                ->whereColumn('idcommune', 'personne_commune_habitation');
                    },
                    'profession' => function($profession) {
                        $profession->select('profession_libelle')
                                ->from('profession')
                                ->whereColumn('idprofession', 'profession_idprofession');
                    },
                    'comiteLocal' => function($comite) {
                        $comite->select('comite_libelle')
                                ->from('comite')
                                ->whereColumn('idcomite', 'comiteActuel');
                    }
                ])->where('personne_top_valide','=',1)->get();
                
                return view('admin/tableVolontaire', ["personnes" => $personnes]);
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
        $personne->fonctionCR_idfonctionCR = $fonctionCR;
        $personne->profession_idprofession = $profVolontaire;


        $personne->save();
    }

    public function modifier_Volontaire(Request $request) {

        
        //if (!isset($request->input('ImageVolontaire')) && !isset($request->input('ImagePieceVolontaire'))) {
        extract($request->all());
        
        //var_dump($request->input('donnees'));
        //$parametre = $request->all();
        //echo json_encode($request->all());
//        extract($request->all());
        //var_dump($parametre);
//        var_dump($parametre['ImageVolontaire']);
        //$donnees = $parametre['donnees'];


        $personne = new \App\modeles\Personne;
//        $this->Matricule = $this->genererMatricule($comite); 
        $personne = $personne->all()->where("personne_immat", $personne_immat)->first();

        //var_dump($personne);

        $personne->comiteActuel = $comite; //inserer le comité
        $personne->personne_civilite = $civilite; //inserer les civilités
        $personne->personne_nom = $nomVolontaire; // inserer le nom
        $personne->personne_prenom = $prenomVolontaire; //inserer le prenom
        //$personne->personne_immat = $this->Matricule; //random_int(1000, 2000); //inserer immat
        $personne->personne_date_naiss = $dateNaissVolontaire; //date de naissance
        $personne->personne_pays_naiss = $paysNaiss; //pays_de_naissance
        $personne->personne_pays_nationalite = $nationalite; //pays_de_nationalite
        $personne->personne_ville_naiss = $vilNaiss; //ville de naissance
        $personne->personne_commune_naiss = $comNaiss; //commune de naissance
        $personne->personne_ville_habitation = $vilHabitVolontaire; //ville habitation
        $personne->personne_commune_habitation = $comHabitVolontaire; //commune habitattion
        $personne->lieuDeNaissance = $lieuDeNaissance; // lieu d'habitation
        $personne->personne_situation_mat = $situaMat; //situation matrimoniale du volontaire

        $personne->personne_antecedent_medic = $antecMedicVolont; //antecedent medicaux

        $personne->personne_qualification = $qualifVolontaire; //qualification
        $personne->personne_activite = $activiteVolontaire; //activite

        $personne->personne_telephone_1 = $tel1Volontaire; //telephone 1
        $personne->personne_telephone_2 = $tel2Volontaire; //telephone 2
        $personne->personne_email = $emailVolontaire; //email
        //
        $personne->TypePiece = $typePiece; //type de la piece 
        $personne->NumerPiece = $numPieceVolontaire; //numero de la piece 

        $personne->fonctionCR_idfonctionCR = $fonctionCR;
        $personne->profession_idprofession = $profVolontaire; //profession
        if (!empty($groupeSanguin))
            $personne->groupeSanguin = $groupeSanguin; //groupe sanguin

        $personne->personne_nom_urgence = $nomPersUrgence; //nom urgence
        $personne->personne_prenom_urgence = $prenomPersUrgence; //prenom urgence
        $personne->personne_tel_urgence = $telPersUrgence; //telephone urgence
        $personne->personne_email_urgence = $emailPersUrgence; //email urgence
        //personne->personne_profil = 1; //profil volontaire

        
        $AvoirPermis = (isset($AvoirPermis) && $AvoirPermis != null) ? $AvoirPermis : 'NON';
        $numeroPermis = (isset($numeroPermis) && $numeroPermis != null) ? $numeroPermis : '';
        $etatMere = (isset($etatMere)&& $etatMere != null) ? $etatMere : "";
        $etatPere = (isset($etatPere) && $etatPere == null) ? $etatPere : "" ;
        
        $personne->personne_avoir_permis = $AvoirPermis;
        $personne->personne_numero_permis = $numeroPermis;
        $personne->personne_nom_pere = $nomPereVolontaire;
        $personne->personne_prenom_pere = $prenomPereVolontaire;
        $personne->personne_nationalite_pere = $nationalitePere;
        $personne->personne_etat_pere = $etatPere;
        $personne->personne_nom_mere = $nomMereVolontaire;
        $personne->personne_prenom_mere = $prenomMereVolontaire;
        $personne->personne_nationalite_mere = $nationaliteMere;
        $personne->personne_etat_mere = $etatMere;

//        $retour = $personne->update(["personne_immat"=>$personne_immat]);
        $retour = $personne->where("personne_immat", $personne_immat)->update($personne->toArray());

        // UPDATE MALADIE
        //$personne->personne_affection = $maladieVolontaire;// inserer maladie

        /* if (!empty($maladieVolontaire)) {

          foreach ($maladieVolontaire as $maladie) {

          $personneAffection = new \App\modeles\personneAffection();
          $personneAffection->personneImmat = $personne_immat;
          $personneAffection->idaffection = $maladie;
          $retour = $personneAffection->save();
          }
          } */

        //SUPPRIMER LES CATEGOERIES DE PERMIS
        $personneCategorie = new \App\modeles\personneCategPermis();
        $retour = $personneCategorie->where("personne_immat", $personne_immat)->delete($personneCategorie->toArray());
        //INSERER DANS CATEGORIE PERMIS
        if ($AvoirPermis == "OUI" && !empty($categoriePermis)) {

            foreach ($categoriePermis as $categorie) {

                $personneCategorie = new \App\modeles\personneCategPermis();
                $personneCategorie->personne_immat = $this->Matricule;
                $personneCategorie->idcategorie = $categorie;
                $retour = $personneCategorie->save();
            }
        }
        //UPDATE DIPLOME
        /* SUPPRIMER LES DIPLOMES INSCRIS PRECEDEMENT */
        $personneDiplome = new \App\modeles\personneDiplome();
        $retour = $personneDiplome->where("persImmat", $personne_immat)->delete($personneDiplome->toArray());

        if (!empty($diplomes)) {

            foreach ($diplomes as $diplome) {

                $personneDiplome = new \App\modeles\personneDiplome();
                $personneDiplome->persImmat = $personne_immat;
                $personneDiplome->diplome_iddiplome = $diplome;
                $retour = $personneDiplome->save();
            }
        }
        //dd($personne);


        if ($retour == true) {
            echo "succes";
            //var_dump($request->file('ImageVolontaire'));
        } else {
            echo "echec";
        }
    }

    public function getToken() {

        $tokenArray = ["cle" => csrf_token()];
        echo json_encode($tokenArray);
    }

    public function insererFomrVolontaire(Request $request) { //methode qui insère pour la fiche volontaire

        //if (!isset($request->input('ImageVolontaire')) && !isset($request->input('ImagePieceVolontaire'))) {
        extract($request->all());
        //var_dump($request->input('donnees'));
        //$parametre = $request->all();
        //echo json_encode($request->all());
//        extract($request->all());
        //var_dump($parametre);
//        var_dump($parametre['ImageVolontaire']);
        //$donnees = $parametre['donnees'];


        $personne = new \App\modeles\Personne;
        $this->Matricule = $this->genererMatricule($comite); //

        $personne->comiteActuel = $comite; //inserer le comité
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
        $personne->lieuDeNaissance = $lieuDeNaissance; // lieu d'habitation

        $personne->personne_antecedent_medic = $antecMedicVolont; //antecedent medicaux

        $personne->personne_qualification = $qualifVolontaire; //qualification
        $personne->personne_activite = $activiteVolontaire; //activite

        $personne->personne_telephone_1 = $tel1Volontaire; //telephone 1
        $personne->personne_telephone_2 = $tel2Volontaire; //telephone 2
        $personne->personne_email = $emailVolontaire; //email
        //
        $personne->TypePiece = $typePiece; //type de la piece 
        $personne->NumerPiece = $numPieceVolontaire; //numero de la piece 

        $personne->fonctionCR_idfonctionCR = $fonctionCR;
        $personne->profession_idprofession = $profVolontaire; //profession
        if (!empty($groupeSanguin))
            $personne->groupeSanguin = $groupeSanguin; //groupe sanguin

        $personne->personne_nom_urgence = $nomPersUrgence; //nom urgence
        $personne->personne_prenom_urgence = $prenomPersUrgence; //prenom urgence
        $personne->personne_tel_urgence = $telPersUrgence; //telephone urgence
        $personne->personne_email_urgence = $emailPersUrgence; //email urgence
        //personne->personne_profil = 1; //profil volontaire
        $personne->personne_avoir_permis = $AvoirPermis;
        $personne->personne_numero_permis = $numeroPermis;
        $personne->personne_nom_pere = $nomPereVolontaire;
        $personne->personne_prenom_pere = $prenomPereVolontaire;
        $personne->personne_nationalite_pere = $nationalitePere;
        $personne->personne_etat_pere = "";
        $personne->personne_nom_mere = $nomMereVolontaire;
        $personne->personne_prenom_mere = $prenomMereVolontaire;
        $personne->personne_nationalite_mere = $nationaliteMere;
        $personne->personne_etat_mere = "";

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

        //INSERER DANS CATEGORIE PERMIS
        if ($AvoirPermis == "OUI" && !empty($categoriePermis)) {

            foreach ($categoriePermis as $categorie) {

                $personneCategorie = new \App\modeles\personneCategPermis();
                $personneCategorie->personne_immat = $this->Matricule;
                $personneCategorie->idcategorie = $categorie;
                $retour = $personneCategorie->save();
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
        //le upload de ficgiers
        if (!is_dir('uploads')) {
            mkdir('uploads');
        }
        if (!is_dir($this->Matricule)) {
            mkdir('uploads/' . $this->Matricule);
        }

        $ImageVolontaire = $request->file('ImageVolontaire');
        $ImagePieceVolontaire = $request->file('ImagePieceVolontaire');

        //var_dump($ImageVolontaire);
        //Move Uploaded File
        $destinationPath = 'uploads/' . $this->Matricule;
        $image = new \App\modeles\Images();
        $image->image_libelle = $ImageVolontaire->getClientOriginalName();
        $image->personne_idpersonne = $this->Matricule;
        $image->image_legende = "PHOTOVOLONTAIRE";

        $image2 = new \App\modeles\Images();
        $image2->image_libelle = $ImagePieceVolontaire->getClientOriginalName();
        $image2->personne_idpersonne = $this->Matricule;
        $image2->image_legende = "COPIEDELAPIECE";

        if ($ImageVolontaire->move($destinationPath, $ImageVolontaire->getClientOriginalName()) &&
                $ImagePieceVolontaire->move($destinationPath, $ImagePieceVolontaire->getClientOriginalName()) &&
                $image->save() && $image2->save()) {

            echo 'succes';
        } else {
            echo 'echec';
        }

        if ($retour == true) {
            //echo "succes";
            //return view('');
            //var_dump($request->file('ImageVolontaire'));
        } else {
            echo "echec";
        }
    }

    public function generateRapport($persnummat) {
        
        
        /*chdir("C:\\Users\User\Documents\projet-laravel\CROIX-ROUGE\croixRouge\public\");*/
        //var_dump(getcwd());
        
        
        $input = 'C:\Users\User\Documents\projet-laravel\CROIX-ROUGE\croixRouge\public\jasperfile/fiche_croix_rouge_volontaire.jrxml';
        
        $jasper = new PHPJasper;
        $jasper->compile($input)->execute();
        
        //$input = '/jasperfile/fiche_croix_rouge_volontaire.jrxml';
        $output = 'C:\Users\User\Documents\projet-laravel\CROIX-ROUGE\croixRouge\public\rapports\/';
        
        
        $jdbc_dir = "C:/Users/User/Documents/projet-laravel/CROIX-ROUGE/croixRouge/vendor/geekcom/phpjasper/bin/jasperstarter/jdbc";
        
        $options = [
            'format' => ['pdf'],
            'locale' => 'en',
            'params' => [
                'imageSource' => 'C:/Users/User/Documents/projet-laravel/CROIX-ROUGE/croixRouge/public/jasperfile/',
                'numMat' => $persnummat
            ],
            'db_connection' => [
                'driver' => 'mysql', //mysql, postgres, oracle, generic (jdbc)
                'username' => 'root',
                'host' => 'localhost',
                'database' => 'croixrouge2021',
                'port' => '3306',
                'jdbc_driver' => 'com.mysql.cj.jdbc.Driver',
                'jdbc_url' => 'jdbc:mysql://localhost/croixrouge2020',
                'jdbc_dir' => $jdbc_dir
            ]
        ];

        $jasper = new PHPJasper;

//    $rep = $jasper->process($input,$output,$options)->printOutput();
        $rep = $jasper->process($input, $output, $options)->execute();

        //if (file_exists($output.'fiche_croix_rouge_volontaire.pdf')) {
            if (chdir($output)) {
                if (rename('fiche_croix_rouge_volontaire.pdf', 'fiche_immat_'.$persnummat.'.pdf')) {
                    $pathToFile = 'fiche_immat_'.$persnummat.'.pdf';
                    $tabParam = array("persImat"=>'fiche_immat_'.$persnummat.'.pdf');
                    return view('view',$tabParam);
                } else {
                    
                }
            }
        //}
    }
    
    function removeVolontaire(Request $request){
        
        extract($request->all());
        
        //var_dump($idVolontaire);
        
        $personne = new \App\modeles\Personne;
        
        $personne = $personne->all()->where("idpersonne", $idVolontaire)->first();
        
        $personne->personne_top_valide = 0;
        
        if($personne->where("idpersonne", $idVolontaire)->update($personne->toArray())){
            
            echo 'succes';
        }
        else{
            
            echo 'echec';
        }
        
        
    }

}
