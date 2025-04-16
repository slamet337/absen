<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
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
			'title' 		=> 'Registrasi',
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/registrasi/index', $data);
		$this->load->view('layout/footer');
	}

	// fungsi registrasi
	public function regist()
	{
		$nim = htmlspecialchars($this->input->post('nim', true));

		if ($nim == '') {
			$this->session->set_flashdata('swetalert', '`Upss!`, `NIM Kosong, Silahkan Masukkan NIM terlebih Dahulu`, `error`');
			// redirect('registrasi');
		} else {
			// Ambil data mahasiswanya
			$dataMhs = $this->Models_mahasiswa->getData($nim)->row();

			// ambil tanggal ini hari
			date_default_timezone_set("Asia/Makassar");
			$tglNow = date('Y-m-d');

			// Cocokan data (tanggal hari ini dan tanggal sesi mahasiswa)
			if ($tglNow == $dataMhs->tgl) {
				// cek apakah mahasiswa sudah regist
				if ($dataMhs->status == '1') {
					$this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ', Sudah Melakukan Registrasi`, `error`');
				} else {
					// Update Status Mahasiswa
					// $data['status'] = '1';
					$data = [
						'status' => '1',
						'wkt_regist' => date('Y-m-d H:i:s'),
					];
					
					$result = $this->Models_mahasiswa->updateData($nim, $data);
					if ($result) {
						$this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ', Gagal Registrasi`, `error`');
					} else {
						$this->session->set_flashdata('swetalert', '`Good Job!`, `NIM ' . $nim . ', Berhasil Registrasi`, `success`');
					}
				}
			} else {
				$this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ', Hari Ini Bukan Sesinya`, `error`');
			}
		}
		redirect('registrasi');
	}
}
