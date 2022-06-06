<?php

namespace App\Controllers;

use App\Models\Titikpantau;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mutuair extends BaseController
{
    protected $Titikpantau;



    public function __construct()
    {
        $this->Titikpantau = new Titikpantau();

        session();

        session();
        helper('filesystem');
    }

    public function index()
    {
        $model = new Titikpantau();
        $db = \Config\Database::connect();
        $jumlahtikpan = $model->countAllResults();
        $trcringan = $db->query('SELECT (SUM(IF(status_mutu = "Tercemar Ringan", 1, 0)) / COUNT(*) * 100) AS hasil FROM titikpantau')->getResultArray()[0]['hasil'];
        $trcsedang = $db->query('SELECT (SUM(IF(status_mutu = "Tercemar Sedang", 1, 0)) / COUNT(*) * 100) AS hasil FROM titikpantau')->getResultArray()[0]['hasil'];
        $trcberat = $db->query('SELECT (SUM(IF(status_mutu = "Tercemar Berat", 1, 0)) / COUNT(*) * 100) AS hasil FROM titikpantau')->getResultArray()[0]['hasil'];




        $data = [
            'Pantau' => $model->paginate(100, 'Pantau'),
            'jumlahtikpan' => $jumlahtikpan,
            'trcringan' => $trcringan,
            'trcsedang' => $trcsedang,
            'trcberat' => $trcberat,
        ];


        // dd($data);
        return view('main/Statusair', $data);
    }


    public function tercemar()
    {
        $model = new Titikpantau();
        $db = \Config\Database::connect();
        $jumlahtikpan = $model->countAllResults();
        $trcringan = $db->query('SELECT (SUM(IF(status_mutu = "Tercemar Ringan", 1, 0)) / COUNT(*) * 100) AS hasil FROM titikpantau')->getResultArray()[0]['hasil'];
        $trcsedang = $db->query('SELECT (SUM(IF(status_mutu = "Tercemar Sedang", 1, 0)) / COUNT(*) * 100) AS hasil FROM titikpantau')->getResultArray()[0]['hasil'];
        $trcberat = $db->query('SELECT (SUM(IF(status_mutu = "Tercemar Berat", 1, 0)) / COUNT(*) * 100) AS hasil FROM titikpantau')->getResultArray()[0]['hasil'];


        $trckoefringan = (floatval($trcringan) * 50) / 100;
        $trckoefsedang = (floatval($trcsedang) * 30) / 100;
        $trckoefberat = (floatval($trcberat) * 10) / 100;

        $trcindexair = $trckoefringan + $trckoefsedang + $trckoefberat;

        $data = [
            'Pantau' => $model->paginate(100, 'Pantau'),
            'jumlahtikpan' => $jumlahtikpan,
            'trcringan' => $trcringan,
            'trcsedang' => $trcsedang,
            'trcberat' => $trcberat,
            'trcindexair' => $trcindexair,
        ];




        // dd($data);
        return view('main/indeksair', $data);
    }



    public function hapusPantau($id)
    {
        $model = new Titikpantau();
        $session = session();
        $model->delete($id);
        $session->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/Mutuair/index');
    }

    public function update($id)
    {

        $this->Titikpantau->save([
            'id_tikpan' => $id,
            'Param_1' => $this->request->getVar('coltss'),
            'Param_2' => $this->request->getVar('colbod'),
            'Param_3' => $this->request->getVar('colcod'),
            'Param_4' => $this->request->getVar('colfosfat'),
            'Param_5' => $this->request->getVar('colcoliform'),
            'Param_6' => $this->request->getVar('colferal'),
            'Param_7' => $this->request->getVar('coldo'),
            'nama_titikPantau' => $this->request->getVar('collist'),
            'periode_pantau' => $this->request->getVar('periode'),
            'tanggal_pantau' => $this->request->getVar('inputtanggal'),
            'status_mutu' => $this->request->getVar('colstatus'),
            'Nilai_pij' => $this->request->getVar('colpij'),

        ]);

        return redirect()->to('/Mutuair/index');
    }


    public function tampilEdit($id)
    {
        $Pantau = new Titikpantau();

        $data = [
            'Pantau' => $Pantau->getPantau($id),
        ];

        $jumlahtikpan = $Pantau->countAllResults();
        return view('main/update', $data);
    }

    public function tampilupdate($id)
    {
        $Pantau = new Titikpantau;

        $data = [
            'Pantau' => $Pantau->getPantau($id),
        ];

        return view('main/updateform', $data);
    }






    public function delete_tss()
    {
        $data = $this->request->getvar('id_tikpan');
        $this->Titikpantau->delete_tss($data);
        session()->setFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/mutuair');
    }
    public function delete_tss1($id)
    {
        $tss = $this->Titikpantau->searchBy('id_tikpan', $id);
        $this->Titikpantau->delete($tss);
        session()->setFlashdata('success', 'Data berhasil dihapus', $tss);
        return redirect()->to('/mutuair');
    }

    // public function delete_bod()
    // {
    //     $data = $this->request->getvar('ID_BOD_Eksisting');
    //     //dd($data);
    //     $this->BodEksistingModel->delete($data);
    //     session()->setFlashdata('success', 'Data berhasil dihapus');
    //     return redirect()->to('/BODEksisting/listbod');
    // }

    // public function delete_tss($id)
    // {
    //     $data = $this->where([
    //         'id_tikpan' => $id
    //     ])->first();
    //     return $data;
    // }

    public function delete()
    {
        $this->Titikpantau->delete($id_tikpan);
        return redirect()->to('/main/Statusair');
    }



    public function delete_bod()
    {

        //dd($data);
        $this->BodEksistingModel->delete($data);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/BODEksisting/listbod');
    }



    public function save()
    {
        $this->Titikpantau->save([
            'Param_1' => $this->request->getVar('coltss'),
            'Param_2' => $this->request->getVar('colbod'),
            'Param_3' => $this->request->getVar('colcod'),
            'Param_4' => $this->request->getVar('colfosfat'),
            'Param_5' => $this->request->getVar('colcoliform'),
            'Param_6' => $this->request->getVar('colferal'),
            'Param_7' => $this->request->getVar('coldo'),
            'nama_titikPantau' => $this->request->getVar('collist'),
            'periode_pantau' => $this->request->getVar('periode'),
            'tanggal_pantau' => $this->request->getVar('inputtanggal'),
            'status_mutu' => $this->request->getVar('colstatus'),
            'Nilai_pij' => $this->request->getVar('colpij'),

        ]);

        return redirect()->to('/statusair');
    }





    // function Datatabel()
    // {
    //     $model = new Titikpantau();
    //     $data = [
    //         'Pantau' => $model->paginate(100, 'Pantau'),
    //     ];
    //     echo view('main/Statusair', $data);
    // }
}
