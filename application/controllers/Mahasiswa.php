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
	public function profil()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            redirect('login/blocked');
        }

        $nim = $this->session->userdata('nim');
        $data = [
            'title' => 'Profil Saya',
            'mahasiswa' => $this->Models_mahasiswa->getData($nim)->row_array()
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar');
        $this->load->view('content/mahasiswa/profil', $data);
        $this->load->view('layout/footer');
    }
public function uploadPdf()
{
    if ($this->session->userdata('role') != 'mahasiswa') {
        redirect('login/blocked');
    }

    $nim = $this->session->userdata('nim');
    // $upload_path = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'pdf';
$upload_path = FCPATH . 'uploads/pdf/';

    // Buat folder jika belum ada
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    $config = [
        'upload_path'   => $upload_path,
        'allowed_types' => 'pdf',
        'max_size'      => 2048,
        'file_name'     => 'file_' . $nim . '_' . time()
    ];

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('file_pdf')) {
        $error = $this->upload->display_errors('', '');
        $this->session->set_flashdata('swetalert', "`Upsss!`, `$error`, `error`");
    } else {
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];

        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', ['file_pdf' => $file_name]);

        $this->session->set_flashdata('swetalert', '`Good Job!`, `File PDF berhasil diupload`, `success`');
    }

    redirect('mahasiswa/profil');
}

    // Fungsi upload PDF
//     public function uploadPdf()
//     {
//         if ($this->session->userdata('role') != 'mahasiswa') {
//             redirect('login/blocked');
//         }

//         $nim = $this->session->userdata('nim');
//         $upload_path = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'pdf';

// 		 echo "FCPATH: " . FCPATH . "<br>";
//     echo "Upload Path: " . $upload_path . "<br>";
//     echo "Folder Exists: " . (is_dir($upload_path) ? 'Yes' : 'No') . "<br>";
//     echo "Folder Writable: " . (is_writable($upload_path) ? 'Yes' : 'No') . "<br>";
// echo "<pre>";
//     print_r($_FILES);
//     echo "</pre>";

//     // Hentikan eksekusi sementara untuk lihat hasil debug
//     exit;

//         // Cek dan buat folder jika belum ada
//         if (!is_dir($upload_path)) {
//             mkdir($upload_path, 0777, true);
//         }

//         $config = [
//             'upload_path'   => $upload_path,
//             'allowed_types' => 'pdf',
//             'max_size'      => 2048, // 2MB
//             'file_name'     => 'file_' . $nim . '_' . time()
//         ];

//         $this->load->library('upload', $config);

//         if (!$this->upload->do_upload('file_pdf')) {
//             $error = $this->upload->display_errors('', '');
//             $this->session->set_flashdata('swetalert', "`Upsss!`, `$error`, `error`");
//         } else {
//             $upload_data = $this->upload->data();
//             $file_name = $upload_data['file_name'];

//             $this->db->where('nim', $nim);
//             $this->db->update('mahasiswa', ['file_pdf' => $file_name]);

//             $this->session->set_flashdata('swetalert', '`Good Job!`, `File PDF berhasil diupload`, `success`');
//         }

//         redirect('mahasiswa/profil');
//     }

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