@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">
                    <h3>Comptes-rendus</h3>
                </div>
                <div class="d-flex justify-content-center mt-2 mb-2">
                    <a class="btn btn-outline-primary" href="{{ route('visiteur.rapport.ajouter') }}"
                       role="button">
                        Ajouter rapport de visite
                    </a>
                </div>
                <hr />
                <select class="custom-select custom-select-sm" onchange="location = this.value;">
                    <option selected>Filtrer par mois/année</option>
                    @foreach($uniqueDates as $date)
                        <option value="{{ route('visiteur.rapports.mois', ['year' => $date->year, 'month' => $date->month]) }}">
                            {!! $date->month !!}/{!! $date->year !!}
                        </option>
                    @endforeach
                </select>
                <hr />

            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">

                    <ul class="list-group list-group-flush">
                        @foreach($visitorReports as $report)
                            <li class="list-group-item">
                                <a href="{{ route('visiteur.rapport.afficher', ['reportId' => $report->id]) }}">
                                    Rapport de visite du {!! \Carbon\Carbon::parse($report->report_date)->format('d/m/Y') !!}
                                </a><br>
                                <small>Praticien : {!! $report->doctor->firstname !!} {!! $report->doctor->lastname !!}</small>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </div>
@endsection