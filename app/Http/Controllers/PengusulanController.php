<?php

namespace App\Http\Controllers;

use App\Exports\PengusulanExport;
use App\Models\Pengusulan;
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
        $instansi = Pengusulan::select("instansi_nama")->groupBy("instansi_nama")->pluck("instansi_nama");
        $nama = Pengusulan::select("nama_validator")->where("nama_validator","!=","")->groupBy("nama_validator")->pluck("nama_validator");
        return view("pengusulan", compact("instansi","nama"));
    }

    public function export(Request $request)
    {
        $date = date("ymdhis");
        return Excel::download(new PengusulanExport($request->get("type"), $request->get("type") == "lembaga" ? $request->get("search") : $request->get("search2")), "pengusulanData{$date}.xlsx");
    }
}
