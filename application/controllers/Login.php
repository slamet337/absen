<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');              
        $this->load->model('Models_mahasiswa'); 
           
    }

    // Halaman Login Gabungan
    public function index()
    {
        $data = [
            'title' => 'Login Sistem',
        ];
        $this->load->view('content/login/layout/header', $data);
        $this->load->view('content/login/index'); 
        $this->load->view('content/login/layout/footer');
    }

    public function prosses()
{
    $username = htmlspecialchars($this->input->post('username'));
    $password = htmlspecialchars($this->input->post('password'));

    // Cek Admin
    $admin = $this->M_user->cekuser($username)->row();

    if ($admin) {
        if ($admin->password === $password) {
            if ($admin->status == 1) {
                $this->session->set_userdata([
                    'namauser' => $admin->namauser,
                    'role'     => 'admin',
                    'is_login' => true
                ]);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('swetalert', '`Upsss!`, `Akun admin belum aktif`, `error`');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('swetalert', '`Upsss!`, `Password salah`, `error`');
            redirect('login');
        }
    }
    
$mhs = $this->Models_mahasiswa->getMahasiswaByNIM($username)->row();
    // if ($mhs) {
    //     echo '<pre>';
    //     print_r($mhs);
    //     echo '</pre>';
    //     exit;
    // }
if ($mhs) {
    if (password_verify($password, $mhs->password)) {
        if ($mhs->status == '1') {
            $this->session->set_userdata([
                'nim'      => $mhs->nim,
                'nama'     => $mhs->nama,
                'role'     => 'mahasiswa',
                'is_login' => true
            ]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('swetalert', '`Upsss!`, `Akun mahasiswa belum aktif`, `error`');
            redirect('login');
        }
    } else {
        $this->session->set_flashdata('swetalert', '`Upsss!`, `Password salah`, `error`');
        redirect('login');
         }
     }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('swetalert', '`Good job!`, `Berhasil Logout`, `success`');
        redirect('login');
    }

    public function blocked()
    {
        $this->load->view('content/login/blocked');
    }
}