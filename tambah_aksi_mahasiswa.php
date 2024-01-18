<?php
include 'koneksi.php';

$nama_mahasiswa = $_POST["nama_mahasiswa"];
$nim_mahasiswa = $_POST["nim_mahasiswa"];
$prodi_mahasiswa = $_POST["prodi_mahasiswa"];
$kelas_mahasiswa = $_POST["kelas_mahasiswa"];
$angkatan_mahasiswa = $_POST["angkatan_mahasiswa"];
$gender_mahasiswa = $_POST["gender_mahasiswa"];
$email_mahasiswa = $_POST["email_mahasiswa"];
$no_telepon_mahasiswa = $_POST["no_telepon_mahasiswa"];
$status_mahasiswa = $_POST["status_mahasiswa"];

$pesan_error = array();

// Validation for required fields
if (empty($nama_mahasiswa) || empty($nim_mahasiswa) || empty($prodi_mahasiswa) || empty($kelas_mahasiswa) || empty($angkatan_mahasiswa) || empty($gender_mahasiswa) || empty($email_mahasiswa) || empty($no_telepon_mahasiswa) || empty($status_mahasiswa)) {
    $pesan_error[] = "Semua data wajib diisi.";
}

// Check if NIM, email, or phone number already exists
$check_query = "SELECT * FROM mahasiswa WHERE nim_mahasiswa='$nim_mahasiswa' OR email_mahasiswa='$email_mahasiswa' OR no_telepon_mahasiswa='$no_telepon_mahasiswa'";
$check_result = mysqli_query($koneksi, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    $pesan_error[] = "NIM, email, atau nomor telepon sudah digunakan.";
}

if (!empty($pesan_error)) {
    echo '<script>alert("' . implode('\n', $pesan_error) . '");</script>';
    echo '<script>window.location = "tambah_mahasiswa.php";</script>';
} else {
    mysqli_query($koneksi, "INSERT INTO mahasiswa (nama_mahasiswa, nim_mahasiswa, prodi_mahasiswa, kelas_mahasiswa, angkatan_mahasiswa, gender_mahasiswa, email_mahasiswa, no_telepon_mahasiswa, status_mahasiswa) 
    VALUES ('$nama_mahasiswa', '$nim_mahasiswa', '$prodi_mahasiswa', '$kelas_mahasiswa', '$angkatan_mahasiswa', '$gender_mahasiswa', '$email_mahasiswa', '$no_telepon_mahasiswa', '$status_mahasiswa')");

    echo '<script>alert("Data berhasil ditambahkan.");</script>';
    echo '<script>window.location = "index.php";</script>';
}
