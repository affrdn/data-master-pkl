<?php

namespace App\Controllers\Jurusan;

use App\Models\MhsModel;
use App\Controllers\BaseController;

class Matematika extends BaseController
{

    public function __construct()
    {
        $this->MhsModel = new MhsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'FMIPA | Matematika',
        ];
        echo view('fmipa/jurusan/matematika/info-jurusan');
        echo view('fmipa/jurusan/matematika/v-matem', $data);
    }

    public function s1matem()
    {
        $prodi_mhs = "5";
        $mhs = $this->MhsModel->getMahasiswa($prodi_mhs);

        $data = [
            'title' => 'FMIPA | Mahasiswa Matematika',
            'mhs' => $mhs,
        ];
        return view('fmipa/jurusan/matematika/mhsS1matem', $data);
    }

    public function s2matem()
    {
        $prodi_mhs = "6";
        $mhs = $this->MhsModel->getMahasiswa($prodi_mhs);

        $data = [
            'title' => 'FMIPA | Mahasiswa Matematika',
            'mhs' => $mhs
        ];
        return view('fmipa/jurusan/matematika/mhsS2matem', $data);
    }

    public function dosen()
    {
        $data = [
            'title' => 'FMIPA | Dosen Matematika',
        ];
    }
}
