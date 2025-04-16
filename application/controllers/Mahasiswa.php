<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use Endroid\QrCode\QrCode\QrCode;

class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models_mahasiswa');
		cek_login();
		// check_admin();
	}

	// Load Halaman Management User
	public function index()
	{
		$this->loadView();
	}

	// Load View
	private function loadView($showModal = "index")
	{
		$data = [
			'title' => 'Mahasiswa',
			'mhs' => $this->Models_mahasiswa->getData()->result(),
			'prodi' => $this->Models_mahasiswa->getDataProdi()->result(),
			'showModal' => $showModal
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/mahasiswa/index', $data);
		$this->load->view('layout/footer');
	}

	// LoadViewIDCard
	public function loadViewIDCard($act, $datanya = '')
	{
		if ($act == 'getByNim') {
			$dataMhs = $this->Models_mahasiswa->getData($datanya)->result();
		} else {
			// $data['mhs'] = $this->Models_mahasiswa->getData()->result();
			$dataProdi = htmlspecialchars($this->input->post('prodi'));
			if ($dataProdi == '') {
				$this->session->set_flashdata('swetalert', '`Upss!`, `Prodi Kosong, Silahkan Pilih Prodi terlebih Dahulu`, `error`');
				redirect('mahasiswa');
			} else {
				$dataMhs = $this->Models_mahasiswa->getDataWhereProdi($dataProdi)->result();
			}			
		}
		$data['mhs'] = [];
		foreach ($dataMhs as $value) {
			$data['mhs'][] = [
				'nim' => $value->nim,
				'nama' => $value->nama,
				'prodi' => $value->prodi,
				'fakultas' => $value->fakultas,
				'qrcode' => "https://quickchart.io/qr?text=" . urlencode($value->nim),
			];
		}
		$this->load->view('content/admin/mahasiswa/idcard', $data);
	}

	//loadMhsRegist
	public function loadMhsRegist()
	{
		$data = [
			'title' => 'Registrasi',
			'mhs' => $this->Models_mahasiswa->getDataMhsRegist()->result(),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/mahasiswa/registed', $data);
		$this->load->view('layout/footer');
	}

}
