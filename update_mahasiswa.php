<?php
include 'koneksi.php';

$id_mahasiswa = $_POST["id_mahasiswa"];
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

// Validation
if (empty($nama_mahasiswa) || empty($nim_mahasiswa) || empty($prodi_mahasiswa) || empty($kelas_mahasiswa) || empty($angkatan_mahasiswa) || empty($gender_mahasiswa) || empty($email_mahasiswa) || empty($no_telepon_mahasiswa) || empty($status_mahasiswa)) {
    $pesan_error[] = "Semua field harus diisi.";
}

// Additional validation for unique fields
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE (nim_mahasiswa = '$nim_mahasiswa' OR email_mahasiswa = '$email_mahasiswa' OR no_telepon_mahasiswa = '$no_telepon_mahasiswa') AND id_mahasiswa != $id_mahasiswa");

if ($row = mysqli_fetch_array($result)) {
    if ($row['nim_mahasiswa'] == $nim_mahasiswa) {
        $pesan_error[] = "NIM sudah digunakan. Harap masukkan NIM yang berbeda.";
    }

    if ($row['email_mahasiswa'] == $email_mahasiswa) {
        $pesan_error[] = "Email sudah digunakan. Harap masukkan Email yang berbeda.";
    }

    if ($row['no_telepon_mahasiswa'] == $no_telepon_mahasiswa) {
        $pesan_error[] = "Nomor Telepon sudah digunakan. Harap masukkan Nomor Telepon yang berbeda.";
    }
}

if (!empty($pesan_error)) {
    echo '<script>alert("' . implode('\n', $pesan_error) . '");</script>';
    echo '<script>window.location = "edit_mahasiswa.php?id=' . $id_mahasiswa . '";</script>';
} else {
    mysqli_query($koneksi, "UPDATE mahasiswa 
        SET nama_mahasiswa='$nama_mahasiswa', nim_mahasiswa='$nim_mahasiswa', prodi_mahasiswa='$prodi_mahasiswa', 
        kelas_mahasiswa='$kelas_mahasiswa', angkatan_mahasiswa='$angkatan_mahasiswa', gender_mahasiswa='$gender_mahasiswa', 
        email_mahasiswa='$email_mahasiswa', no_telepon_mahasiswa='$no_telepon_mahasiswa', status_mahasiswa='$status_mahasiswa' 
        WHERE id_mahasiswa = $id_mahasiswa");

    echo '<script>alert("Data berhasil diupdate.");</script>';
    echo '<script>window.location = "index.php";</script>';
}
