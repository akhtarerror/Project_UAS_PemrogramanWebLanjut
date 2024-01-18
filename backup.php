<?php
include 'koneksi.php';

// Fetch Users data
$queryUsers = "SELECT * FROM users";
$resultUsers = mysqli_query($koneksi, $queryUsers);
$dataUsers = array();

while ($rowUsers = mysqli_fetch_assoc($resultUsers)) {
    $dataUsers[] = $rowUsers;
}

// Fetch Mahasiswa data
$queryMahasiswa = "SELECT * FROM mahasiswa";
$resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);
$dataMahasiswa = array();

while ($rowMahasiswa = mysqli_fetch_assoc($resultMahasiswa)) {
    $dataMahasiswa[] = $rowMahasiswa;
}

// Fetch Dosen data
$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
$dataDosen = array();

while ($rowDosen = mysqli_fetch_assoc($resultDosen)) {
    $dataDosen[] = $rowDosen;
}

// Combine Users, Mahasiswa, and Dosen data into a single array
$backupData = array(
    'users' => $dataUsers,
    'mahasiswa' => $dataMahasiswa,
    'dosen' => $dataDosen
);

// Convert the array to JSON format
$backupJson = json_encode($backupData, JSON_PRETTY_PRINT);

// Save the JSON data to a file named admin_pnj.json
$file = fopen('admin_pnj.json', 'w');
fwrite($file, $backupJson);
fclose($file);

// Display an alert message using JavaScript
echo '<script>alert("Backup completed. Data saved to admin_pnj.json");</script>';
