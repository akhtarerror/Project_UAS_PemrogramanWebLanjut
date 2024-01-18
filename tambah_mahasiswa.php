<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        .title {
            text-align: center;
        }

        .back {
            width: 84%;
            margin: 20px auto;
        }

        a {
            text-decoration: none;
            color: #0078d4;
            border: 1px solid #0078d4;
            padding: 6px 12px;
            border-radius: 4px;
            margin: 4px;
            display: inline-block;
            font-size: 14px;
        }

        a:hover {
            background-color: #0078d4;
            color: white;
        }

        form {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #888888;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            border: none;
        }

        table,
        th,
        td {
            border: none;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #0078d4;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin: 4px 0;
        }

        button[type="submit"] {
            background-color: #0078d4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;
        }

        button[type="submit"]:hover {
            background-color: #005299;
        }

        .gender-label {
            display: inline-block;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <h2 class="title">Tambah Data Mahasiswa</h2>
    <div class="back">
        <a href="index.php">Kembali</a>
    </div>
    <form method="post" action="tambah_aksi_mahasiswa.php">
        <table>
            <tr>
                <td>Nama Mahasiswa</td>
                <td><input type="text" name="nama_mahasiswa"></td>
            </tr>
            <tr>
                <td>NIM Mahasiswa</td>
                <td><input type="number" name="nim_mahasiswa"></td>
            </tr>

            <tr>
                <td>Prodi Mahasiswa</td>
                <td><select name="prodi_mahasiswa">
                        <option></option>
                        <option value="D4-Teknik Informatika">D4-Teknik Informatika</option>
                        <option value="D4-Teknik Multimedia dan Jaringan">D4-Teknik Multimedia dan Jaringan</option>
                        <option value="D4-Teknik Multimedia Digital">D4-Teknik Multimedia Digital</option>
                        <option value="D1-Teknik Komputer dan Jaringan">D1-Teknik Komputer dan Jaringan</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Kelas Mahasiswa</td>
                <td><input type="text" name="kelas_mahasiswa"></td>
            </tr>

            <tr>
                <td>Angkatan Mahasiswa</td>
                <td><select name="angkatan_mahasiswa">
                        <option></option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Jenis Kelamin Mahasiswa</td>
                <td><select name="gender_mahasiswa">
                        <option></option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Email Mahasiswa</td>
                <td><input type="text" name="email_mahasiswa"></td>
            </tr>

            <tr>
                <td>No Telepon Mahasiswa</td>
                <td><input type="text" name="no_telepon_mahasiswa"></td>
            </tr>

            <tr>
                <td>Status Mahasiswa</td>
                <td><select name="status_mahasiswa">
                        <option></option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>

    </form>
</body>

</html>