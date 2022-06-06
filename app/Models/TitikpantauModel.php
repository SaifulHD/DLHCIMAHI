<?php

namespace App\Models;

use CodeIgniter\Model;

class TitikpantauModel extends Model
{
    protected $table = 'titik_pantau';
    protected $primaryKey = 'Id_titikpantau';
    protected $allowedFields = ['Titik_pantau'];
    protected $useTimeStamps = TRUE;
}
