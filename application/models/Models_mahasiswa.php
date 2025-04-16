<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models_mahasiswa extends CI_Model
{
	// Get semua daata Mahasiswa
	public function getData($nim = '')
	{
		if ($nim != '') {
			$this->db->where('nim', $nim);
		}
		$query = $this->db->get('mahasiswa');
		return $query;
	}

	// Get data berdasarkan prodi
	public function getDataWhereProdi($prodi)
	{
		$this->db->where('prodi', $prodi);
		$query = $this->db->get('mahasiswa');
		return $query;
	}

	// Get data berdasarkan status
	public function getDataMhsRegist()
	{
		$this->db->where('status', '1');
		$query = $this->db->get('mahasiswa');
		return $query;
	}

	// Get data berdasarkan status
	public function getDataMhsunRegist()
	{
		$this->db->where('status', '0');
		$query = $this->db->get('mahasiswa');
		return $query;
	}

	// update Status
	public function updateData($nim, $data)
	{
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa', $data);
	}

	// Get Data Prodi
	public function getDataProdi()
	{
		$this->db->select('prodi');
		$this->db->distinct();
		$this->db->from('mahasiswa');
		$query = $this->db->get();
		return $query;
	}
}
