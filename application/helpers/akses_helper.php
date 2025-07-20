<?php
defined('BASEPATH') or exit('No direct script access allowed');

function cek_akses_presensi($sessiongugus)
{
    date_default_timezone_set('Asia/Makassar');

    $today = date('d');
    $now = date('H:i');

    $lastChar = substr($sessiongugus, -1);
    $isZoom = strpos($sessiongugus, 'Z') !== false;

    $kodeTanggal = [
        'A' => '19',
        'B' => '29'
    ];

    $jamMulai = '11:20';
    $jamSelesai = '10:30';

    if ($isZoom && isset($kodeTanggal[$lastChar])) {
        if ($today == $kodeTanggal[$lastChar]) {
            if ($now >= $jamMulai && $now < $jamSelesai) {
                return true;
            }
        }
    }

    return false;
}