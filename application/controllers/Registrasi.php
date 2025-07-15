<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models_mahasiswa');
		$this->load->model('M_user');
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
    $nim = htmlspecialchars($this->input->post('nim', true));
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

	if ($role == 'mahasiswa') {
		if (strpos(strtoupper($dataMhs->ruangan), 'Z') === false) {
			$this->session->set_flashdata('swetalert', '`Akses Ditolak!`, `Hanya petugas yang dapat melakukan registrasi`, `error`');
			redirect('registrasi');
		}	
	}else{
	$ruang_petugas = $this->session->userdata('id_ruangan');
    if ($dataMhs->id_ruangan != $ruang_petugas) {
        $this->session->set_flashdata('swetalert', '`Akses Ditolak!`, `Anda tidak berwenang registrasi NIM ini (beda ruangan)`, `error`');
        redirect('registrasi');
    	}
	}

    date_default_timezone_set("Asia/Makassar");
    $tglNow = date('Y-m-d');

    if ($tglNow != $dataMhs->tgl) {
        $this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ', hari ini bukan sesinya`, `error`');
        redirect('registrasi');
    }

    if ($dataMhs->status == '1') {
        $this->session->set_flashdata('swetalert', '`Upss!`, `NIM ' . $nim . ' sudah melakukan registrasi`, `error`');
        redirect('registrasi');
    }

    $dataUpdate = [
        'status'      => '1',
        'wkt_regist'  => date('Y-m-d H:i:s'),
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