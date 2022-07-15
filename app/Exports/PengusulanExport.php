<?php

namespace App\Exports;

use App\Models\Pengusulan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengusulanExport implements FromView
{
    private $type1, $search1;

    public function __construct($type, $search){
        $this->type1 = $type;
        $this->search1 = $search;
    }

    public function view(): View
    {
        $data = Pengusulan::query();

        $data->when($this->type1 !== "semua", function ($q){
            if ($this->type1 === "lembaga"){
                return $q->where("instansi_nama", $this->search1);
            }else{
                return $q->where("user_id", $this->search1);
            }
        });

        return view('exports.pengusulan', [
            'pengusulans' => $data->get()
        ]);
    }
}
