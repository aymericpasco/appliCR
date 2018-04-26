@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="d-flex justify-content-center">
                    <h4>Rapport de visite du {!! \Carbon\Carbon::parse($report->report_date)->format('d/m/Y') !!}</h4>
                </div>
                <div class="d-flex justify-content-center">
                    <h5>Praticien : {!! $report->doctor->firstname !!} {!! $report->doctor->lastname !!}</h5>
                </div>
                <hr />

                <form method="POST" action="{{ action('Visitor\VisitReportController@update' , ['reportId' => $report->id]) }}"
                      class="text-center">
                    @csrf
                    <div class="form-group">
                        <label for="reason">Motif de la visite</label>
                        <input type="text" class="form-control" id="reason" value="{!! $report->reason !!}"
                               name="reason" required>
                    </div>
                    <div class="form-group">
                        <label for="revue">Bilan de la visite</label>
                        <textarea class="form-control" id="revue" name="revue" rows="4" required>{!! $report->revue !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Valider les modifications</button>
                </form>

                <hr />

                <div class="text-center">
                    <h6>Offre d'échantillons</h6>
                </div>

                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">Nom de l'échantillon</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($report->samples as $sample)
                    <tr>
                        <td>{!! $sample->medicine->naming !!}</td>
                        <td>{!! $sample->quantity !!}</td>
                        <td><small>
                            <a href="{{ route('visiteur.echantillon.retirer',
                            ['reportId' => $report->id, 'sampleId' => $sample->id]) }}">
                                Retirer
                            </a></small>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                <form class="form-inline mb-5" method="POST"
                      action="{{ action('Visitor\SampleController@store', ['reportId' => $report->id]) }}">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <select class="form-control" id="medicine" name="medicine" required>
                                @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->id }}">
                                        {{ $medicine->naming }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <input type="number" step="1" min="1" class="form-control" id="quantity" name="quantity"
                                   placeholder="Quantité" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-primary">Ajouter</button>
                        </div>
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>
@endsection