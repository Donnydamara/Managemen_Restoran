<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\DetailPesanan;
//use App\Menu;

class OmsetExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DetailPesanan::all();
    }
}
