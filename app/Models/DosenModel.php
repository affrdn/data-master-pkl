<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class DosenModel extends Model
{
    // protected $table = ('dosen');
    // protected $primaryKey = ('nip_dosen');

    public function getPangkat()
    {
        return $this->db->table('pangkat')->get()->getResultArray();
    }

    public function getGolongan()
    {
        return $this->db->table('golongan')->get()->getResultArray();
    }

    public function getJabFung()
    {
        return $this->db->table('jabatan_fung')->get()->getResultArray();
    }

    public function getGender()
    {
        return $this->db->table('gender')->get()->getResultArray();
    }

    public function getAgama()
    {
        return $this->db->table('agama')->get()->getResultArray();
    }
    public function getJurusan()
    {
        return $this->db->table('jurusan')->get()->getResultArray();
    }

    public function getJabatan()
    {
        return $this->db->table('jabatan')->get()->getResultArray();
    }

    public function getDosen($jurusan_dosen = null)
    {
        $builder = $this->db->table('dosen');
        $builder->join('gender', 'gender.kd_gender = dosen.jk_dosen');
        $builder->join('jurusan', 'jurusan.kd_jurusan = dosen.jurusan_dosen');
        $builder->join('agama', 'agama.kd_agama = dosen.agama_dosen');
        $builder->join('jabatan_fung', 'jabatan_fung.kd_jab_fung = dosen.jabatan_fung');
        $builder->join('pangkat', 'pangkat.kd_pangkat = dosen.pangkat_dosen');
        $builder->join('golongan', 'golongan.kd_golongan = dosen.gol_dosen');
        if ($jurusan_dosen != null) {
            $builder->where('jurusan_dosen', $jurusan_dosen);
        }
        $builder->orderBy('kd_jurusan', 'DESC');
        return $builder->get()->getResultArray();
    }

    public function cariDosen($keyword)
    {
        $builder = $this->db->table('dosen');
        $builder->join('gender', 'gender.kd_gender = dosen.jk_dosen');
        $builder->join('jurusan', 'jurusan.kd_jurusan = dosen.jurusan_dosen');
        $builder->join('jabatan', 'jabatan.kd_jabatan = dosen.kd_jabatan');
        $builder->join('agama', 'agama.kd_agama = dosen.agama_dosen');
        $builder->join('jabatan_fung', 'jabatan_fung.kd_jab_fung = dosen.jabatan_fung');
        $builder->join('pangkat', 'pangkat.kd_pangkat = dosen.pangkat_dosen');
        $builder->join('golongan', 'golongan.kd_golongan = dosen.gol_dosen');
        $builder->like('nip_dosen', $keyword);
        $builder->orLike('nama_dosen', $keyword);
        $builder->orLike('nama_jurusan', $keyword);
        $builder->orLike('nama_agama', $keyword);
        $builder->orLike('jenis_gender', $keyword);
        return $builder->get()->getResultArray();
    }

    public function insert_dosen($data)
    {
        return $this->db->table('dosen')->insert($data);
    }

    public function edit_dosen($nip_dosen)
    {
        $builder = $this->db->table('dosen');
        $builder->join('gender', 'gender.kd_gender = dosen.jk_dosen');
        $builder->join('jurusan', 'jurusan.kd_jurusan = dosen.jurusan_dosen');
        $builder->join('agama', 'agama.kd_agama = dosen.agama_dosen');
        $builder->join('jabatan', 'jabatan.kd_jabatan = dosen.kd_jabatan');
        $posts = $builder->where('nip_dosen', $nip_dosen);
        return $posts->get()->getRowArray();
    }

    public function update_dosen($data, $nip_dosen)
    {
        return $this->db->table('dosen')->update($data, ['nip_dosen' => $nip_dosen]);
    }

    public function delete_dosen($nip_dosen)
    {
        return $this->db->table('dosen')->delete(array('nip_dosen' => $nip_dosen));
    }
}
