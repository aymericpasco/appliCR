@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">
                    <h3>Médecins</h3>
                </div>
                <hr />
                <div class="text-center">
                    <small><b>Trier par nom de famille</b></small><br>
                    @foreach($letters as $letter)
                        <small class="mr-3">
                            <a href="{{ route('visiteur.medecins.lettre', ['letter' => $letter->letter]) }}">
                                {!! ucfirst($letter->letter) !!}
                            </a>
                        </small>
                    @endforeach
                </div>
                <div class="text-center">
                    <small><b>Trier par département</b></small><br>
                    @foreach($departments as $department)
                        <small class="mr-3">
                            <a href="{{ route('visiteur.medecins.departement', ['department' => intval($department->department)]) }}">
                                {!! $department->department !!}
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
                        @foreach($doctors as $doctor)
                            <li class="list-group-item">
                                <b>{!! $doctor->firstname !!} {!! $doctor->lastname !!}</b><br>
                                @if($doctor->specialty)
                                    <small>Spécialité : {!! $doctor->specialty !!}</small><br>
                                @endif
                                <small>Adresse : {!! $doctor->address !!}</small><br>
                                <small>Téléphone : {!! $doctor->phone !!}</small><br>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </div>
@endsection