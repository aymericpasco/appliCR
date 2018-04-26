@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">
                    <h5>Connexion</h5>
                </div>
                <hr />

                <form method="POST" action="{{ route('login') }}" class="text-center">
                    @csrf

                    <div class="form-group">
                        <label for="email" >Adresse E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password" >Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mb-5">Connexion</button>
                </form>

            </div>
        </div>

    </div>

@endsection
