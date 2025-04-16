<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Models_mahasiswa');
	}

	public function index()
	{
		$data = [
			'mhs' => count($this->Models_mahasiswa->getData()->result()),
			'registed' => count($this->Models_mahasiswa->getDataMhsRegist()->result()),
			'unregist' => count($this->Models_mahasiswa->getDataMhsunRegist()->result()),
		];
		$this->load->view('content/landingpage/index', $data);
	}
}
