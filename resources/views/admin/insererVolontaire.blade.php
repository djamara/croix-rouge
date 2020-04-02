<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:10:36 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>e-Croix Rouge 2.0 / Inserer volontaire</title>
        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
        <link rel="stylesheet" href="vendors/bower_components/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="vendors/bower_components/dropzone/dist/dropzone.css">
        <link rel="stylesheet" href="vendors/bower_components/flatpickr/dist/flatpickr.min.css" />
        <link rel="stylesheet" href="vendors/bower_components/nouislider/distribute/nouislider.min.css">
        <link rel="stylesheet" href="vendors/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css">
        <link rel="stylesheet" href="vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css">
        <link rel="stylesheet" href="vendors/bower_components/rateYo/min/jquery.rateyo.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
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
                    <form name="insererVolontaire" id="insererVolontaire" method="POST">
                        <div class="card-body">

                            <div class="tab-container">
                                <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home-2" role="tab">Informations générales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile-2" role="tab">Informations relatives à croix-rouge</a>
                                    </li>
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
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Civilité</label>
                                                    <select class="select2">
                                                        <option>Mr</option>
                                                        <option>Mlle</option>
                                                        <option>Mme</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nom</label>
                                                    <input type="text" class="form-control form-control-md" placeholder="Entrez le nom">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Prenom</label>
                                                    <input type="text" class="form-control form-control-md" placeholder="Entrez le prenom">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Date de naissance</label>
                                                    <input type="date" class="form-control form-control-md" placeholder="Entrez la date de naissance">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Situation matrimoniale</label>
                                                    <select class="select2">
                                                        <option>Celibataire</option>
                                                        <option>Marié(e)</option>
                                                        <option>Veuf(ve)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Ville de naissance</label>
                                                    <select class="select2">
                                                        @foreach($villes as $ville)
                                                            <option value="{{$ville->idville}}">{{$ville->ville_libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Commune de naissance</label>
                                                    <select class="select2">
                                                        @foreach($communes as $commune)
                                                        <option value="{{$commune->idcommune}}">{{$commune->commune_libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nationalité</label>
                                                    <select class="select2">
                                                        @foreach($pays as $pays)
                                                            <option value="{{$pays->idcommune}}">{{$pays->pays_libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez le numero de la pièce">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Type de pièces</label>
                                                    <select class="select2">
                                                        <option>Subaru</option>
                                                        <option>Mitsubishi</option>
                                                        <option>Scion</option>
                                                        <option>Daihatsu</option>
                                                        <option>Hino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>numero de la pièce</label>
                                                    <input type="text" class="form-control form-control-md" placeholder="Entrez le numero de la pièce">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <h5>Education</h5>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez l'activité ">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Diplomes</label>
                                                <div class="form-group">
                                                    <label class="custom-control custom-checkbox">
                                                        <input id="radio1" name="radio" type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">CEPE</span>
                                                    </label>

                                                    <div class="clearfix mb-2"></div>

                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">BEPC</span>
                                                    </label>

                                                    <div class="clearfix mb-2"></div>

                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">BAC</span>
                                                    </label>

                                                    <div class="clearfix mb-2"></div>

                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">BTS</span>
                                                    </label>
                                                    <div class="clearfix mb-2"></div>

                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">LICENCE</span>
                                                    </label>
                                                    <div class="clearfix mb-2"></div>

                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">INGENIEUR</span>
                                                    </label>
                                                    <div class="clearfix mb-2"></div>

                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">MASTER</span>
                                                    </label>
                                                    <div class="clearfix mb-2"></div>

                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">DOCTORAT</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Profession</label>
                                                    <select class="select2">
                                                        <option>Subaru</option>
                                                        <option>Mitsubishi</option>
                                                        <option>Scion</option>
                                                        <option>Daihatsu</option>
                                                        <option>Hino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Qualification professionnelle</label>
                                                    <input type="text" class="form-control form-control-md" placeholder="Entrez la qualification">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Activité</label>
                                                    <input type="text" class="form-control form-control-md" placeholder="Entrez l'activité ">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <h5>Santé</h5>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez l'activité ">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Groupe sanguin</label>
                                                    <select class="select2" data-minimum-results-for-search="Infinity">
                                                        <option>Subaru</option>
                                                        <option>Mitsubishi</option>
                                                        <option>Scion</option>
                                                        <option>Daihatsu</option>
                                                        <option>Hino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label>Maladie chronique</label>
                                                    <select class="select2" multiple data-minimum-results-for-search="Infinity">
                                                        <option>Subaru</option>
                                                        <option>Mitsubishi</option>
                                                        <option>Scion</option>
                                                        <option>Daihatsu</option>
                                                        <option>Hino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h5>Adresses</h5>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez l'activité ">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Ville d'habitation</label>
                                                    <select class="select2" name="">
                                                        @foreach($villes as $ville)
                                                        <option value="{{$ville->idville}}">{{$ville->ville_libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Commune d'habitation</label>
                                                    <select class="select2">
                                                        @foreach($communes as $commune)
                                                            <option value="{{$commune->idcommune}}">{{$commune->commune_libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Telephone du volontaire:</label>
                                                    <input type="text" class="form-control form-control-md" placeholder="Entrez le numero">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email du volontaire:</label>
                                                    <input type="email" class="form-control form-control-md" placeholder="Entrez le email">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <h5>Personne à contacter en cas d'urgences</h5>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez le email">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nom:</label>
                                                    <input type="text" class="form-control form-control-md" placeholder="Entrez le nom du contact">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Prenom:</label>
                                                    <input type="text" class="form-control form-control-md" placeholder="Entrez le prenom du contact">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Contacts:</label>
                                                    <input type="text" class="form-control form-control-md" placeholder="Entrez le numero du contact">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="email" class="form-control form-control-md" placeholder="Entrez le email du contact">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>



                                            <br>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile-2" role="tabpanel">
                                        <div class="row col-lg-12">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Vous êtes un nouvel inscrit ?</label>
                                                    <select class="select2" data-minimum-results-for-search="Infinity">
                                                        <option>Oui</option>
                                                        <option>Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Date d'adhesion</label>
                                                    <input type="date" class="form-control form-control-md" placeholder="Entrez la date d'adhesion">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>1ère comité local</label>
                                                    <select class="select2" data-minimum-results-for-search="Infinity">
                                                        <option>Abidjan1</option>
                                                        <option>Abidjan2</option>
                                                        <option>Abidjan3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h5>Historique du volontaire</h5>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez la date d'adhesion">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <table class="table table-responsive table-borderless">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Comité local</td>
                                                        <td>Date d'entrée</td>
                                                        <td>Date de sortie</td>
                                                        <td>Comité actuel</td>
                                                    </tr>
                                                </thead
                                                <tbody id="tabComite">
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <select class="select2" data-minimum-results-for-search="Infinity">
                                                                <option>comité1</option>
                                                                <option>comité2</option>
                                                                <option>comité3</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date d'entrée">
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="actuel" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <select class="select2" data-minimum-results-for-search="Infinity">
                                                                <option>comité1</option>
                                                                <option>comité2</option>
                                                                <option>comité3</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date d'entrée">
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="actuel" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>
                                                            <select class="select2" data-minimum-results-for-search="Infinity">
                                                                <option>comité1</option>
                                                                <option>comité2</option>
                                                                <option>comité3</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date d'entrée">
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="actuel" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>
                                                            <select class="select2" data-minimum-results-for-search="Infinity">
                                                                <option>comité1</option>
                                                                <option>comité2</option>
                                                                <option>comité3</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date d'entrée">
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="actuel" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>
                                                            <select class="select2" data-minimum-results-for-search="Infinity">
                                                                <option>comité1</option>
                                                                <option>comité2</option>
                                                                <option>comité3</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date d'entrée">
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="actuel" class="form-control form-control-md" placeholder="Entrez la date de sortie">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control form-control-md" placeholder="Entrez la date d'adhesion">
                                                    <i class="form-group__bar"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <a class="btn btn-danger" onclick="addTabHistorique()">Valider</a>
                                            </div>
                                    </div>

                                    </div>
                                    <div class="tab-pane fade" id="messages-2" role="tabpanel">
                                        <p>Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis. Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat. Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.Morbi mattis ullamcorper velit. Etiam rhoncus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Cras id dui. Curabitur turpis. Etiam ut purus mattis mauris sodales aliquam. Aenean viverra rhoncus pede. Nulla sit amet est. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Praesent ac sem eget est egestas volutpat. Cras varius. Morbi mollis tellus ac sapien. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Fusce vel dui.</p>
                                    </div>
                                    <div class="tab-pane fade" id="settings-2" role="tabpanel">
                                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas faucibus mollis interdum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

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
        <!--<script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>-->
        <script src="{{asset('vendors/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{asset('vendors/bower_components/dropzone/dist/min/dropzone.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{asset('js/volontaire.js')}}"></script>
        <script src="{{asset('js/app.min.js')}}"></script>
    </body>

    <!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:10:36 GMT -->
</html>