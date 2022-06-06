<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\SungaiModel;
use App\Models\TitikpantauModel;
use App\Models\IndexPencemaranModel;
use App\Models\IndexkualitasairModel;
use App\Models\StatusmutuairModel;
use App\Models\BODPotensialdomestik;

class Home extends BaseController
{


    public function index()
    {
        // user start
        $modelUser = new Users();
        $jumlah_karyawan = $modelUser->countAllResults();
        // user end

        // sungai start
        $modelSungai = new SungaiModel();
        $jumlah_sungai = $modelSungai->countAllResults();
        // sungai end

        // titik pantau start
        $modelTitikpantau = new TitikpantauModel();
        $jumlah_titikpantau = $modelTitikpantau->countAllResults();
        // titik pantau end

        // index pencemaran air start
        $modelIndexPencemaran = new IndexPencemaranModel();
        $jumlah_IndexPencemaran  =  $modelIndexPencemaran->countAllResults();
        // index pencemaran air end

        // index kualitas air start
        $modelIndexkualitasair = new IndexkualitasairModel();
        $nilaiIndexkualitasair = $modelIndexkualitasair->select('COUNT(index_kualitas_air.id_ika) AS nilai_ika, index_kualitas_air.tahun_ika AS tahun_ika ,index_kualitas_air.nilai_ika AS nilai_ika')
            ->groupBy('index_kualitas_air.tahun_ika')
            ->groupBy('index_kualitas_air.nilai_ika')
            ->get();
        // index kualitas air end

        // jumlah index kualitas air start
        $jumlahIKA =  $modelIndexkualitasair->select('COUNT(index_kualitas_air.id_ika) AS jumlah_ika, index_kualitas_air.tahun_ika AS tahun_ika ,index_kualitas_air.jumlah_ika AS jumlah_ika')
            ->groupBy('index_kualitas_air.tahun_ika')
            ->groupBy('index_kualitas_air.jumlah_ika')
            ->get();
        // jumlah index kualitas air end

        // JUMLAH MUTU air start
        $bulan = $this->request->getPost('bulan');
        $modelStatusmutuair = new StatusmutuairModel();
        $jumlahMUTU =  $modelStatusmutuair->select('COUNT(status_mutu_air.id_mutuair) AS jumlah, status_mutu_air.katagori AS katagori ,status_mutu_air.jumlah AS jumlah,status_mutu_air.kode_warna AS kode_warna')
            ->groupBy('status_mutu_air.kode_warna')
            ->groupBy('status_mutu_air.katagori')
            ->groupBy('status_mutu_air.jumlah')
            ->get();
        // JUMLAH MUTU air END 

        // BOD POTENSIAL domestik
        $modelBODPotensial = new BODPotensialdomestik();
        $BodPOTENSIALdomestik =  $modelBODPotensial->select('COUNT(potensial.id_potensial) AS Nilai_domestik, potensial.Tahun_domestik AS Tahun_domestik  ,potensial.Nilai_domestik AS Nilai_domestik')
            ->groupBy('potensial.Tahun_domestik')
            ->groupBy('potensial.Nilai_domestik')
            ->get();

        // END POTENSIAL Domestik



        return view('/pages/dashboard', [
            'jumlah_karyawan' => $jumlah_karyawan,
            'jumlah_sungai' => $jumlah_sungai,
            'jumlah_titikpantau' => $jumlah_titikpantau,
            'jumlah_IndexPencemaran' => $jumlah_IndexPencemaran,
            'nilaiIKA' =>  $nilaiIndexkualitasair,
            'jumlahIKA' => $jumlahIKA,
            'jumlahMUTU' =>  $jumlahMUTU,
            'BodPOTENSIAL' => $BodPOTENSIALdomestik,
        ]);
    }

