<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:10:36 GMT -->
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>e-Croix Rouge 2.0 / Modifier volontaire</title>
        <link rel="stylesheet" href="{{asset('css/bootstrapValidator.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/bootstrapValidator.min.css')}}"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/bower_components/animate.css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/bower_components/select2/dist/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/bower_components/dropzone/dist/dropzone.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/bower_components/flatpickr/dist/flatpickr.min.css')}}" />
        <link rel="stylesheet" href="{{asset('vendors/bower_components/nouislider/distribute/nouislider.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/bower_components/rateYo/min/jquery.rateyo.min.css')}}">

        <!--Nifty Stylesheet [ REQUIRED ]-->
        <link rel="stylesheet" href="{{asset('demo/css/nifty.min.css')}}" />
        <link rel="stylesheet" href="{{asset('demo/css/nifty-demo.min.css')}}"/>

        <link rel="stylesheet" href="{{asset('demo/css/font-awesome/css/font-awesome.min.css')}}"/>

        <!--Nifty Premium Icon [ DEMONSTRATION ]-->
        <link rel="stylesheet" href="{{asset('demo/css/nifty-demo-icons.min.css')}}" >
        <!--<link href="demo/css/nifty-demo-icons.min.css" rel="stylesheet">-->


        <!-- App styles -->
        <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
        <!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
                -->
        <link rel="stylesheet" href="{{asset('js/special/toastr.css')}}"/>
        <link rel="stylesheet" href="{{asset('js/special/bootstrapValidator.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('js/special/confirm.min.css')}}">

        <!--        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrapValidator.min.js"></script>-->

    </head>

    <body data-sa-theme="1">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            @include('admin/sidebar')

            <section class="content">
                <header class="content__title">
                    <h1>RESSOURCES HUMAINES</h1>
                    <small>A cette page vous inserer un nouveau volontaire</small>

                    <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                        <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                <a href="#" class="dropdown-item">Settings</a>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="card">
                    <form name="insererVolontaire" id="formVolontaire" method="POST" action="/modifier_Volontaire" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">

                            <div class="tab-container">
                                <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home-2" role="tab">Informations générales</a>
                                    </li>
                                    <!-- <li class="nav-item">  <a class="nav-link" data-toggle="tab" href="#profile-2" role="tab">Informations relatives à croix-rouge</a>
                                                                                                                                                                                                        </li>-->
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active fade show" id="home-2" role="tabpanel">
                                        <div class="row col-lg-12">

                                            <h5>Généralité</h5>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez l'activité ">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Comite local</label>
                                                    <select class="select2" name="comite" >
                                                        @foreach($comites as $comite)
                                                            <option value="{{$comite->idcomite}}" <?php if($volontaire->comiteActuel == $comite->idcomite) echo "selected" ?> >{{$comite->comite_libelle}}</option>
                                                        @endForeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Fonction du volontaire</label>
                                                    <select class="select2" name="fonctionCR">
                                                        @foreach($fonctionCR as $fonctionCR)
                                                            <option value="{{$fonctionCR->idfonctionCR}}" <?php if($volontaire->fonctionCR_idfonctionCR == $fonctionCR->idfonctionCR) echo "selected" ?>>{{$fonctionCR->fonctionCR_libelle}}</option>
                                                        @endForeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez l'activité ">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <label>Numero de fiche volontaire</label>
                                                        <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_numero_fiche}}" name="numeroFiche" placeholder="Entrez le numero de la fiche" required="">
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Êtes vous un nouvel adhérent ?</label>
                                                    <div class="form-group form-check">
                                                        <label class="form-check-label" for="exampleCheck1">Oui</label>
                                                        <input type="radio" value="OUI" class="custom-checkbox" name="EtreNouveau" <?php if($volontaire->personne_nouvel_adherent == 'OUI'){echo 'checked' ;} ?> id="idEtreNouveau" onclick="activerZoneMatricule()">
                                                         <label class="form-check-label" for="exampleCheck1">Non</label>
                                                        <input type="radio" value="NON" class="custom-checkbox" name="EtreNouveau" <?php if($volontaire->personne_nouvel_adherent == 'NON'){echo 'checked' ;} ?>  onclick="activerZoneMatricule()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Entrez le numero svp</label>
                                                        <input type="text" class="form-control form-control-md" name="numeroMatricule" value="{{$volontaire->personne_immat}}" placeholder="Entrez le numero matricule" id="idnumeroMatricule" >
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Civilité</label>
                                                    <select class="select2" name="civilite">
                                                        <option <?php if($volontaire->personne_civilite == 'Mr') echo "selected" ?>  >Mr</option>
                                                        <option <?php if($volontaire->personne_civilite == 'Mlle') echo "selected" ?>>Mlle</option>
                                                        <option <?php if($volontaire->personne_civilite == 'Mme') echo "selected" ?>>Mme</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" class="form-control form-control-md" name="nomVolontaire" value="{{$volontaire->personne_nom}}" placeholder="Entrez le nom" required="">
                                                        <input type="hidden" class="form-control form-control-md" name="idpersonne" value="{{$volontaire->idpersonne}}" placeholder="Entrez le nom">
                                                        <input type="hidden" class="form-control form-control-md" name="personne_immat" value="{{$volontaire->personne_immat}}" placeholder="Entrez le nom">
                                                        <i class="form-group__bar"></i>

                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Prenom</label>
                                                        <input type="text" class="form-control form-control-md" name="prenomVolontaire" value="{{$volontaire->personne_prenom}}" placeholder="Entrez le prenom" required="">
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Date de naissance</label>
                                                        <input type="date" class="form-control form-control-md" name="dateNaissVolontaire" value="{{$volontaire->personne_date_naiss}}" placeholder="Entrez la date de naissance" required="">
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Situation matrimoniale</label>
                                                        <select class="select2" name="situaMat">
                                                            @foreach($situationMatrimoniale as $sitMat)
                                                                <option value="{{$sitMat->idSitMat}}">{{$sitMat->libelle_SitMat}}</option>
                                                            @endForeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pays de naissance</label>
                                                        <select class="select2" name="paysNaiss" id="paysNaiss" onchange="hideZoneVilCommune()">
                                                            @foreach($paysNaiss as $pays)
                                                                <option value="{{$pays->PAYS_CODE}}" <?php if($volontaire->personne_pays_naiss == $pays->PAYS_CODE) echo "selected" ?> >{{$pays->PAYS_NOM}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-6 zoneVilCommune">
                                                    <div class="col-sm-4 form-group">
                                                        <label>Ville de naissance</label>
                                                        <select class="select2" name="vilNaiss" id="vilNaiss">
                                                            @foreach($villes as $ville)
                                                                <option value="{{$ville->VIL_IDENTIFIANT}}" <?php if($volontaire->personne_ville_naiss == $ville->VIL_IDENTIFIANT) echo "selected" ?> >{{$ville->VIL_NOM}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-8 form-group">
                                                        <label>Lieu de naissance</label>
                                                        <input type="text" class="form-control form-control-md" value="{{$volontaire->lieuDeNaissance}}" name="lieuDeNaissance" placeholder="Entrez la précision sur le lieu de naissance" >
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-6 zoneVilCommune">
                                                    <div class="form-group">
                                                        <label>Commune de naissance</label>
                                                        <select class="select2" name="comNaiss" id="comNaiss">
                                                            @foreach($communes as $commune)
                                                                <option value="{{$commune->idcommune}}" <?php if($volontaire->personne_commune_naiss == $commune->idcommune) echo "selected" ?> >{{$commune->commune_libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="hidden">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Pays de nationalite</label>
                                                    <select class="select2" name="nationalite">
                                                        @foreach($paysNat as $pays)
                                                            <option value="{{$pays->PAYS_CODE}}" <?php if($volontaire->personne_pays_nationalite == $pays->PAYS_CODE) echo "selected" ?> >{{$pays->PAYS_NOM}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--                                            <div class="col-sm-6">
                                            <div class="form-group">
                                            <input type="hidden" class="form-control form-control-md" >
                                            <i class="form-group__bar"></i>
                                            </div>
                                            </div>-->
                                            <div class="row col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Type de pièces</label>
                                                        <select class="select2" name="typePiece">
                                                            @foreach($typePiece as $typePiece)
                                                                <option value="{{$typePiece->idTypePiece}}" <?php if($volontaire->TypePiece == $typePiece->idTypePiece) echo "selected" ?>>{{$typePiece->libelleTypePiece}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>numero de la pièce</label>
                                                        <input type="text" class="form-control form-control-md" value="{{$volontaire->NumerPiece}}" name="numPieceVolontaire"  placeholder="Entrez le numero de la pièce" required="">
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez l'activité ">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <h5>Education</h5>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez l'activité ">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>Diplomes</label>
                                                <div class="form-group">
                                                    @foreach($diplomes as $diplome)
                                                        <label class="">
                                                            <input id="radio1" type="checkbox" value="{{$diplome->iddiplome}}" <?php if( in_array($diplome->iddiplome , $diplomes_personne) == true) echo "checked"  ?> name="diplomes[]" class="custom-control custom-checkbox" >
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">{{$diplome->diplome_libelle}}</span>
                                                        </label>

                                                        <div class="clearfix mb-2"></div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Profession</label>
                                                        <select class="select2" name="profVolontaire">
                                                            @foreach($profession as $profession)
                                                                <option value="{{$profession->idprofession}}" <?php if($volontaire->profession_idprofession == $profession->idprofession) echo "selected" ?> >{{$profession->profession_libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Qualification professionnelle</label>
                                                        <input type="text" class="form-control form-control-md" placeholder="Entrez la qualification" value="{{$volontaire->personne_qualification}}" name="qualifVolontaire">
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Activité</label>
                                                    <input type="text" class="form-control form-control-md" name="activiteVolontaire" value="{{$volontaire->personne_activite}}" placeholder="Entrez l'activité" >
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="col-sm-4">
                                                    <label>Avez vous un permis de conduire ?</label>
                                                    <div class="form-group form-check">
                                                        <label class="form-check-label" for="exampleCheck1">Oui</label>
                                                        <input type="checkbox" value="OUI" <?php if($volontaire->personne_avoir_permis == "OUI") echo "checked" ?> class="custom-checkbox" name="AvoirPermis" id="idAvoirPermis" onclick="activerZonePermis()">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Entrez le numero svp</label>
                                                        <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_numero_permis}}" name="numeroPermis" placeholder="Entrez l'activité" id="idnumeroPermis" >
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Catégorie du permis</label>
                                                        <select class="select2" multiple data-minimum-results-for-search="Infinity" name="categoriePermis[]" id="idcategoriePermis">
                                                            @foreach($categoriePermis as $categoriePermis)
                                                            <option value="{{$categoriePermis['idCategorie']}}">{{$categoriePermis['categorie_libelle']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5>Santé</h5>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez l'activité" >
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Groupe sanguin</label>
                                                    <select class="select2" name="groupeSanguin" data-minimum-results-for-search="Infinity">
                                                        @foreach($groupesanguin as $groupesanguin)
                                                            <option value="{{$groupesanguin->idGroupeSanguin}}">{{$groupesanguin->libelleGroupeSanguin}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label>Maladie chronique</label>
                                                    <select class="select2" multiple data-minimum-results-for-search="Infinity" name="maladieVolontaire[]">
                                                        @foreach($affections as $affection)
                                                            <option value="{{$affection->idaffection}}">{{$affection->affection_libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Antécédent médicale du volontaire: (Pour chaque detail, veuillez passer à la ligne svp)</label>
                                                    <textarea  class="form-control form-control-md" name="antecMedicVolont" placeholder="Entrez vos antécedents médicaux">{{$volontaire->personne_antecedent_medic}}</textarea>
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <h5>Adresses</h5>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez l'activité ">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Ville d'habitation</label>
                                                    <select class="select2" name="vilHabitVolontaire">
                                                        @foreach($villes as $ville)
                                                        <option value="{{$ville->VIL_IDENTIFIANT}}">{{$ville->VIL_NOM}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Commune d'habitation</label>
                                                    <select class="select2" name="comHabitVolontaire">
                                                        @foreach($communes as $commune)
                                                        <option value="{{$commune->idcommune}}">{{$commune->commune_libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Telephone 1:</label>
                                                    <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_telephone_1}}" name="tel1Volontaire" placeholder="Entrez le numero" required="">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                                <div class="form-group">
                                                    <label>Telephone 2:</label>
                                                    <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_telephone_2}}" name="tel2Volontaire" placeholder="Entrez le numero">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email du volontaire:</label>
                                                    <input type="email" class="form-control form-control-md" value="{{$volontaire->personne_email}}" name="emailVolontaire" placeholder="Entrez le email">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                        </div>
                                            <h5>Filiation</h5>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12">
                                                <div class="row col-sm-6">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nom du père:</label>
                                                        <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_nom_pere}}" name="nomPereVolontaire" placeholder="Entrez le nom du contact" >
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Prenom du père:</label>
                                                        <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_prenom_pere}}" name="prenomPereVolontaire" placeholder="Entrez le prenom du contact" >
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pays de nationalite du père</label>
                                                        <select class="select2" name="nationalitePere" id="nationalitePere">
                                                            @foreach($paysNat as $pays)
                                                                <option value="{{$pays->PAYS_CODE}}" <?php if($volontaire->personne_nationalite_pere == $pays->PAYS_CODE) echo "selected" ?> >{{$pays->PAYS_NOM}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="custom-control custom-checkbox">
                                                        <input id="radio1" type="checkbox" value="decede" <?php if($volontaire->personne_etat_pere == "decede") echo "checked" ?> name="etatPere" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Si décédé, cochez svp</span>
                                                    </label>

                                                </div>
                                            </div>
                                                <div class="row col-sm-6">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Nom de la mère:</label>
                                                        <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_nom_mere}}" name="nomMereVolontaire" placeholder="Entrez le nom du contact" >
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Prenom de la mère:</label>
                                                        <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_prenom_mere}}" name="prenomMereVolontaire" placeholder="Entrez le prenom du contact" >
                                                        <i class="form-group__bar"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Pays de nationalite de la mère</label>
                                                        <select class="select2" name="nationaliteMere" id="nationaliteMere">
                                                            @foreach($paysNat as $pays)
                                                                <option value="{{$pays->PAYS_CODE}}" <?php if($volontaire->personne_nationalite_mere == $pays->PAYS_CODE) echo "selected" ?>>{{$pays->PAYS_NOM}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="custom-control custom-checkbox">
                                                        <input id="radio1" type="checkbox" value="decede" <?php if($volontaire->personne_etat_mere == "decede") echo "checked" ?> name="etatMere" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Si décédé, cochez svp</span>
                                                    </label>

                                                </div>
                                            </div>
                                            </div>
                                            <h5>Personne à contacter en cas d'urgences</h5>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nom:</label>
                                                    <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_nom_urgence}}" name="nomPersUrgence" placeholder="Entrez le nom du contact" required="">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Prenom:</label>
                                                    <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_prenom}}"  name="prenomPersUrgence" placeholder="Entrez le prenom du contact" required="">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Contacts:</label>
                                                    <input type="text" class="form-control form-control-md" value="{{$volontaire->personne_tel_urgence}}" name="telPersUrgence" placeholder="Entrez le numero du contact" required="">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="email" class="form-control form-control-md" value="{{$volontaire->personne_email_urgence}}" name="emailPersUrgence" placeholder="Entrez le email du contact">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                        </div>

                                            <br>
                                            <h5>Image du volontaire</h5>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Joindre une photo numerique </label>
                                                    <input type="file" class="form-control form-control-md" id="imageVolontaire" name="imageVolontaire" placeholder="Enregistrer la photo du contact">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Joindre une image de pièce fournie </label>
                                                    <input type="file" class="form-control form-control-md" id="imagePieceVolontaire" name="imagePieceVolontaire" placeholder="Enregistrer le scan de la piece d'identité">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-4">
                                        <input type="hidden">
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="submit" class="btn btn-info btn-lg" accept=".jpg" value="Soumettre le formulaire">
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="hidden">
                                </div>

                            </div>
                        </div>
                    </form>

                    {{--<div class="row">
                    <div class="col-lg-4">
                        <input type="hidden">
                    </div>
                    <div class="col-lg-8">
                        <input type="submit" class="btn btn-danger btn-lg" value="ENREGISTRER">
                    </div>
                </div>--}}
                    <footer class="footer hidden-xs-down">
                        <p>© Super Admin Responsive. All rights reserved.</p>

                        <ul class="nav footer__nav">
                            <a class="nav-link" href="#">Homepage</a>

                            <a class="nav-link" href="#">Company</a>

                            <a class="nav-link" href="#">Support</a>

                            <a class="nav-link" href="#">News</a>

                            <a class="nav-link" href="#">Contacts</a>
                        </ul>
                    </footer>
            </section>
        </main>

        <!-- Older IE warning message -->
        <!--[if IE]>
        <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

        <div class="ie-warning__downloads">
        <a href="http://www.google.com/chrome">
        <img src="img/browsers/chrome.png" alt="">
        </a>

        <a href="https://www.mozilla.org/en-US/firefox/new">
        <img src="img/browsers/firefox.png" alt="">
        </a>

        <a href="http://www.opera.com">
        <img src="img/browsers/opera.png" alt="">
        </a>

        <a href="https://support.apple.com/downloads/safari">
        <img src="img/browsers/safari.png" alt="">
        </a>

        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
        <img src="img/browsers/edge.png" alt="">
        </a>

        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
        <img src="img/browsers/ie.png" alt="">
        </a>
        </div>
        <p>Sorry for the inconvenience!</p>
        </div>
        <![endif]-->

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<!--        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>-->
        <script type="text/javascript" src="{{asset('js/special/bootstrapValidator.min.js')}}"></script>
        <script src="{{asset('js/special/taostr.js')}}"></script>
        <script src="{{asset('js/special/confirm.min.js')}}"></script>

<!--<script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>-->
        <script src="{{asset('vendors/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/dropzone/dist/min/dropzone.min.js')}}"></script>

        <!--toastr-->

        <!--Demo script [ DEMONSTRATION ]-->
        <script src="{{asset('js/notify.min.js')}}"></script>
        <script src="{{asset('js/nifty.min.js')}}"></script>
        <script src="{{asset('js/notify.js')}}"></script>

        <!-- App functions and actions -->
        <!--<script src="{{asset('js/bootstrapValidator.js')}}"></script> -->
        <script src="{{asset('js/volontaire.js')}}"></script>
        <script src="{{asset('js/language/fr_FR.js')}}"></script>
        <script src="{{asset('js/app.min.js')}}"></script>
    </body>

    <!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:10:36 GMT -->
</html>
