<?php
session_start();

function acakCaptcha()
{
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $pass = array();
    $panjangAlpha = strlen($alphabet) - 2;

    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $panjangAlpha);
        $pass[] = $alphabet[$n];
    }

    return implode($pass);
}

$code = acakCaptcha();
$_SESSION["code"] = $code;

$wh = imagecreatetruecolor(140, 90);

// Ubah warna background menjadi biru (heksadesimal: #add8e6)
$bgc = imagecolorallocate($wh, 0x00, 0x87, 0x97);

// Ubah warna teks menjadi putih (heksadesimal: #ffffff)
$fc = imagecolorallocate($wh, 0xff, 0xff, 0xff);

imagefill($wh, 0, 0, $bgc);

// Ganti path font sesuai kebutuhan Anda
$font = 'font/BrownieStencil-vmrPE.ttf';

$textSize = 25;  // Ukuran font teks captcha

// Hitung posisi untuk meletakkan teks captcha di tengah gambar
$textBox = imagettfbbox($textSize, 0, $font, $code);
$textWidth = $textBox[2] - $textBox[0];
$textX = (imagesx($wh) - $textWidth) / 2;
$textY = (imagesy($wh) + $textSize) / 2; // Sesuaikan dengan ukuran font

// Tambahkan teks captcha ke gambar menggunakan font TrueType
imagettftext($wh, $textSize, 0, $textX, $textY, $fc, $font, $code);

header('content-type: image/png');
imagepng($wh);
imagedestroy($wh);
