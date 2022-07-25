<?php

namespace App\Http\Controllers;

use App\Models\Pengusulan;
use App\Models\User;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $rows = Pengusulan::query();
        $rowDisetujui = Pengusulan::query();
        $rowDiproses = Pengusulan::query();
        $rowDitolak = Pengusulan::query();
        $rowBelumDiproses = Pengusulan::query();

        if (auth()->user()->level === 1){
            $rows->when($request->get("instansi") !== "semua" && $request->get("instansi") !== NULL, function($q) use ($request){
                return $q->where("instansi_nama","LIKE","%{$request->get('instansi')}%");
            });

            $rows->when($request->get("kanreg") !== "semua" && $request->get("kanreg") !== NULL, function($q) use ($request){
                return $q->where("satker_approval",$request->get("kanreg"));
            });

            $rowDisetujui->when($request->get("instansi") !== "semua" && $request->get("instansi") !== NULL, function($q) use ($request){
                return $q->where("instansi_nama","LIKE","%{$request->get('instansi')}%");
            });

            $rowDisetujui->when($request->get("kanreg") !== "semua" && $request->get("kanreg") !== NULL, function($q) use ($request){
                return $q->where("satker_approval",$request->get("kanreg"));
            });

            $rowDitolak->when($request->get("instansi") !== "semua" && $request->get("instansi") !== NULL, function($q) use ($request){
                return $q->where("instansi_nama","LIKE","%{$request->get('instansi')}%");
            });

            $rowDitolak->when($request->get("kanreg") !== "semua" && $request->get("kanreg") !== NULL, function($q) use ($request){
                return $q->where("satker_approval",$request->get("kanreg"));
            });


            $rowDiproses->when($request->get("instansi") !== "semua" && $request->get("instansi") !== NULL, function($q) use ($request){
                return $q->where("instansi_nama","LIKE","%{$request->get('instansi')}%");
            });

            $rowDiproses->when($request->get("kanreg") !== "semua" && $request->get("kanreg") !== NULL, function($q) use ($request){
                return $q->where("satker_approval",$request->get("kanreg"));
            });

            $rowBelumDiproses->when($request->get("instansi") !== "semua" && $request->get("instansi") !== NULL, function($q) use ($request){
                return $q->where("instansi_nama","LIKE","%{$request->get('instansi')}%");
            });

            $rowBelumDiproses->when($request->get("kanreg") !== "semua" && $request->get("kanreg") !== NULL, function($q) use ($request){
                return $q->where("satker_approval",$request->get("kanreg"));
            });
        }

        if (auth()->user()->level === 2){
            $rows->where("satker_approval",auth()->user()->id);
            $rowDisetujui->where("satker_approval",auth()->user()->id);
            $rowDitolak->where("satker_approval",auth()->user()->id);
            $rowDiproses->where("satker_approval",auth()->user()->id);
            $rowBelumDiproses->where("satker_approval",auth()->user()->id);
        }

        $totalPengusulan = $rows->total()->count();
        $totalDisetujui = $rowDisetujui->disetujui()->count();
        $totalDitolak = $rowDitolak->ditolak()->count();
        $totalDiproses = $rowDiproses->diproses()->count();
        $totalBelumDiproses = $rowBelumDiproses->belumDiproses()->count();

        $instansi = Pengusulan::select("instansi_nama")->groupBy("instansi_nama")->get();

        $totalGolongan = Pengusulan::where("jenis_layanan_nama","Golongan")->count();
        $totalPensiun = Pengusulan::where("jenis_layanan_nama","Pensiun")->count();
        $totalPendidikan = Pengusulan::where("jenis_layanan_nama","Pendidikan")->count();
        $totalCuti = Pengusulan::where("jenis_layanan_nama","Cuti")->count();

        $totalChart1 = $totalDitolak + $totalDiproses + $totalDisetujui;
        $totalChart2 = $totalDisetujui + $totalPengusulan + $totalDitolak + $totalDiproses + $totalBelumDiproses;
        $totalChart4 = $totalGolongan + $totalPensiun + $totalPendidikan + $totalCuti;

        $chart = [];
        $chart['label'] = ['Ditolak', 'Diproses', 'Selesai'];
        $chart['data'] = [$this->toPercent($totalChart1,$totalDitolak), $this->toPercent($totalChart1,$totalDiproses), $this->toPercent($totalChart1,$totalDisetujui)];
        $chart = json_encode($chart);

        $chart2 = [];
        $chart2['label'] = ['Completed', 'Incomplete'];
        $chart2['data'] = [$this->toPercent($totalChart2,$totalDisetujui),$this->toPercent($totalChart2,$totalPengusulan+$totalDitolak+$totalDiproses+$totalBelumDiproses)];
        $chart2 = json_encode($chart2);

        $chart3 = Chartisan::build()
            ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
            ->dataset('Pengajuan', $this->getDataMonth(["12","13","16"], null, $request->get("instansi"), $request->get("kanreg")))
            ->dataset('Diproses', $this->getDataMonth(["13","16"], null, $request->get("instansi"), $request->get("kanreg")))
            ->dataset('Pengajuan disetujui', $this->getDataMonth(["16"], null, $request->get("instansi"), $request->get("kanreg")))
            ->dataset('Berkas ditolak', $this->getDataMonth(["13"], null, $request->get("instansi"), $request->get("kanreg")))
            ->toJSON();

        $chart4 = [];
        $chart4['label'] = ['Jabatan', 'Pensiun', 'Pendidikan', 'Cuti'];
        $chart4['data'] = [$this->toPercent($totalChart4, $totalGolongan), $this->toPercent($totalChart4, $totalPensiun), $this->toPercent($totalChart4, $totalPendidikan), $this->toPercent($totalChart4, $totalCuti)];
        $chart4 = json_encode($chart4);


        $kanreg = User::where("level",2)->orderBy("name","asc")->get();

        return view('dashboard', compact(
              "instansi",
            "totalPengusulan",
                        "totalDisetujui",
                        "totalDitolak",
                        "totalDiproses",
                        "totalBelumDiproses",
                        "kanreg",
                        "chart",
                        "chart2",
                        "chart3",
                        "chart4",
            )
        );
    }

    private function toPercent(int $total, int $number): int
    {
        return round(($number/$total)*100);
    }

    private function getDataMonth(array $condition, string $year = null, string $instansi = null, string $kanreg = null)
    {

        $query = Pengusulan::select(
            DB::raw("coalesce(count(id),0) as data, date_part('year', TO_DATE(tgl_usulan, 'YYYY-MM-DD')) tahun_usulan, date_part('month', TO_DATE(tgl_usulan, 'YYYY-MM-DD')) bulan_usulan")
        );

        if ($instansi !== "semua" && $instansi !== NULL){
            $query->where("instansi_nama", $instansi);
        }

        if ($kanreg !== "semua" && $kanreg !== NULL){
            $query->where("satker_approval", $kanreg);
        }

        if ($year !== null){
            $query->whereYear("tgl_usulan",$year);
        }

        $query->whereIn("status_usulan", $condition);
        $query->orderByRaw("tahun_usulan ASC, bulan_usulan ASC");
        $query->groupBy(DB::raw("date_part('year', TO_DATE(tgl_usulan, 'YYYY-MM-DD'))"),DB::raw("date_part('month', TO_DATE(tgl_usulan, 'YYYY-MM-DD'))"));
        return  $query->pluck("data")->toArray();
    }
}
