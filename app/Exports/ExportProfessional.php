<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Professional;

class ExportProfessional implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Professional::select('name','email','mobile','password','address','skill','status')->get();
    }
}
