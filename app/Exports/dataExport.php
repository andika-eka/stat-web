<?php

namespace App\Exports;

use App\Models\Data;

use Maatwebsite\Excel\Concerns\FromCollection;

class dataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data::all('id','nilai_1');
    }
}