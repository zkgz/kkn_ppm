<?php

namespace App\Imports;

use App\Taxpayer;
use Maatwebsite\Excel\Concerns\ToModel;

class TaxpayersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Taxpayer([
            'name'                       => $row[0],
            'type'                       => $row[1],
            'address'                    => $row[2],
            'region'                     => $row[3],
            'lat'                        => $row[4],
            'long'                       => $row[5],
            'pajak_per_bulan'            => $row[6],
            'potensi_pajak_per_bulan'    => $row[7],
            'information'                => $row[8],
            'photo'                      => null
        ]);
        
    }
}
