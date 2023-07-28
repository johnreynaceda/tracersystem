<?php

namespace App\Exports;

use App\Models\AlumniInformation;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AlumniExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.alumni', [
            'datas' => AlumniInformation::all()
        ]);
    }
}