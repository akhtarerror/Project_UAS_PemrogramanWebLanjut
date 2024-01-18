<?php
include 'koneksi.php';

$nama_dosen = $_POST["nama_dosen"];
$gelar_dosen = $_POST["gelar_dosen"];
$pendidikan_dosen = $_POST["pendidikan_dosen"];
$prodi_dosen = $_POST["prodi_dosen"];
$nidn_dosen = $_POST["nidn_dosen"];
$nip_dosen = $_POST["nip_dosen"];
$ket_dosen = $_POST["ket_dosen"];

$pesan_error = array();

// Validation for required fields
if (empty($nama_dosen) || empty($gelar_dosen) || empty($pendidikan_dosen) || empty($prodi_dosen) || empty($nidn_dosen) || empty($nip_dosen) || empty($ket_dosen)) {
    $pesan_error[] = "Semua data wajib diisi.";
}

// Check if NIP or NIDN already exists
$check_query = "SELECT * FROM dosen WHERE nip_dosen='$nip_dosen' OR nidn_dosen='$nidn_dosen'";
$check_result = mysqli_query($koneksi, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    $pesan_error[] = "NIP atau NIDN sudah digunakan.";
}

if (!empty($pesan_error)) {
    echo '<script>alert("' . implode('\n', $pesan_error) . '");</script>';
    echo '<script>window.location = "tambah_dosen.php";</script>';
} else {
    mysqli_query($koneksi, "INSERT INTO dosen (nama_dosen, gelar_dosen, pendidikan_dosen, prodi_dosen, nidn_dosen, nip_dosen, ket_dosen) 
    VALUES ('$nama_dosen', '$gelar_dosen', '$pendidikan_dosen', '$prodi_dosen', '$nidn_dosen', '$nip_dosen', '$ket_dosen')");

    echo '<script>alert("Data berhasil ditambahkan.");</script>';
    echo '<script>window.location = "index.php";</script>';
}
