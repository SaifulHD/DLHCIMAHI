<?php

namespace App\Models;

use CodeIgniter\Model;

class Indekskualitas extends Model
{
    // protected $allowedFields = ['Param_1', 'Param_2', 'Param_3', 'Param_4', 'Param_5', 'Param_6', 'Param_7', 'status_mutu', 'Nilai_pij'];

    protected $table = 'titikpantau';
    protected $primaryKey = 'id_tikpan';
    protected $allowedFields =['Param_1','Param_2','Param_3','Param_4','Param_5','Param_6','Param_7','status_mutu','Nilai_pij','periode_pantau','tanggal_pantau','id_sungai','Nama_sungai'];
    protected $useTimeStamps =TRUE;


    public function delete_tss($id)
    {
        $data = $this->where([
            'id_tikpan' => $id
        ])->first();
        return $data;
    }

    public function searchBy($by, $content)
    {
        $data = $this->where([
            $by => $content
        ])->first();
        return $data;
    }

    
    public function tss($id)
    {
        $data = $this->where([
            'id_tikpan' => $id
        ])->first();
        return $data;
    }

    public function datatss()
    {
        $query = $this->db->table('titikpantau')
            ->select('*')
            ->get();
        return $query->getResultArray();
        
    }

    public function tss_post($data)
    {
        return $this->db->table('titikpantau')->insert($data);
    }

    

    public function getta9()
    {
        $builder = $this->db->table('titikpantau');
        $builder->select('*');
        return $builder->get();
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_tikpan" => $id])->row();
    }



    public function getPantau($id)
    {
        return $this->where(['id_tikpan' => $id])->first();
    }
}
