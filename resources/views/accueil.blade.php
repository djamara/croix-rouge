@extends('Layouts.app') 

@section('title','Accueil')
@section('sidebar')
@parent
@endsection
@section('content')
<div class="container">

    <?php
    /*    try {
        DB::connection()->getPdo();
        } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. error:" . $e);
    }*/
    $pdo = DB::connection()->getPdo();
    ?>
    <div class="jumbotron" style="opacity: 0.5">
        <h2 class="h2">BIENVENUE DANS <h1><strong>LE MANAGER</strong></h1> </h2>

        <p class=" text text-lg">
            Le système intégré de gestion des volantaires de la croix rouge. L'administration au bout du clic
        </p>
    </div>

</div> 
@endSection