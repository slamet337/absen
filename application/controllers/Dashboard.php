<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models_mahasiswa');
        $this->load->model('M_user');
		cek_login();
	}

	// public function index()
	// {
	// 	$data = [
	// 		'title' 		=> 'Dashboard',
	// 		'mhs' => count($this->Models_mahasiswa->getData()->result()),
	// 		'registed' => count($this->Models_mahasiswa->getDataMhsRegist()->result()),
	// 		'unregist' => count($this->Models_mahasiswa->getDataMhsunRegist()->result()),
	// 	];
		
	// 	$this->load->view('layout/header', $data);
	// 	$this->load->view('layout/sidebar', $data);
	// 	$this->load->view('layout/navbar');
	// 	$this->load->view('content/admin/dashboard/index', $data);
	// 	$this->load->view('layout/footer');
	// }

	public function index()
{
    $role = $this->session->userdata('role');

    if ($role == 'admin') {
        // Tampilan untuk Admin
        $data = [
            'title'     => 'Dashboard Admin',
            'mhs'       => count($this->Models_mahasiswa->getData()->result()),
            'registed'  => count($this->Models_mahasiswa->getDataMhsRegist()->result()),
            'unregist'  => count($this->Models_mahasiswa->getDataMhsunRegist()->result()),
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar');
        $this->load->view('content/admin/dashboard/index', $data); 
        $this->load->view('layout/footer');

    } elseif ($role == 'mahasiswa') {
        
        $nim = $this->session->userdata('nim');
        $mhs = $this->Models_mahasiswa->getData($nim)->row();

        $data = [
            'title' => 'Dashboard Mahasiswa',
            'mhs'       => count($this->Models_mahasiswa->getData()->result()),
            'ruangan' => $this->Models_mahasiswa->getRuanganMahasiswa($nim)->row()->ruangan ?? 'Tidak Tersedia',
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data); 
        $this->load->view('layout/navbar');
        $this->load->view('content/mahasiswa/dashboard/index', $data); 
        $this->load->view('layout/footer');

    } elseif ($role == 2) {
        
        $data = [
            'title' => 'Dashboard Petugas',
            'mhs'       => count($this->Models_mahasiswa->getData()->result()),
            'ruangan' => $this->M_user->cekuser($this->session->userdata('username'))->row()->ruangan ?? 'Tidak Tersedia',
            'registed'  => count($this->Models_mahasiswa->getDataMhsRegist()->result()),
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar');
        $this->load->view('content/petugas/dashboard/index', $data); 
        $this->load->view('layout/footer');

    } else {
        redirect('login/blocked');
    }

    }
}