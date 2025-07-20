<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ruangan extends CI_Model
{
    public function getData()
    {
        return $this->db->get('ruangan');
    }

    public function getRuanganMahasiswa($nim)
    {
        return $this->db->get_where('ruangan', ['nim' => $nim]);
    }

}