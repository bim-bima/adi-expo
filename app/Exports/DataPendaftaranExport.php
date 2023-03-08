<?php

namespace App\Exports;

use App\Models\DataPendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataPendaftaranExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataPendaftaran::all();
    }
}
