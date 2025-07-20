<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas extends CI_Model
{
    public function getData()
    {
        return $this->db->get('kelas');
    }
    public function getJumlahMahasiswaPerKelas()
    {
        $this->db->select('k.kode_kelas, COUNT(m.nim) AS total, SUM(m.status) AS status, SUM(m.status2) AS status2');
        $this->db->from('kelas k');
        $this->db->join('mahasiswa m', 'k.kode_kelas = m.ruangan', 'left');
        $this->db->group_by('k.kode_kelas');
        
        return $this->db->get()->result();
    }
    public function getKelasMahasiswa($id)
    {
        $this->db->select('kode_kelas');
        $this->db->from('kelas');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }
}