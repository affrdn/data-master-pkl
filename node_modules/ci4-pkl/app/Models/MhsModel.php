<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class MhsModel extends Model
{
	// protected $table = ('mahasiswa');
	// protected $primaryKey = ('npm_mhs');

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

	public function getProdi()
	{
		$builder = $this->db->table('prodi');
		$builder->join('jurusan', 'jurusan.kd_jurusan = prodi.kd_jurusan');
		return $builder->get()->getResultArray();
	}

	public function getMahasiswa($prodi_mhs = null)
	{
		$builder = $this->db->table('mahasiswa');
		$builder->join('gender', 'gender.kd_gender = mahasiswa.jk_mhs');
		$builder->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.jurusan_mhs');
		$builder->join('prodi', 'prodi.kd_prodi = mahasiswa.prodi_mhs');
		$builder->join('agama', 'agama.kd_agama = mahasiswa.agama_mhs');
		if ($prodi_mhs != null) {
			$builder->where('prodi_mhs', $prodi_mhs);
		}
		$builder->orderBy('prodi_mhs', 'ASC')->orderBy('npm_mhs', 'DESC');
		return $builder->get()->getResultArray();
	}

	public function cariMahasiswa($keyword)
	{
		$builder = $this->db->table('mahasiswa');
		$builder->join('gender', 'gender.kd_gender = mahasiswa.jk_mhs');
		$builder->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.jurusan_mhs');
		$builder->join('prodi', 'prodi.kd_prodi = mahasiswa.prodi_mhs');
		$builder->join('agama', 'agama.kd_agama = mahasiswa.agama_mhs');
		$builder->like('npm_mhs', $keyword);
		$builder->orLike('nama_mhs', $keyword);
		$builder->orLike('nama_prodi', $keyword);
		$builder->orLike('nama_jurusan', $keyword);
		$builder->orLike('nama_agama', $keyword);
		$builder->orLike('jenis_gender', $keyword);
		$builder->orLike('tahmas_mhs', $keyword);
		$builder->orderBy('prodi_mhs', 'ASC')->orderBy('npm_mhs', 'DESC');
		return $builder->get()->getResultArray();
	}

	public function insert_mhs($data)
	{
		return $this->db->table('mahasiswa')->insert($data);
	}

	public function edit_mhs($npm_mhs)
	{
		$builder = $this->db->table('mahasiswa');
		$builder->join('gender', 'gender.kd_gender = mahasiswa.jk_mhs');
		$builder->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.jurusan_mhs');
		$builder->join('prodi', 'prodi.kd_prodi = mahasiswa.prodi_mhs');
		$builder->join('agama', 'agama.kd_agama = mahasiswa.agama_mhs');
		$posts = $builder->where('npm_mhs', $npm_mhs);
		return $posts->get()->getRowArray();
	}

	public function update_mhs($data, $npm_mhs)
	{
		return $this->db->table('mahasiswa')->update($data, ['npm_mhs' => $npm_mhs]);
	}

	public function delete_mhs($npm_mhs)
	{
		return $this->db->table('mahasiswa')->delete(array('npm_mhs' => $npm_mhs));
	}
}
