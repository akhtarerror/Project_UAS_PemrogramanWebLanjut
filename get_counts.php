<?php
include 'koneksi.php';

// Fetch the count of Mahasiswa
$queryMahasiswaCount = "SELECT COUNT(*) AS mahasiswa_count FROM mahasiswa";
$resultMahasiswaCount = mysqli_query($koneksi, $queryMahasiswaCount);
$rowMahasiswaCount = mysqli_fetch_assoc($resultMahasiswaCount);
$mahasiswaCount = $rowMahasiswaCount['mahasiswa_count'];

// Fetch the count of Dosen
$queryDosenCount = "SELECT COUNT(*) AS dosen_count FROM dosen";
$resultDosenCount = mysqli_query($koneksi, $queryDosenCount);
$rowDosenCount = mysqli_fetch_assoc($resultDosenCount);
$dosenCount = $rowDosenCount['dosen_count'];

// Create an array to store counts
$counts = array(
    'mahasiswaCount' => $mahasiswaCount,
    'dosenCount' => $dosenCount
);

// Send counts as JSON response
header('Content-Type: application/json');
echo json_encode($counts);
