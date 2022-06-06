<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusmutuairModel extends Model
{
    protected $table = 'status_mutu_air';
    protected $primaryKey = 'id_mutuair';
    protected $allowedFields = [
        'katagori',
        'jumlah',
        'kode_warna',
    ];
    protected $useTimestamps = false;
}
