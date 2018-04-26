<?php

namespace App\Http\Controllers\Visitor;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{

    public function index($letter = null)
    {
        $visitors = User::all();

        if ($letter) {
            $visitors = User::where(DB::raw('lower(substr(lastname, 1, 1))'), '=', $letter)->get();
        }

        $letters = User::select(DB::raw('lower(substr(lastname, 1, 1)) as letter'))->distinct()->get();

        return view('visitor.visitor.index', compact('visitors', 'letters'));
    }

}