    // api  index pencemarn
    // api  index pencemarn
    public function IndexPencemaran($var = null)
    {
        $bulan = $this->request->getPost('bulan');

        $db = \Config\Database::connect();

        $query = $db->query("SELECT periode AS tgl,Titik_pantau,Nilai_pij FROM ipa WHERE DATE_FORMAT(periode,'%Y-%m') = '$bulan' ORDER BY periode ASC")->getResult();
        $category = $db->table('ipa')->select('Nama_sungai')->whereNotIn("Nama_sungai", [""])->distinct()->get()->getResult();
        if ($category != null) {
            foreach ($category as $key => $value) {
                $resultCategory[] = [
                    "label" => $value->Nama_sungai,
                ];
            }
        }

        $seriesName = ["Hulu", "Tengah", "Hilir"];
        foreach ($seriesName as $key => $value) {
            $resultDataSet[] = [
                "seriesname" => $value,
                "data" => $this->checkNilaiPij($value, $bulan),
            ];
        }
        $respon = [
            'category' => $resultCategory,
            "dataset" => $resultDataSet,
            "bulan" => $bulan,
        ];
        echo json_encode($respon);
    }
    // use for check location
    public function checkNilaiPij($titik_pantau, $bulan)
    {
        $db = \Config\Database::connect();
        $nilai_pij = $db->table('ipa')->select('Nilai_pij')->where('Titik_pantau', $titik_pantau)->where("SUBSTR(periode,1,7)", $bulan)->get()->getResult();
        $result = [];
        if ($nilai_pij != null) {
            foreach ($nilai_pij as $key => $value) {
                $result[] = [
                    "value" => $value->Nilai_pij,
                ];
            }
        }
        return $result;
    }
    // END IPA PILIH

    // START BOD EKSISTING
    public function bodeksisting($var = null)
    {
        $bulan = $this->request->getPost('bulan');

        $db = \Config\Database::connect();

        $query = $db->query("SELECT waktu_sampling AS tgl,nama_titikPantau,beban_pencemar FROM tbltitikpantau WHERE DATE_FORMAT(waktu_sampling,'%Y-%m') = '$bulan' ORDER BY waktu_sampling ASC")->getResult();
        $category = $db->table('tbltitikpantau')->select('nama_sungai')->whereNotIn("nama_sungai", [""])->distinct()->get()->getResult();
        if ($category != null) {
            foreach ($category as $key => $value) {
                $resultCategory[] = [
                    "label" => $value->nama_sungai,
                ];
            }
        }

        $seriesName = ["Hulu", "Tengah", "Hilir"];
        foreach ($seriesName as $key => $value) {
            $resultDataSet[] = [
                "seriesname" => $value,
                "data" => $this->checkNilaiBodek($value, $bulan),
            ];
        }
        $respon = [
            'category' => $resultCategory,
            "dataset" => $resultDataSet,
            "bulan" => $bulan,
        ];
        echo json_encode($respon);
    }

    public function checkNilaiBodek($titik_pantau, $bulan)
    {
        $db = \Config\Database::connect();
        $Nilai_bodek = $db->table('tbltitikpantau')->select('beban_pencemar')->where('nama_titikPantau', $titik_pantau)->where("SUBSTR(waktu_sampling,1,7)", $bulan)->get()->getResult();
        $result = [];
        if ($Nilai_bodek != null) {
            foreach ($Nilai_bodek as $key => $value) {
                $result[] = [
                    "value" => $value->beban_pencemar,
                ];
            }
        }
        return $result;
    }
    // END EKSISTING


    // START TSS EKSISTING
    public function tsseksisting($var = null)
    {
        $bulan = $this->request->getPost('bulan');
        $db = \Config\Database::connect();
        $query = $db->query("SELECT Periode AS tgl,Titik_pantau,Nilai_tssek FROM eksisting WHERE DATE_FORMAT(Periode,'%Y-%m') = '$bulan' ORDER BY periode ASC")->getResult();
        $category = $db->table('eksisting')->select('Nama_sungai')->whereNotIn("Nama_sungai", [""])->distinct()->get()->getResult();
        if ($category != null) {
            foreach ($category as $key => $value) {
                $resultCategory[] = [
                    "label" => $value->Nama_sungai,
                ];
            }
        }
        $seriesName = ["Hulu", "Tengah", "Hilir"];
        foreach ($seriesName as $key => $value) {
            $resultDataSet[] = [
                "seriesname" => $value,
                "data" => $this->checkNilaiTssek($value, $bulan),
            ];
        }
        $respon = [
            'category' => $resultCategory,
            "dataset" => $resultDataSet,
            "bulan" => $bulan,
        ];
        echo json_encode($respon);
    }

    public function checkNilaiTssek($titik_pantau, $bulan)
    {
        $db = \Config\Database::connect();
        $nilai_bodek = $db->table('eksisting')->select('Nilai_tssek')->where('Titik_pantau', $titik_pantau)->where("SUBSTR(Periode,1,7)", $bulan)->get()->getResult();
        $result = [];
        if ($nilai_bodek != null) {
            foreach ($nilai_bodek as $key => $value) {
                $result[] = [
                    "value" => $value->Nilai_tssek,
                ];
            }
        }
        return $result;
    }
    // END EKSISTING

}
