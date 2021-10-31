<?php

namespace App\Imports;

use App\Contestant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ContestantsImport implements ToModel, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contestant([
            'name'          => $row[1],
            'oneononewin'   => $row[2], 
            'oneononelost'  => $row[3],
            'group1win'     => $row[4],
            'group1lost'    => $row[5],
            'group05win'    => $row[6],
            'group05lost'   => $row[7],
            'personalwin'   => $row[8],
            'personallost'  => $row[9],
            'symbolwin'     => $row[10],
            'symbollost'    => $row[11],
            'nationalwin'   => $row[12],
            'nationallost'  => $row[13],
            'played'        => $row[14],
            'win'           => $row[15],
            'lost'          => $row[16],
            'percentage'    => $row[17],
            'country'       => $row[18],
            'season'        => $row[19],
        ]);
    }
}
