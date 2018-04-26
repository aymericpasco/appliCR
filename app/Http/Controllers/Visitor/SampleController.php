<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Requests\StoreSample;
use App\Sample;
use App\VisitReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SampleController extends Controller
{

    public function store($reportId, StoreSample $request)
    {
        $report = VisitReport::whereId($reportId)->where('visitor_id', Auth::id())->firstOrFail();

        $possibleSample = Sample::where(['medicine_id' => $request->get('medicine'),
                                        'visit_report_id' => $report->id])->first();

        if ($possibleSample) {
            $possibleSample->update(['quantity' => ($possibleSample->quantity += $request->get('quantity'))]);
            $possibleSample->save();
        }  else {
            $sample = new Sample(array(
                'quantity' => $request->get('quantity'),
            ));

            $sample->visit_report()->associate($report);
            $sample->medicine()->associate($request->get('medicine'));

            $sample->save();
        }

        return redirect()->route('visiteur.rapport.afficher', ['reportId' => $report->id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($reportId, $sampleId)
    {
        $report = VisitReport::whereId($reportId)->where('visitor_id', Auth::id())->firstOrFail();
        $sample = Sample::whereId($sampleId)->where('visit_report_id', $report->id)->firstOrFail();

        $sample->visit_report()->dissociate();
        $sample->medicine()->dissociate();

        $sample->delete();

        return redirect()->route('visiteur.rapport.afficher', ['reportId' => $report->id]);
    }
}
