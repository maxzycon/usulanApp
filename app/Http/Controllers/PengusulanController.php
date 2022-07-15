<?php

namespace App\Http\Controllers;

use App\Exports\PengusulanExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PengusulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pengusulan");
    }

    public function export(Request $request)
    {
        $date = date("ymdhis");
        return Excel::download(new PengusulanExport($request->get("type"), $request->get("search")), "pengusulanData{$date}.xlsx");
    }
}
