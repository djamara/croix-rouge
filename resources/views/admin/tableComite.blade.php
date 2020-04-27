<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:08:51 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
        <link rel="stylesheet" href="vendors/bower_components/select2/dist/css/select2.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">

        <!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        -->

        <link rel="stylesheet" href="{{asset('js/special/bootstrapValidator.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('js/special/toastr.css')}}"/>
        <link rel="stylesheet" href="{{asset('js/special/confirm.min.css')}}">
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
                    <h1>LISTE DES VOLONTAIRES</h1>

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
                    <div class="card-body">
                        <!--                        <h4 class="card-title">Basic example</h4>
                                                <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6>-->
                        <h5><strong></strong></h5>
                        <form method="POST" action="insertComite" id="formComite">
                           @csrf
                            <div class="row col-lg-12">
                                <div class="col-sm-3 form-group">
                                    <label>Saisir le nom du comité local</label>
                                    <input type="text" name="nomComite" placeholder="Entrez le nom du comité" class="form-control" required="">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>La ville du comité</label>
                                    <select class="select2" name="villeComite">
                                        @foreach($villes as $ville)
                                        <option value="{{$ville->VIL_IDENTIFIANT}}">{{$ville->VIL_NOM}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>La commune du comité</label>
                                    <select class="select2" name="communeComite">
                                        @foreach($communes as $commune)
                                        <option value="{{$commune->idcommune}}">{{$commune->commune_libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <button class="btn btn-info" onclick="validerformulaire()"><span class="fa fa-plus"></span>Ajouter</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <h5><strong></strong></h5>
                        <!--                        <div class="row col-lg-12">
                                                    <div class="col-sm-8 form-group">
                                                        <label>La valeur recherchée</label>
                                                        <input type="text" placeholder="Entrez la valeur recherchée" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label>Option de recherche</label>
                                                        <select class="select2" name="optionRecherche" data-minimum-results-for-search="Infinity">
                                                            <option>comite local</option>
                                                            <option>profession</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row col-lg-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-info btn-circle">SUPRIMER<span class="fa fa-plus"></span></button>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <button class="btn btn-danger btn-circle">MODOFIER<span class="fa fa-linux"></span></button>
                                                    </div>
                                                </div>-->
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Comité Local</th>
                                        <th>Ville</th>
                                        <th>Commune</th>
                                        <th>Nombre de Volontaire</th>
                                        <th>Date creation</th>
                                        <th>
                                            <input type="checkbox" value="" name="" class="">
                                            <label>Tout cocher</label>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyTabVolont">
                                    @foreach($comites as $comite)
                                    <tr id="trTabVolont">
                                        <td id="idComite">{{$comite->idcomite}}</td>
                                        <td>{{$comite->comite_libelle}}</td>
                                        <td>{{$comite->ville}}</td>
                                        <td>{{$comite->commune}}</td>
                                        <td>{{count($comites)}}</td>
                                        <td><?php echo date_format(new DateTime($comite->created_at), 'd/m/Y') ?></td>

                                        <td>
                                            <input type="checkbox" value="" name="diplomes[]" class="">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <script src="{{asset('js/special/taostr.js')}}"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    <!--<script type="text/javascript" src="{{asset('js/special/bootstrapValidator.min.js')}}"></script>-->
        <script src="{{asset('js/special/confirm.min.js')}}"></script>
        <!-- Vendors -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <!-- Vendors: Data tables -->
        <script src="vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
        <script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="{{asset('vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="js/app.min.js"></script>

        <script src="{{asset('js/comite.js')}}"></script>
    </body>

    <!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:09:09 GMT -->
</html>