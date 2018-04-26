<?php

namespace App\Http\Controllers\Visitor;

use App\Doctor;
use App\Http\Requests\StoreVisitReport;
use App\Http\Requests\UpdateVisitReport;
use App\Medicine;
use App\VisitReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitReportController extends Controller
{

    public function index($year = null, $month = null)
    {
        $visitorReports = VisitReport::where(['visitor_id' => Auth::id()])->get();

        $uniqueDates = VisitReport::where(['visitor_id' => Auth::id()])
            ->select(DB::raw('YEAR(report_date) as year'), DB::raw('MONTH(report_date) as month'))
            ->distinct()->get();

        if ($year) {
            $visitorReports = VisitReport::whereYear('report_date', '=', $year)
                ->where('visitor_id', Auth::id())->get();

            if ($month) {
                $visitorReports = VisitReport::whereYear('report_date', '=', $year)
                    ->whereMonth('report_date', '=', $month)
                    ->where('visitor_id', Auth::id())->get();
            }
        }

        return view('visitor.visit_report.index', compact('visitorReports', 'uniqueDates'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('visitor.visit_report.create', compact('doctors'));
    }


    public function store(StoreVisitReport $request)
    {
        $visitReport = new VisitReport(array(
            'report_date' => Carbon::parse($request->get('report_date')),
            'reason' => $request->get('reason'),
            'revue' => $request->get('revue'),
        ));

        $visitReport->doctor()->associate($request->get('doctor'));
        $visitReport->visitor()->associate(Auth::id());
        $visitReport->save();

        return redirect()->route('visiteur.rapport.afficher', ['reportId' => $visitReport->id]);
    }


    public function show($reportId)
    {
        $report = VisitReport::whereId($reportId)->where('visitor_id', Auth::id())->firstOrFail();
        $medicines = Medicine::all();
        return view('visitor.visit_report.show', compact('report', 'medicines'));
    }


    public function update(UpdateVisitReport $request, $reportId)
    {
        $report = VisitReport::whereId($reportId)->where('visitor_id', Auth::id())->firstOrFail();
        $report->update([
            'reason' => $request->get('reason'),
            'revue' => $request->get('revue'),
        ]);

        $report->save();

        return redirect()->route('visiteur.rapport.afficher', ['reportId' => $report->id]);
    }

}
