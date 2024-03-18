<?php

namespace App\Controllers\Data;

use CodeIgniter\I18n\Time;
use App\Models\DosenModel;
use App\Controllers\BaseController;

class Dosen extends BaseController
{

    protected $useTimestamps = true;

    public function __construct()
    {
        $this->DosenModel = new DosenModel();
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) {

            $keyword = $this->request->getVar('keyword');
            if (isset($keyword)) {
                $dosen = $this->DosenModel->cariDosen($keyword);
            } else {
                $dosen = $this->DosenModel->getDosen();
            }
            $data = [
                'title' => 'FMIPA | Dosen',
                'dosen' => $dosen
            ];
            return view('fmipa/data/dosen/v-dosen', $data);
        } else
            return redirect()->to('/home');
    }

    public function create()
    {
        if (session()->get('isLoggedIn')) {
            $data = [
                'title' => 'FMIPA | Tambah Data Dosen',
                'validation' => \Config\Services::validation(),
                'agm' => $this->DosenModel->getAgama(),
                'jrs' => $this->DosenModel->getjurusan(),
                'jab' => $this->DosenModel->getJabatan(),
                'jk' => $this->DosenModel->getGender(),
                'pk' => $this->DosenModel->getPangkat(),
                'gol' => $this->DosenModel->getGolongan(),
                'jabFung' => $this->DosenModel->getJabFung()
            ];

            return view('fmipa/data/dosen/t-dosen', $data);
        } else
            return redirect()->to('/home');
    }

    public function delete($nip_dosen)
    {
        if (session()->get('isLoggedIn')) {
            // //cari foto berdasarkan nip
            // $Dosen = $this->DosenModel->delete_Dosen($nip_Dosen);
            // //hapus foto
            // dd($Dosen);
            // unlink('img/' . $Dosen['nip_Dosen']);

            $this->DosenModel->delete_dosen($nip_dosen);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/data/dosen');
        } else
            return redirect()->to('/home');
    }

    public function save()
    {
        if (session()->get('isLoggedIn')) {
            //validasi text
            if (!$this->validate([
                'nip_dosen' => [
                    'rules' => 'required|is_unique[dosen.nip_dosen]|numeric|min_length[18]|max_length[18]',
                    'errors' => [
                        'required' => 'nip tidak boleh kosong',
                        'is_unique' => 'nip sudah terdaftar',
                        'numeric' => 'nip harus berupa angka',
                    ]
                ],
                'nidn_dosen' => [
                    'rules' => 'required|is_unique[dosen.nidn_dosen]|numeric|max_length[10]',
                    'errors' => [
                        'required' => 'nip tidak boleh kosong',
                        'is_unique' => 'nip sudah terdaftar',
                        'numeric' => 'nidn harus berupa angka',
                    ]
                ],
                'foto_dosen' => [
                    'rules' => 'max_size[foto_dosen,1024]|is_image[foto_dosen]|mime_in[foto_dosen,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Harus berupa gambar',
                        'mime_in' => 'Gambar harus jpg, jpeg atau png',
                    ]
                ]
            ])) {
                return redirect()->to('/dosen/create')->withInput();
            }

            //simpan foto
            $fileFotoDosen = $this->request->getFile('foto_dosen');
            if ($fileFotoDosen->getError() == 4) {
                $namaFotoDosen = 'default.jpg';
            } else {
                //ambil nama foto
                $namaFotoDosen = $fileFotoDosen->getRandomName();
                //pindah foto
                $fileFotoDosen->move('img', $namaFotoDosen);
            }

            $data = [
                'nip_dosen' => $this->request->getPost('nip_dosen'),
                'nidn_dosen' => $this->request->getPost('nidn_dosen'),
                'nama_dosen' => $this->request->getPost('nama_dosen'),
                'kd_jabatan' => $this->request->getPost('kd_jabatan'),
                'foto_dosen' => $namaFotoDosen,
                'jabatan_fung' => $this->request->getPost('jabatan_fung'),
                'pangkat_dosen' => $this->request->getPost('pangkat_dosen'),
                'gol_dosen' => $this->request->getPost('gol_dosen'),
                'email_dosen' => $this->request->getPost('email_dosen'),
                'jurusan_dosen' => $this->request->getPost('jurusan_dosen'),
                'tugas_tambahan' => $this->request->getPost('tugas_tambahan'),
                'profil_dosen' => $this->request->getPost('profil_dosen'),
                'tahmas_dosen' => $this->request->getPost('tahmas_dosen'),
                'jk_dosen' => $this->request->getPost('jk_dosen'),
                'agama_dosen' => $this->request->getPost('agama_dosen'),
                'alamat_dosen' => $this->request->getPost('alamat_dosen'),
                'tLahir_dosen' => $this->request->getPost('tLahir_dosen'),
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ];

            $this->DosenModel->insert_dosen($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to('/data/dosen');
        } else
            return redirect()->to('/home');
    }

    public function edit($nip_dosen)
    {
        if (session()->get('isLoggedIn')) {
            $data = [
                'title' => 'FMIPA | Ubah Data Dosen',
                'validation' => \Config\Services::validation(),
                'dosen' => $this->DosenModel->edit_Dosen($nip_dosen),
                'jab' => $this->DosenModel->getJabatan(),
                'agm' => $this->DosenModel->getAgama(),
                'jrs' => $this->DosenModel->getjurusan(),
                'jk' => $this->DosenModel->getGender(),
                'pk' => $this->DosenModel->getPangkat(),
                'gol' => $this->DosenModel->getGolongan(),
                'jabFung' => $this->DosenModel->getJabFung()
            ];

            return view('fmipa/data/dosen/e-dosen', $data);
        } else
            return redirect()->to('/home');
    }

    public function update($nip_dosen)
    {
        if (session()->get('isLoggedIn')) {
            // if (!$this->validate([
            //     'foto_Dosen' => [
            //         'rules' => 'uploaded[foto_Dosen]|max_size[foto_Dosen,2014]|is_image[foto_Dosen]|mime_in[foto_Dosen,image/jpg,image/jpeg,image/png]',
            //         'errors' => [
            //             'uploaded' => 'Foto wajib diiisi',
            //             'max_size' => 'Ukuran gambar terlalu besar',
            //             'is_image' => 'File harus gambar',
            //             'mime_in' => 'Gambar harus jpg, jpeg atau png'
            //         ]
            //     ]
            // ])) {
            //     return redirect()->to('/dosen/edit')->withInput();
            // }

            // $fileFoto = $this->request->getFile('foto_Dosen');
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
                'nip_dosen' => $nip_dosen,
                'nidn_dosen' => $this->request->getPost('nidn_dosen'),
                'nama_dosen' => $this->request->getPost('nama_dosen'),
                'kd_jabatan' => $this->request->getPost('kd_jabatan'),
                'foto_dosen' => $this->request->getPost('fotoLama'),
                'jabatan_fung' => $this->request->getPost('jabatan_fung'),
                'pangkat_dosen' => $this->request->getPost('pangkat_dosen'),
                'gol_dosen' => $this->request->getPost('gol_dosen'),
                'email_dosen' => $this->request->getPost('email_dosen'),
                'jurusan_dosen' => $this->request->getPost('jurusan_dosen'),
                'tugas_tambahan' => $this->request->getPost('tugas_tambahan'),
                'profil_dosen' => $this->request->getPost('profil_dosen'),
                'tahmas_dosen' => $this->request->getPost('tahmas_dosen'),
                'jk_dosen' => $this->request->getPost('jk_dosen'),
                'agama_dosen' => $this->request->getPost('agama_dosen'),
                'alamat_dosen' => $this->request->getPost('alamat_dosen'),
                'tLahir_dosen' => $this->request->getPost('tLahir_dosen'),
                'updated_at' => Time::now()
            ];
            $this->DosenModel->update_dosen($data, $nip_dosen);
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/dosen');
        } else
            return redirect()->to('/home');
    }
}
