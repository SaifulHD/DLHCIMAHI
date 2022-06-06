<?php

namespace App\Models;

use CodeIgniter\Model;

class IndexkualitasairModel extends Model
{
    protected $table = 'index_kualitas_air';
    protected $primaryKey = 'id_ika';
    protected $allowedFields = [
        'jumlah_ika',
        'nilai_ika',
        'tahun_ika',
    ];
    protected $useTimestamps = false;
}
