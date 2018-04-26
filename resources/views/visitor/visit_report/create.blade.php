@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">
                    <h5>Ajouter un nouveau rapport :</h5>
                </div>
                <hr />

                <form method="POST" action="{{ action('Visitor\VisitReportController@store') }}" class="text-center">
                    @csrf
                    <div class="form-group">
                        <label for="doctor">Practicien :</label>
                        <select class="form-control" id="doctor" name="doctor" required>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">
                                    {{ $doctor->firstname }} {{ $doctor->lastname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="report_date">Date du rapport :</label>
                        <input type="text" name="report_date" id="report_date" class="form-control date-input"
                               placeholder="Date" data-provide="datepicker" data-date-end-date="0d" required>
                    </div>
                    <div class="form-group">
                        <label for="reason">Motif de la visite :</label>
                        <input type="text" class="form-control" id="reason" name="reason" required>
                    </div>
                    <div class="form-group">
                        <label for="revue">Bilan :</label>
                        <textarea class="form-control" id="revue" name="revue" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <small><b>Vous renseignerez les éventuelles offres d'échantillons sur la page suivante.</b></small>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mb-5">Valider l'ajout</button>
                </form>

            </div>
        </div>

    </div>
@endsection