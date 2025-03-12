<?php

namespace App\Imports;

use App\Models\Certificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificatesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Certificate([
            'certificate_id' => $row['certificate_code'],
            'certificate_img' => $row['certificate_image'], // You may need to handle file uploads separately
            'trainer_full_name' => $row['trainer_full_name'],
            'trainer_img' => $row['trainer_image'],
            'valid_from' => $row['valid_from'],
            'valid_to' => $row['valid_to'],
        ]);
    }

}
