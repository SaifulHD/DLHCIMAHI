<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\IkaModel;
use App\Models\IpaModel;
use App\Models\GrafikModel;
use \App\Models\ThreadModel;
use \App\Models\SungaiModel;
use App\Models\BODPotensial;
use App\Models\BodEksisting;
use App\Models\TssAktualGrafikModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Import extends BaseController
{

    public function __construct()
    {
   
        $this->spreadsheet = new Spreadsheet();
		$this->writer = new Xlsx($this->spreadsheet);
		$this->reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$this->reader->setReadDataOnly(true);
		$this->validation = \Config\Services::validation();

    }

    public function index()
    {
        return view('formimport');

    }

    public function upload(){
        $validation = \Config\Services::validation();
        

        $valid = $this->validate(
            [
                'fileimport' => [
                    'label' =>'Inputan File',
                    'rules' =>'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
                    'errors' => [
                        'uploaded' =>'{field} wajib diisi',
                        'ext_in' =>'{field} harus ekstensi xls & xlsx'
                    ]
                ]
            ]
        );
        if(!$valid){
           
            $this->session->setFlashdata('pesan', $validation->getError('fileimport'));

           

            return redirect()->to('/Import/index');
        } else {
            $file_excel = $this->request->getFile('fileimport');

            $ext = $file_excel->getClientExtension();

            if($ext == 'xls'){
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $render->load($file_excel);

            $data = $spreadsheet->getActiveSheet()->toArray();

            $pesan_error = [];
            $jumlaherror = 0;
            $jumlahsukses = 0;

            foreach($data as $x => $row){
                if($x == 0){
                    continue;
                }

                $noid = $row [1];
                $namasungai = $row [2];
                $periode_pantau = $row [3];
                $tanggal_pantau = $row [4];
                $param_1 = $row [5];
                $param_2 = $row [6];
                $param_3 = $row [7];
                $param_4 = $row [8];
                $param_5 = $row [9];
                $param_6 = $row [10];
                $param_7 = $row [11];

                $bktss = 50;
                $bkdo = 4;
                $bkbod = 3;
                $bkcod = 25;
                $bkfosfat = 0.2;
                $bkfecal = 1000;
                $bkcoliform = 5000;

                $nilai1 = $param_1 / $bktss;
                $nilai2 = ((7-$param_2) / (7-$bkdo))/$bkdo;
                $nilai3 = $param_3 / $bkbod;
                $nilai4 = $param_4 / $bkcod;
                $nilai5 = $param_5 / $bkfosfat;
                $nilai6 = $param_6 / $bkfecal;
                $nilai7 = $param_7 / $bkcoliform;

                $nl1 = $nilai1 ; 
                $nl2 = $nilai2 ; 
                $nl3 = 1 + (5 * (log10($param_3/$bkbod)));
                $nl4 = $nilai4 ; 
                $nl5 = $nilai5 ;
                $nl6 = 1 + (5 * (log10($param_6/$bkfecal)));
                $nl7 = $nilai7 ;


                $nilairata = ($nl1+$nl2+$nl3+$nl4+$nl5+$nl6+$nl7)/7 ;
                $nilaimax = max($nl1,$nl2,$nl3,$nl4,$nl5,$nl6,$nl7);
                $nilairata2 = pow($nilairata,2);
                $nilaimax2 = pow($nilaimax,2);


                $nilaipij = sqrt(($nilairata2 + $nilaimax2) / 2);

                $statusmutu;

                
                if ($nilaipij <= 1) {
                    $statusmutu = "Baik";
                } else if ($nilaipij <= 5) {
                    $statusmutu = "Tercemar Ringan";
                } else if ($nilaipij <= 10) {
                    $statusmutu = "Tercemar Sedang";
                } else if ($nilaipij > 10) {
                    $statusmutu = "Tercemar Berat";
                }


                
                
                $db = \Config\Database::connect();
                $ceknoid = $db->table('titikpantau')->getWhere(['id_tikpan'=> $noid])->getResult();
                
                if(count($ceknoid) > 0){
                    $jumlaherror++;
                } else {

                    $datasimpan = [
                        'id_tikpan' => $noid , 
                        'Nama_sungai' => $namasungai , 
                        'periode_pantau' => $periode_pantau , 
                        'status_mutu' => $statusmutu , 
                        'Param_1' => $param_1 , 
                        'Param_2' => $param_2, 
                        'Param_3' => $param_3 , 
                        'Param_4' => $param_4 , 
                        'Param_5' => $param_5, 
                        'Param_6' => $param_6, 
                        'Param_7' => $param_7, 
                        'Nilai_pij' => $nilaipij , 
                        'tanggal_pantau' => $tanggal_pantau , 

                        
                    ];
                    $db->table('titikpantau')->insert($datasimpan);
                    $jumlahsukses++;

                }

            }

            $this->session->setFlashdata('sukses', "$jumlaherror Data tidak bisa disimpan <br> $jumlahsukses bisa disimpan");

           

            return redirect()->to('/Import/index');



            // foreach($pesan_error as $error){
            //     echo $error;
            // }

        }


    }



}
