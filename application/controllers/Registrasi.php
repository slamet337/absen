<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models_mahasiswa');
		$this->load->model('M_user');
		$this->load->helper('akses');
		cek_login();
	}

	public function index()
	{
		$role = $this->session->userdata('role');
		$ruangan = $this->session->userdata('ruangan');

		if ($role == 'mahasiswa') {
			if (!cek_akses_presensi($ruangan)) {
				redirect('login/blocked');
				// show_error('Akses ditolak. Halaman registrasi belum tersedia.', 403, 'Forbidden');
				// return;
			}
		}

		$data = [
			'title' 		=> 'Absensi',
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/registrasi/index', $data);
		$this->load->view('layout/footer');
	}

	// fungsi registrasi
	// public function regist()
	// {
	// 	$nim = htmlspecialchars($this->input->post('nim', true));

	// 	if ($nim == '') {
	// 		$this->session->set_flashdata('swetalert', '`Upss!`, `NIM Kosong, Silahkan Masukkan NIM terlebih Dahulu`, `error`');
	// 		// redirect('registrasi');
	// 	} else {
	// 		// Ambil data mahasiswanya
	// 		$dataMhs = $this->Models_mahasiswa->getData($nim)->row();

	// 		// ambil tanggal ini hari
	// 		date_default_timezone_set("Asia/Makassar");
	// 		$tglNow = date('Y-m-d');

	// 		// Cocokan data (tanggal hari ini dan tanggal sesi mahasiswa)
	// 		if ($tglNow == $dataMhs->tgl) {
	// 			// cek apakah mahasiswa sudah regist
	// 			if ($dataMhs->status == '1') {
	// 				$this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ', Sudah Melakukan Registrasi`, `error`');
	// 			} else {
	// 				// Update Status Mahasiswa
	// 				// $data['status'] = '1';
	// 				$data = [
	// 					'status' => '1',
	// 					'wkt_regist' => date('Y-m-d H:i:s'),
	// 				];
					
	// 				$result = $this->Models_mahasiswa->updateData($nim, $data);
	// 				if ($result) {
	// 					$this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ', Gagal Registrasi`, `error`');
	// 				} else {
	// 					$this->session->set_flashdata('swetalert', '`Good Job!`, `NIM ' . $nim . ', Berhasil Registrasi`, `success`');
	// 				}
	// 			}
	// 		} else {
	// 			$this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ', Hari Ini Bukan Sesinya`, `error`');
	// 		}
	// 	}
	// 	redirect('registrasi');
	// }

	public function regist()
	{
		$nim  = htmlspecialchars($this->input->post('nim', true));
		$role = $this->session->userdata('role');

		if (empty($nim)) {
			$this->session->set_flashdata('swetalert', '`Upss!`, `NIM kosong, silakan masukkan atau scan NIM`, `error`');
			redirect('registrasi');
		}

		$dataMhs = $this->Models_mahasiswa->getData($nim)->row();

		if (!$dataMhs) {
			$this->session->set_flashdata('swetalert', '`Upss!`, `NIM tidak ditemukan`, `error`');
			redirect('registrasi');
		}

		// Validasi khusus untuk petugas (role 2)
		if ($role == '2') {
			$ruanganPetugas = $this->session->userdata('ruangan');

			if ($ruanganPetugas !== $dataMhs->ruangan) {
				$this->session->set_flashdata('swetalert', '`Akses Ditolak!`, `Peserta tidak terdaftar di ruangan ' . $ruanganPetugas . '`, `error`');
				redirect('registrasi');
			}
		}

		// Validasi tanggal (hari ini adalah sesi mahasiswa tersebut)
		date_default_timezone_set("Asia/Makassar");
		$tanggalHariIni = date('Y-m-d');

		if ($tanggalHariIni != $dataMhs->tgl) {
			$this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ' tidak dijadwalkan registrasi hari ini`, `error`');
			redirect('registrasi');
		}

		// Cek apakah sudah registrasi sebelumnya
		if ($dataMhs->status == '1') {
			$this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ' sudah melakukan registrasi`, `error`');
			redirect('registrasi');
		}

		// Lanjut update status registrasi
		$dataUpdate = [
			'status'     => '1',
			'wkt_regist' => date('Y-m-d H:i:s'),
		];

		$this->Models_mahasiswa->updateData($nim, $dataUpdate);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('swetalert', '`Good Job!`, `NIM ' . $nim . ' berhasil registrasi`, `success`');
		} else {
			$this->session->set_flashdata('swetalert', '`Upss!`, `Terjadi kesalahan saat registrasi`, `error`');
		}

		redirect('registrasi');
	}


}