<?php

namespace App\Exports;

use App\InportExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoverageAreaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InportExport::all();
    }
}
