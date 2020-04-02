@extends('Layouts.app')

@section('title','Accueil')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="container">
        
        <div class="jumbotron">
            <h2 class="h2">BIENVENUE DANS <h1><strong>LE MANAGER</strong></h1> </h2>
            <p class=" text text-lg">
                Le système intégré de gestion des volantaires de la croix rouge. L'administration au bout du clic
            </p>
        </div>
        
    </div>
@endsection
@section('footer')
    @parent
@show
