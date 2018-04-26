<?php

namespace App\Http\Controllers\Visitor;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{

    public function index($param = null)
    {
        $doctors = Doctor::all();

        $letters = Doctor::select(DB::raw('lower(substr(lastname, 1, 1)) as letter'))->distinct()->get();
        $departments = Doctor::select('department')->distinct()->get();

        if ($param) {
            $doctors = Doctor::where(DB::raw('lower(substr(lastname, 1, 1))'), '=', $param)->get();

            if ($doctors->isEmpty()) {
                $doctors = Doctor::where('department', intval($param))->get();
            }
        }

        return view('visitor.doctor.index', compact('doctors', 'letters', 'departments'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
