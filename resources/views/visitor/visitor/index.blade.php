@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">
                    <h3>Visiteurs</h3>
                </div>
                <hr />
                <div class="text-center">
                <small><b>Trier par nom de famille</b></small><br>
                @foreach($letters as $letter)
                    <small class="mr-3">
                        <a href="{{ route('visiteur.visiteurs.lettre', ['letter' => $letter->letter]) }}">
                            {!! ucfirst($letter->letter) !!}
                        </a>
                    </small>
                @endforeach
                </div>
                <hr />

            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">

                    <ul class="list-group list-group-flush">
                        @foreach($visitors as $visitor)
                            <li class="list-group-item">
                                <b>{!! $visitor->firstname !!} {!! $visitor->lastname !!}</b><br>
                                <small>Téléphone : {!! $visitor->phone !!}</small><br>
                                <small>E-mail : {!! $visitor->email !!}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </div>
@endsection