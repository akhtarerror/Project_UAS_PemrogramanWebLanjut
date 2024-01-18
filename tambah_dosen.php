<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen</title>
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
    <h2 class="title">Tambah Data Dosen</h2>
    <div class="back">
        <a href="index.php">Kembali</a>
    </div>
    <form method="post" action="tambah_aksi_dosen.php">
        <table>
            <tr>
                <td>Nama Dosen</td>
                <td><input type="text" name="nama_dosen"></td>
            </tr>
            <tr>
                <td>Gelar Dosen</td>
                <td><input type="text" name="gelar_dosen"></td>
            </tr>
            <tr>
                <td>Pendidikan Dosen</td>
                <td>
                    <select name="pendidikan_dosen">
                        <option></option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="D4">D4</option>
                        <!-- Tambahkan opsi sesuai dengan gelar dosen yang diperlukan -->
                    </select>
                </td>
            </tr>

            <tr>
                <td>Home Base Prodi</td>
                <td><select name="prodi_dosen">
                        <option></option>
                        <option value="D4-Teknik Informatika">D4-Teknik Informatika</option>
                        <option value="D4-Teknik Multimedia dan Jaringan">D4-Teknik Multimedia dan Jaringan</option>
                        <option value="D4-Teknik Multimedia Digital">D4-Teknik Multimedia Digital</option>
                        <option value="D1-Teknik Komputer dan Jaringan">D1-Teknik Komputer dan Jaringan</option>
                        <!-- Tambahkan opsi sesuai dengan gelar dosen yang diperlukan -->
                    </select>
                </td>
            </tr>
            <tr>
                <td>NIDN Dosen</td>
                <td><input type="number" name="nidn_dosen"></td>
            </tr>
            <tr>
                <td>NIP Dosen</td>
                <td><input type="number" name="nip_dosen"></td>
            </tr>
            <tr>
                <td>Keterangan Dosen</td>
                <td><select name="ket_dosen">
                        <option></option>
                        <option value="Non PNS">Non PNS</option>
                        <option value="PNS">PNS</option>
                        <option value="CPNS">CPNS</option>
                        <!-- Tambahkan opsi sesuai dengan gelar dosen yang diperlukan -->
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