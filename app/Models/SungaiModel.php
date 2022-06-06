<?php

namespace App\Models;

use CodeIgniter\Model;

class SungaiModel extends Model
{
    protected $table = 'sungai';
    protected $primaryKey = 'Id_sungai';
    protected $allowedFields = [
        'Nama_sungai',
    ];
    protected $useTimestamps = false;
}
