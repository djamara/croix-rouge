<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:10:36 GMT -->
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>e-Croix Rouge 2.0 / Inserer volontaire</title>
        <link rel="stylesheet" href="{{asset('css/bootstrapValidator.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/bootstrapValidator.min.css')}}"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
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

        <!--Nifty Stylesheet [ REQUIRED ]-->
        <link rel="stylesheet" href="{{asset('demo/css/nifty.min.css')}}" />
        <link rel="stylesheet" href="{{asset('demo/css/nifty-demo.min.css')}}"/>

        <link rel="stylesheet" href="{{asset('demo/css/font-awesome/css/font-awesome.min.css')}}"/>

        <!--Nifty Premium Icon [ DEMONSTRATION ]-->
        <link rel="stylesheet" href="{{asset('demo/css/nifty-demo-icons.min.css')}}" >
        <!--<link href="demo/css/nifty-demo-icons.min.css" rel="stylesheet">-->


        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
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
                    <div class="card-body">
                        <form name="gererCompte" id="gererCompte" method="POST" action="/inserer_compte" enctype="multipart/form-data" >
                            @csrf
                            <h4 class="card-title">Gestion des Comptes</h4>
                            <h6 class="card-subtitle">Ici vous pouvez modifiez vos informations de connexion votre <code>Login</code> et votre <code>Mot de passe</code></h6>

                            <div class="tab-container">
                                <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home-2" role="tab">Identification du compte</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile-2" role="tab">Privilèges du compte</a>
                                    </li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active fade show" id="home-2" role="tabpanel">
                                            <div class="row col-sm-12">
                                                <div class="col-sm-2"></div>
                                                <div class="row col-sm-10">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Matricule</label>
                                                            <select class="select2 form-control-lg" name="matricule">
                                                                <option></option>
                                                                @foreach($personne as $personne)
                                                                    <option value="{{$personne->personne_immat}}">{{$personne->personne_immat." | ".$personne->personne_nom." ".$personne->personne_prenom}}</option>
                                                                @endForeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Login</label>
                                                            <input type="text" class="form-control form-control-lg" name="login" placeholder="Entrez un login" required="">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Mot de passe</label>
                                                            <input type="password" class="form-control form-control-lg" name="motdepasse" placeholder="Entrez le mot de passe" required="">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Confirmation du mot de passe</label>
                                                            <input type="password" class="form-control form-control-lg" name="cfmotdepasse" placeholder="Confirmez le mot de passe" required="">
                                                            <i class="form-group__bar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                   </div>
                                    <div class="tab-pane fade" id="profile-2" role="tabpanel">
                                        <div class="row col-sm-12">
                                            <div class="col-sm-3">
                                                <label>Ressources humaines</label>
                                                <div class="form-group">
                                                    @foreach($privilege as $privilege)
                                                        <label class="custom-control custom-checkbox">
                                                            <input id="radio1" type="checkbox" value="{{$privilege->idPrivilege}}" name="privilege[]" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">{{$privilege->privilege_libelle}}</span>
                                                        </label>
                                                        <div class="clearfix mb-2"></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Administration</label>
                                                <div class="form-group">
                                                    @foreach($privileges as $privilege)
                                                        <label class="custom-control custom-checkbox">
                                                            <input id="radio1" type="checkbox" value="{{$privilege->idPrivilege}}" name="privilege[]" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">{{$privilege->privilege_libelle}}</span>
                                                        </label>
                                                        <div class="clearfix mb-2"></div>
                                                    @endforeach
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
                                     <input type="submit" class="btn btn-success btn-lg" value="Valider les modifications">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
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
        <script src="{{asset('js/compte.js')}}"></script>
        <script src="{{asset('js/language/fr_FR.js')}}"></script>
        <script src="{{asset('js/app.min.js')}}"></script>
    </body>

    <!-- Mirrored from byrushan.com/projects/super-admin/app/2.1/tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 10:10:36 GMT -->
</html>
