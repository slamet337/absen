<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// function cek_login()
// {
//     $CI = &get_instance();
//     $username = $CI->session->namauser;

//     if ($username == NULL) {
//         $CI->session->set_flashdata('swetalert', 'Silahkan Login Dahulu !!!', 'warning');
//         redirect('login');
//     }
// }

function cek_login()
{
    $CI = &get_instance();

    if (!$CI->session->userdata('is_login')) {
        $CI->session->set_flashdata('swetalert', 'Silakan login terlebih dahulu!', 'warning');
        redirect('login');
    }
}
function check_admin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('is_login') || $ci->session->userdata('role') != 'admin') {
        redirect('login/blocked');
    }
}
function check_mahasiswa()
{
    $CI = &get_instance();
    if ($CI->session->userdata('role') != 'mahasiswa') {
        redirect('login/blocked');
    }
}