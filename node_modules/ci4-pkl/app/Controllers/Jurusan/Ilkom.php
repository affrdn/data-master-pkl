<?php

namespace App\Controllers\Jurusan;

use App\Models\MhsModel;
use App\Models\DosenModel;
use App\Controllers\BaseController;

class Ilkom extends BaseController
{
    public function __construct()
    {
        $this->MhsModel = new MhsModel();
        $this->DosenModel = new DosenModel();
    }

    public function index()
    {
        $sqlKajur = "SELECT nip_dosen, nidn_dosen, nama_dosen, email_dosen FROM dosen WHERE jurusan_dosen = '5' AND kd_jabatan = 'kajur'";
        $db = \Config\Database::connect();
        $result = $db->query($sqlKajur);
        $kajur = $result->getResultArray();

        $sqlSekjur = "SELECT nip_dosen, nidn_dosen, nama_dosen, email_dosen FROM dosen WHERE jurusan_dosen = '5' AND kd_jabatan = 'sekjur' ";
        $db = \Config\Database::connect();
        $result = $db->query($sqlSekjur);
        $sekjur = $result->getResultArray();

        $sqlSekret = "SELECT * FROM sekretariatan JOIN jurusan ON jurusan.kd_jurusan=sekretariatan.kd_sekret WHERE kd_jurusan = '5'";
        $db = \Config\Database::connect();
        $result = $db->query($sqlSekret);
        $sekret = $result->getResultArray();

        $sqlKaprod = "SELECT nip_dosen, nidn_dosen, nama_dosen, email_dosen FROM dosen WHERE kd_jabatan = 'kps_d3mi' ";
        $db = \Config\Database::connect();
        $result = $db->query($sqlKaprod);
        $Kaprod = $result->getResultArray();

        $sqlKalab1 = "SELECT nip_dosen, nidn_dosen, nama_dosen, email_dosen FROM dosen WHERE kd_jabatan = 'li_rpl' ";
        $db = \Config\Database::connect();
        $result = $db->query($sqlKalab1);
        $karpl = $result->getResultArray();

        $sqlKalab2 = "SELECT nip_dosen, nidn_dosen, nama_dosen, email_dosen FROM dosen WHERE kd_jabatan = 'li_kd' ";
        $db = \Config\Database::connect();
        $result = $db->query($sqlKalab2);
        $kakd = $result->getResultArray();


        $judul = [
            'title' => 'FMIPA | Ilmu Komputer',
        ];

        $data = [
            'kajur' => $kajur,
            'sekjur' => $sekjur,
            'sekret' => $sekret,
            'kaprod' => $Kaprod,
            'karpl' => $karpl,
            'kakd' => $kakd
        ];

        return view('fmipa/jurusan/ilkom/info-jurusan', $data) . view('fmipa/jurusan/ilkom/v-ilkom', $judul);
    }

    public function dosen()
    {
        $jurusan_dosen = '5';
        $dosen = $this->DosenModel->getDosen($jurusan_dosen);
        $data = [
            'title' => 'FMIPA | Dosen Ilmu Komputer',
            'dosen' => $dosen
        ];
    }

    public function ilkom()
    {
        $prodi_mhs = "9";
        $mhs = $this->MhsModel->getMahasiswa($prodi_mhs);

        $keyword = $this->request->getVar('keyword');
        if (isset($keyword)) {
            $sql = "SELECT * FROM mahasiswa JOIN gender ON gender.kd_gender=mahasiswa.jk_mhs JOIN agama ON agama.kd_agama=mahasiswa.agama_mhs jurusan.kd_jurusan=mahasiswa.jurusan_mhs JOIN prodi ON prodi.kd_prodi=mahasiswa.prodi_mhs WHERE prodi_mhs = '$prodi_mhs' AND npm_mhs = '$keyword' ";
            $db = \Config\Database::connect();
            $result = $db->query($sql);
            $mhs = $result->getResultArray($keyword);
        }

        $data = [
            'title' => 'FMIPA | Mahasiswa Ilmu Komputer',
            'mhs' => $mhs,
        ];
        return view('fmipa/jurusan/ilkom/mhsIlkom', $data);
    }

    public function d3mi()
    {
        $prodi_mhs = "8";
        $mhs = $this->MhsModel->getMahasiswa($prodi_mhs);

        $keyword = $this->request->getVar('keyword');
        if ($keyword != '') {
            $sql = "SELECT * FROM mahasiswa JOIN gender ON gender.kd_gender=mahasiswa.jk_mhs JOIN agama ON agama.kd_agama=mahasiswa.agama_mhs JOIN jurusan ON jurusan.kd_jurusan=mahasiswa.jurusan_mhs JOIN prodi ON prodi.kd_prodi=mahasiswa.prodi_mhs WHERE prodi_mhs = '$prodi_mhs' AND npm_mhs = '$keyword' ";
            $db = \Config\Database::connect();
            $result = $db->query($sql);
            $mhs = $result->getResultArray($keyword);
        }

        $data = [
            'title' => 'FMIPA | Mahasiswa Ilmu Komputer',
            'mhs' => $mhs,
        ];
        return view('fmipa/jurusan/ilkom/mhsMi', $data);
    }
}
