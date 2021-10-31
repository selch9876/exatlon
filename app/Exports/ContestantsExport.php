<?php

namespace App\Exports;

use App\Contestant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ContestantsExport implements FromCollection, WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contestant::all();
    }
}
