<?php

namespace App\Controllers\Jurusan;

use App\Models\MhsModel;
use App\Controllers\BaseController;

class Biologi extends BaseController
{

    public function __construct()
    {
        $this->MhsModel = new MhsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'FMIPA | Biologi',
        ];
        echo view('fmipa/jurusan/biologi/info-jurusan');
        echo view('fmipa/jurusan/biologi/v-biologi', $data);
    }

    public function s1biologi()
    {
        $prodi_mhs = "1";
        $mhs = $this->MhsModel->getMahasiswa($prodi_mhs);

        $data = [
            'title' => 'FMIPA | Mahasiswa Biologi',
            'mhs' => $mhs,
        ];
        return view('fmipa/jurusan/biologi/mhsS1biologi', $data);
    }

    public function s2biologi()
    {
        $prodi_mhs = "2";
        $mhs = $this->MhsModel->getMahasiswa($prodi_mhs);

        $data = [
            'title' => 'FMIPA | Mahasiswa Biologi',
            'mhs' => $mhs
        ];
        return view('fmipa/jurusan/biologi/mhsS2biologi', $data);
    }
}
