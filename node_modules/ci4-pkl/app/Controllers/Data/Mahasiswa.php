<?php

namespace App\Controllers\Data;

use CodeIgniter\I18n\Time;
use App\Models\MhsModel;
use App\Controllers\BaseController;

class Mahasiswa extends BaseController
{

    protected $useTimestamps = true;

    public function __construct()
    {
        $this->MhsModel = new MhsModel();
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            $keyword = $this->request->getVar('keyword');
            if (isset($keyword)) {
                $mhs = $this->MhsModel->cariMahasiswa($keyword);
            } else {
                $mhs = $this->MhsModel->getMahasiswa();
            }
            $data = [
                'title' => 'FMIPA | Mahasiswa',
                'mhs' => $mhs
            ];
            return view('fmipa/data/mahasiswa/v-mahasiswa', $data);
        } else
            return redirect()->to('/home');
    }

    public function create()
    {
        if (session()->get('isLoggedIn')) {
            $data = [
                'title' => 'FMIPA | Tambah Data Mahasiswa',
                'validation' => \Config\Services::validation(),
                'agm' => $this->MhsModel->getAgama(),
                'jrs' => $this->MhsModel->getjurusan(),
                'prd' => $this->MhsModel->getProdi(),
                'jk' => $this->MhsModel->getGender()
            ];

            return view('fmipa/data/mahasiswa/t-mahasiswa', $data);
        } else
            return redirect()->to('/home');
    }

    public function delete($npm_mhs)
    {
        if (session()->get('isLoggedIn')) {

            $this->MhsModel->delete_mhs($npm_mhs);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/mahasiswa');
        } else
            return redirect()->to('/home');
    }

    public function save()
    {
        if (session()->get('isLoggedIn')) {
            //validasi text
            if (!$this->validate([
                'npm_mhs' => [
                    'rules' => 'required|is_unique[mahasiswa.npm_mhs]|numeric',
                    'errors' => [
                        'required' => 'NPM tidak boleh kosong',
                        'is_unique' => 'NPM sudah terdaftar'

                    ]
                ],
                'foto_mhs' => [
                    'rules' => 'max_size[foto_mhs,1024]|is_image[foto_mhs]|mime_in[foto_mhs,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'File harus gambar',
                        'mime_in' => 'Gambar harus jpg, jpeg atau png'
                    ]
                ]
            ])) {
                return redirect()->to('/mahasiswa/create')->withInput();
            }

            //simpan foto
            $fileFoto = $this->request->getFile('foto_mhs');

            if ($fileFoto->getError() == 4) {
                $namaFoto = 'default.jpg';
            } else {
                //ambil nama foto
                $namaFoto = $fileFoto->getRandomName();
                //pindah foto
                $fileFoto->move('img', $namaFoto);
            }

            $data = [
                'npm_mhs' => $this->request->getPost('npm_mhs'),
                'nama_mhs' => $this->request->getPost('nama_mhs'),
                'foto_mhs' => $namaFoto,
                'jk_mhs' => $this->request->getPost('jk_mhs'),
                'jurusan_mhs' => $this->request->getPost('jurusan_mhs'),
                'prodi_mhs' => $this->request->getPost('prodi_mhs'),
                'tahmas_mhs' => $this->request->getPost('tahmas_mhs'),
                'agama_mhs' => $this->request->getPost('agama_mhs'),
                'alamat_mhs' => $this->request->getPost('alamat_mhs'),
                'tLahir_mhs' => $this->request->getPost('tLahir_mhs'),
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ];

            $this->MhsModel->insert_mhs($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/mahasiswa');
        } else
            return redirect()->to('/home');
    }

    public function edit($npm_mhs)
    {
        if (session()->get('isLoggedIn')) {
            $data = [
                'title' => 'FMIPA | Ubah Data Mahasiswa',
                'validation' => \Config\Services::validation(),
                'mhs' => $this->MhsModel->edit_mhs($npm_mhs),
                'agm' => $this->MhsModel->getAgama(),
                'jrs' => $this->MhsModel->getjurusan(),
                'prd' => $this->MhsModel->getProdi(),
                'jk' => $this->MhsModel->getGender()
            ];

            return view('fmipa/data/mahasiswa/e-mahasiswa', $data);
        } else
            return redirect()->to('/home');
    }

    public function update($npm_mhs)
    {
        // if (!$this->validate([
        //     'foto_mhs' => [
        //         'rules' => 'uploaded[foto_mhs]|max_size[foto_mhs,2014]|is_image[foto_mhs]|mime_in[foto_mhs,image/jpg,image/jpeg,image/png]',
        //         'errors' => [
        //             'uploaded' => 'Foto wajib diiisi',
        //             'max_size' => 'Ukuran gambar terlalu besar',
        //             'is_image' => 'File harus gambar',
        //             'mime_in' => 'Gambar harus jpg, jpeg atau png'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('/mahasiswa/edit')->withInput();
        // }

        // $fileFoto = $this->request->getFile('foto_mhs');
        // //simpan foto
        // if ($fileFoto->getError() == 'fotoLama') {
        //     $namaFoto = $this->request->getPost('fotoLama');
        // } else {
        //     $namaFoto = $fileFoto->getRandomName();

        //     $fileFoto->move('img', $namaFoto);
        //     //hapus file lama
        //     unlink('img/' .  $this->request->getPost('fotoLama'));
        // }
        $data = [
            'npm_mhs' => $npm_mhs,
            'nama_mhs' => $this->request->getPost('nama_mhs'),
            'foto_mhs' => $this->request->getPost('fotoLama'),
            'jk_mhs' => $this->request->getPost('jk_mhs'),
            'jurusan_mhs' => $this->request->getPost('jurusan_mhs'),
            'prodi_mhs' => $this->request->getPost('prodi_mhs'),
            'tahmas_mhs' => $this->request->getPost('tahmas_mhs'),
            'agama_mhs' => $this->request->getPost('agama_mhs'),
            'alamat_mhs' => $this->request->getPost('alamat_mhs'),
            'tLahir_mhs' => $this->request->getPost('tLahir_mhs'),
            'updated_at' => Time::now()

        ];
        $this->MhsModel->update_mhs($data, $npm_mhs);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to('/data/mahasiswa');
    }
}
