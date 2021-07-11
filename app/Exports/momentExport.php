<?php
namespace App\Exports;
use App\Models\Moment;
use Maatwebsite\Excel\Concerns\FromCollection;

class momentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Moment::all('x', 'y');
    }
}
