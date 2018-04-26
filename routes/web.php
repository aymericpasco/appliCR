<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/accueil', 'HomeController@index')->name('home');


Route::middleware(['auth'])->prefix('visiteur')->namespace('Visitor')->name('visiteur.')->group(function () {

    /**
     * Routes for visit report : CRU
     */
    Route::get('rapports', 'VisitReportController@index')->name('rapports');
    Route::get('rapports/{year?}', 'VisitReportController@index')->name('rapports.annee');
    Route::get('rapports/{year?}/{month?}', 'VisitReportController@index')->name('rapports.mois');

    Route::get('rapport/{reportId}', 'VisitReportController@show')->name('rapport.afficher');
    Route::post('rapport/{reportId}', 'SampleController@store');

    Route::get('rapport/ajouter', 'VisitReportController@create')->name('rapport.ajouter');
    Route::post('rapport/ajouter', 'VisitReportController@store');

    Route::post('rapport/{reportId}/editer', 'VisitReportController@update');

    Route::get('rapport/{reportId}/echantillon/{sampleId}/retirer', 'SampleController@destroy')
        ->name('echantillon.retirer');

    /**
     * Routes for visitors/doctors : R
     */
    Route::get('visiteurs', 'VisitorController@index')->name('visiteurs');
    Route::get('visiteurs/{letter?}', 'VisitorController@index')->name('visiteurs.lettre');

    Route::get('medecins', 'DoctorController@index')->name('medecins');
    Route::get('medecins/nom/{letter?}', 'DoctorController@index')->name('medecins.lettre');
    Route::get('medecins/departement/{department?}', 'DoctorController@index')->name('medecins.departement');

});

// Route::get('/visiteur/rapport/{reportId}/echantillons', 'Visitor\SampleController@')