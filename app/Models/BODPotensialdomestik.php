<?php

namespace App\Models;

use CodeIgniter\Model;

class BODPotensialdomestik extends Model
{
    protected $table = 'potensial';
    protected $primaryKey = 'id_potensial';
    protected $allowedFields = [
        'Tahun_domestik',
        'Nilai_domesitk',
    ];
    protected $useTimestamps = false;
}
