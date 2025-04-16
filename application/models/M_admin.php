<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{


	public function total_user()
	{
		return $this->db->get('user')->num_rows();
	}

	public function aset()
	{
		$sql = "SELECT SUM(stok) AS stok, SUM(bagus) AS bagus, SUM(rusak) AS rusak  FROM `aset`";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function peminjam()
	{
		$sql = "SELECT COUNT(*) AS nilai FROM `peminjaman`";

		$data = $this->db->query($sql);

		return $data->row();
	}
}
