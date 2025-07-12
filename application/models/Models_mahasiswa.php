<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models_mahasiswa extends CI_Model
{

	public function cekLoginMahasiswa($username, $password)
	{
		$this->db->where('nim', $username);
		$this->db->where('password', $password); 
		return $this->db->get('mahasiswa');
	}

	public function getMahasiswaByNIM($nim)
	{
    	return $this->db->get_where('mahasiswa', ['nim' => $nim]);
	}

	public function getRuanganMahasiswa($nim)
	{
		$this->db->select('ruangan');
		$this->db->from('mahasiswa');
		$this->db->where('nim', $nim);
		$query = $this->db->get();
		return $query;
	}


	public function getData($nim = '')
	{
		if ($nim != '') {
			$this->db->where('nim', $nim);
		}
		$query = $this->db->get('mahasiswa');
		return $query;
	}

	public function getDataWhereProdi($prodi)
	{
		$this->db->where('prodi', $prodi);
		$query = $this->db->get('mahasiswa');
		return $query;
	}
	public function getDataMhsRegist()
	{
		$this->db->where('status', '1');
		$query = $this->db->get('mahasiswa');
		return $query;
	}
	public function getDataMhsunRegist()
	{
		$this->db->where('status', '0');
		$query = $this->db->get('mahasiswa');
		return $query;
	}
	public function updateData($nim, $data)
	{
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa', $data);
	}
	public function getDataProdi()
	{
		$this->db->select('prodi');
		$this->db->distinct();
		$this->db->from('mahasiswa');
		$query = $this->db->get();
		return $query;
	}
}