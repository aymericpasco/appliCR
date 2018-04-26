@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">
                    <h3>Tableau de bord</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('visiteur.rapports') }}">Comptes-rendus</a><br>
                            <small>- <a href="{{ route('visiteur.rapport.ajouter') }}">Ajouter un compte-rendu</a></small>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('visiteur.visiteurs') }}">Liste des visiteurs</a><br>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('visiteur.medecins') }}">Liste des praticiens</a><br>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
@endsection
