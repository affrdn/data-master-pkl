<?php

namespace App\Controllers\Jurusan;

use App\Models\MhsModel;
use App\Controllers\BaseController;

class Fisika extends BaseController
{

    public function __construct()
    {
        $this->MhsModel = new MhsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'FMIPA | Fisika',
        ];

        echo view('fmipa/jurusan/fisika/info-jurusan');
        echo view('fmipa/jurusan/fisika/v-fisika', $data);
    }

    public function s1fisika()
    {
        $prodi_mhs = "7";
        $mhs = $this->MhsModel->getMahasiswa($prodi_mhs);

        $data = [
            'title' => 'FMIPA | Mahasiswa Fisika',
            'mhs' => $mhs,
        ];
        return view('fmipa/jurusan/fisika/mhsS1fisika', $data);
    }
}
