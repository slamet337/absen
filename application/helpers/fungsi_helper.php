<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function cek_login()
{
    $CI = &get_instance();
    $username = $CI->session->namauser;

    if ($username == NULL) {
        $CI->session->set_flashdata('swetalert', 'Silahkan Login Dahulu !!!', 'warning');
        redirect('login');
    }
}

function check_admin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('namauser')) {
        redirect('login');
    } else {
        $role = $ci->session->userdata('role');
        
        if ($role != 1) {
            redirect('login/blocked');
        }
    }
}