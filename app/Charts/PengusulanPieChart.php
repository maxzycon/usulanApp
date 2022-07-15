<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Pengusulan;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class PengusulanPieChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $rows = Pengusulan::query();

        $rows->when($request->get("instansi") !== "semua", function($q) use ($request){
            return $q->where("instansi_nama","LIKE","%{$request->get('instansi')}%");
        });

        $rows = $rows->get();
        $totalPengusulan = $rows->count();
        $totalDisetujui = $rows->where("status_usulan","Berkas Disetujui")->count();
        $totalDitolak = $rows->where("status_usulan","Tidak Memenuhi Syarat")->count();
        $totalDiproses = $rows->whereIn("status_usulan",["Berkas Disetujui","Tidak Memenuhi Syarat"])->count();
        $totalBelumDiproses = $rows->where("status_usulan","Terima Usulan")->count();

        return Chartisan::build()
            ->labels(['Usulan masuk', 'Usulan disetujui', 'Usulan ditolak', 'Usulan sudah diproses', 'Usulan belum diproses'])
            ->dataset('Data', [$totalPengusulan,$totalDisetujui,$totalDitolak,$totalDiproses,$totalBelumDiproses]);
    }
}
