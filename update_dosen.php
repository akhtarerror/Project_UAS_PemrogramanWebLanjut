<?php
include 'koneksi.php';

$id_dosen = $_POST["id_dosen"];
$nama_dosen = $_POST["nama_dosen"];
$gelar_dosen = $_POST["gelar_dosen"];
$pendidikan_dosen = $_POST["pendidikan_dosen"];
$prodi_dosen = $_POST["prodi_dosen"];
$nidn_dosen = $_POST["nidn_dosen"];
$nip_dosen = $_POST["nip_dosen"];
$ket_dosen = $_POST["ket_dosen"];

$pesan_error = array();

// Validation
if (empty($nama_dosen) || empty($gelar_dosen) || empty($pendidikan_dosen) || empty($prodi_dosen) || empty($nidn_dosen) || empty($nip_dosen) || empty($ket_dosen)) {
    $pesan_error[] = "Semua field harus diisi.";
}

// Additional validation for unique fields
$result = mysqli_query($koneksi, "SELECT * FROM dosen WHERE (nidn_dosen = '$nidn_dosen' OR nip_dosen = '$nip_dosen') AND id_dosen != $id_dosen");

if ($row = mysqli_fetch_array($result)) {
    if ($row['nidn_dosen'] == $nidn_dosen) {
        $pesan_error[] = "NIDN sudah digunakan. Harap masukkan NIDN yang berbeda.";
    }

    if ($row['nip_dosen'] == $nip_dosen) {
        $pesan_error[] = "NIP sudah digunakan. Harap masukkan NIP yang berbeda.";
    }
}

if (!empty($pesan_error)) {
    echo '<script>alert("' . implode('\n', $pesan_error) . '");</script>';
    echo '<script>window.location = "edit_dosen.php?id=' . $id_dosen . '";</script>';
} else {
    mysqli_query($koneksi, "UPDATE dosen 
        SET nama_dosen='$nama_dosen', gelar_dosen='$gelar_dosen', pendidikan_dosen='$pendidikan_dosen', 
        prodi_dosen='$prodi_dosen', nidn_dosen='$nidn_dosen', nip_dosen='$nip_dosen', ket_dosen='$ket_dosen' WHERE id_dosen = $id_dosen");

    echo '<script>alert("Data berhasil diupdate.");</script>';
    echo '<script>window.location = "index.php";</script>';
}
