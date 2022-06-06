<?php

namespace App\Models;

use CodeIgniter\Model;

class IndexPencemaranModel extends Model
{
    protected $table = 'ipa';
    protected $primaryKey = 'id_ipa';
    protected $allowedFields = [
        'Nama_sungai',
        'Titik_pantau',
        'Periode',
        'Nilai_pij',
    ];
    protected $useTimestamps = false;
}
