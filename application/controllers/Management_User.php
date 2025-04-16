<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management_User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		// cek_login();
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
			'title' => 'Management User',
			'user' => $this->M_user->get()->result(),
			'showModal' => $showModal
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar');
		$this->load->view('content/admin/management_user/index', $data);
		$this->load->view('layout/footer');
	}

	// Get Data User By ID
	public function getOneUser()
	{
		$id = htmlspecialchars($this->input->post('iduser', true));
		$data = $this->M_user->get($id)->row();
		echo json_encode($data);
	}

	// Add User
	public function add()
	{
		$this->form_validation->set_rules('namauser', 'Nama User', 'required|trim|min_length[3]', [
			'required' => 'Nama User harus diisi!',
			'min_length' => 'Nama User terlalu pendek!',
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]', [
			'required' => 'Username harus diisi!',
			'min_length' => 'Username terlalu pendek!',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[20]', [
			'required' => 'Password harus diisi!',
			'min_length' => 'Password terlalu pendek!',
			'max_length' => 'Password terlalu panjang, maksimal 20 karakter!',
		]);
		if ($this->form_validation->run() == false) {
			$this->loadView('add');
		} else {
			$data 	= [
				'namauser'		=> htmlspecialchars($this->input->post('namauser', true)),
				'username'		=> htmlspecialchars($this->input->post('username', true)),
				'password'		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role'			=> 1,
				'status'		=> 1,
				'created_at'	=> time()
			];
			$this->M_user->insert($data);
			$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Tambahkan !`, `success`');
			redirect('Management_User');
		}
	}

	public function update()
	{
		// Deklarasi Variable
		$id = htmlspecialchars($this->input->post('iduser', true));
		$namauser = htmlspecialchars($this->input->post('namauser', true));
		$username = htmlspecialchars($this->input->post('username', true));
		$password = htmlspecialchars($this->input->post('password', true));

		// Cek data
		$cek = $this->M_user->get($id)->row();
		if ($this->input->post('password') != $cek->password) {
			$password = md5(htmlspecialchars($this->input->post('password', true)));
		} else {
			$password = htmlspecialchars($this->input->post('password', true));
		}

		// Cek Perubahan Data
		if ($namauser == $cek->namauser && $username == $cek->username && $password == $cek->password) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Tidak Berubah`, `error`');
			redirect('Management_User');
		}

		// Set Rules
		$this->form_validation->set_rules('namauser', 'Nama User', 'required|trim|min_length[3]', [
			'required' => 'Nama User harus diisi!',
			'min_length' => 'Nama User terlalu pendek!',
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]', [
			'required' => 'Username harus diisi!',
			'min_length' => 'Username terlalu pendek!',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
			'required' => 'Password harus diisi!',
			'min_length' => 'Password terlalu pendek!',
			// 'max_length' => 'Password terlalu panjang, maksimal 20 karakter!',
		]);

		// Cek Validasi
		if ($this->form_validation->run() == false) {
			$this->loadView('edit');
		} else {
			$data 	= [
				'namauser'		=> $namauser,
				'username'		=> $username,
				'password'		=> $password
			];
			$result = $this->M_user->update($id, $data);
			if ($result) {
				$this->session->set_flashdata('swetalert', '`Upsss!`, `Data Gagal Di Ubah !`, `error`');
			} else {
				$this->session->set_flashdata('swetalert', '`Good job!`, `Data Berhasil Di Ubah !`, `success`');
			}
			redirect('Management_User');
		}
	}

	// Konfirmasi Status User
	public function status($act, $id)
	{
		if ($act == 'aktif') {
			$status = 1;
		} else {
			$status = 0;
		}
		$result = $this->M_user->status($id, $status);
		if ($result && $status == 1) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Akun Gagal di Aktifkan`, `error`');
		} else if ($result && $status == 0) {
			$this->session->set_flashdata('swetalert', '`Upsss!`, `Akun Gagal di Non Aktifkan`, `error`');
		} else if (!$result && $status == 1) {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Akun Berhasil di Aktifkan`, `success`');
		} else if (!$result && $status == 0) {
			$this->session->set_flashdata('swetalert', '`Good job!`, `Akun Berhasil di Non Aktifkan`, `success`');
		}
		redirect('Management_User');
	}
}
