<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>

    <!------ Include the above in your HEAD tag ---------->
    <!--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->


    <link href="{{asset('css/header.css')}}" rel="stylesheet">  <!-- asset permet de adapter le serveur-->
</head>
<body>

    <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">e-Croix Rouge</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Accueil</a></li>
                    <!--                    <li><a href="#">Link</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">One more separated link</a></li>
                                            </ul>
                                        </li>-->
                </ul>
                <!--                <form class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>-->
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text">Avez vous déjà un compte ?</p></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        Login via
                                        <div class="social-buttons">
                                            <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                            <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                        </div>
                                        or
                                        <form class="form" method="post" action="Login" accept-charset="UTF-8" id="login-nav">
                                            @csrf
                                            <div class="form-group">
                                                <label class="sr-only" for="login">Email address</label>
                                                <input type="text" name="login" class="form-control" id="exampleInputEmail2" placeholder="login" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2" name="password" placeholder="mot de passe" required>
                                                <div class="help-block text-right"><a href="">Mot de passe oublié ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <!--<a href="admin" class="btn btn-primary btn-block">Connexion</a>-->
                                                <button class="btn btn-primary btn-block" type="submit">Connexion</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Se souvenir de moi
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        Nouveau ? <a href="#"><b>Inscrivez-vous</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="{{asset('js/login.js')}}"></script>

</body>
