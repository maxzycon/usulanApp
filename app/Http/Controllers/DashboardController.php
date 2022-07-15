<?php

namespace App\Http\Controllers;

use App\Models\Pengusulan;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

class DashboardController extends Controller
{
    public function index(Request $request)
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
        $instansi = Pengusulan::select("instansi_nama")->groupBy("instansi_nama")->get();

        $totalJabatan = $rows->groupBy("jenis_layanan_nama")["jabatan"]->count();
        $totalPensiun = $rows->groupBy("jenis_layanan_nama")["pensiun"]->count();
        $totalPendidikan = $rows->groupBy("jenis_layanan_nama")["pendidikan"]->count();
        $totalCuti = $rows->groupBy("jenis_layanan_nama")["cuti"]->count();

        $totalChart1 = $totalDitolak + $totalDiproses + $totalDisetujui;
        $totalChart2 = $totalDisetujui + $totalPengusulan+$totalDitolak+$totalDiproses+$totalBelumDiproses;
        $totalChart4 = $totalJabatan + $totalPensiun + $totalPendidikan + $totalCuti;

        $chart = Chartisan::build()
        ->labels(['Ditolak', 'Diproses', 'Selesai'])
        ->advancedDataset('Data', [$this->toPercent($totalChart1,$totalDitolak), $this->toPercent($totalChart1,$totalDiproses), $this->toPercent($totalChart1,$totalDisetujui)],["percent" => "%"])->toJSON();

        $chart2 = Chartisan::build()
        ->labels(['Completed', 'Incomplete'])
        ->advancedDataset('Data', [$this->toPercent($totalChart2,$totalDisetujui),$this->toPercent($totalChart2,$totalPengusulan+$totalDitolak+$totalDiproses+$totalBelumDiproses)],["percent" => "%"])->toJSON();


        $chart3 = Chartisan::build()
            ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
            ->dataset('Pengajuan', $this->getDataMonth(["Terima Usulan","Tolak Usulan","Berkas Disetujui","Tidak Memenuhi Syarat"]))
            ->dataset('Diproses', $this->getDataMonth(["Berkas Disetujui","Tidak Memenuhi Syarat"]))
            ->dataset('Pengajuan disetujui', $this->getDataMonth(["Berkas Disetujui"]))
            ->dataset('Berkas ditolak', $this->getDataMonth(["Tidak Memenuhi Syarat"]))
            ->toJSON();

        $chart4 = Chartisan::build()
        ->labels(['Jabatan', 'Pensiun', 'Pendidikan', 'Cuti'])
        ->advancedDataset('Data', [$this->toPercent($totalChart4, $totalJabatan), $this->toPercent($totalChart4, $totalPensiun), $this->toPercent($totalChart4, $totalPendidikan), $this->toPercent($totalChart4, $totalCuti)],["percent" => "%"])->toJSON();

        // chart 1 => ditolak, disetujui , diproses
        // chart 2 => disetujui, sisanya
        // chart 3 => chart by time
        // chart 4 => chart berdasarkan jenis_layanan_nama

        return view('dashboard', compact("instansi","totalPengusulan","totalDisetujui","totalDitolak","totalDiproses","totalBelumDiproses","chart","chart2","chart3", "chart4"));
    }

    private function toPercent(int $total, int $number): int
    {
        return round(($number/$total)*100);
    }

    private function getDataMonth(array $condition, string $year = null): array
    {
        $array = collect([]);
        for ($i =1; $i <= 12; $i++){
            $query = Pengusulan::select(
                DB::raw("IFNULL(count(id),0) as data")
            )
                ->whereYear("tgl_usulan", $year ?? date("Y"))
                ->whereMonth("tgl_usulan", $i)
                ->whereIn("status_usulan",$condition)
                ->orderBy('tgl_usulan')
                ->groupBy(DB::raw("YEAR(tgl_usulan)"),DB::raw("MONTH(tgl_usulan)"))
                ->first();
            $array->push($query ? $query->data : 0);
        }
        return $array->all();
    }
}
