<?php

namespace App\Exports;

use App\Models\Anava;

use Maatwebsite\Excel\Concerns\FromCollection;

class anavaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Anava::all('x1', 'x2', 'x3');
    }
}
