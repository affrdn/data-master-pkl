<?php

namespace App\Controllers\Jurusan;

use App\Models\MhsModel;
use App\Controllers\BaseController;

class Kimia extends BaseController
{

    public function __construct()
    {
        $this->MhsModel = new MhsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'FMIPA | Kimia',
        ];

        echo view('fmipa/jurusan/kimia/info-jurusan');
        echo view('fmipa/jurusan/kimia/v-kimia', $data);
    }

    public function s1kimia()
    {
        $prodi_mhs = "3";
        $mhs = $this->MhsModel->getMahasiswa($prodi_mhs);

        $data = [
            'title' => 'FMIPA | Mahasiswa Biologi',
            'mhs' => $mhs,
        ];
        return view('fmipa/jurusan/kimia/mhsS1kimia', $data);
    }

    public function s2kimia()
    {
        $prodi_mhs = "4";
        $mhs = $this->MhsModel->getMahasiswa($prodi_mhs);

        $data = [
            'title' => 'FMIPA | Mahasiswa Kimia',
            'mhs' => $mhs
        ];
        return view('fmipa/jurusan/kimia/mhsS2kimia', $data);
    }
}
