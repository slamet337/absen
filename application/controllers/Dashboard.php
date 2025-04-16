<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models_mahasiswa');
		cek_login();
	}

	public function index()
	{
		$data = [
			'title' 		=> 'Dashboard',
			'mhs' => count($this->Models_mahasiswa->getData()->result()),
			'registed' => count($this->Models_mahasiswa->getDataMhsRegist()->result()),
			'unregist' => count($this->Models_mahasiswa->getDataMhsunRegist()->result()),
		];
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/dashboard/index', $data);
		$this->load->view('layout/footer');
	}
}
