<?php

namespace App\Exports;

use App\Models\Pengusulan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengusulanSExport implements FromView
{
    public function view(): View
    {
        return view('exports.pengusulanexport', [
            'pengusulan' => Pengusulan::all()
        ]);
    }
}
