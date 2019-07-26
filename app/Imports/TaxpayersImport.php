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
            'type'                       => 'Property',
            'region'                     => $row[2],
            'address'                    => $row[1],
            'lat'                        => $row[3],
            'long'                       => $row[4],
            'pajak_per_bulan'            => $row[5],
            'potensi_pajak_per_bulan'    => $row[6],
            'information'                => $row[7],
            'photo'                      => null
        ]);
        
    }
}
