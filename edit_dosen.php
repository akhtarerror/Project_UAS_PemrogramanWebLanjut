<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id_dosen = '$id'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Barang</title>
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

</head>

<body>
    <h2 class="title">Edit Data Mahasiswa</h2>
    <div class="back">
        <a href="index.php">Kembali</a>
    </div>
    <form method="post" action="update_dosen.php">
        <?php while ($row = mysqli_fetch_array($data)) { ?>
            <table>
                <tr>
                    <td>Nama Dosen</td>
                    <td>
                        <input type="hidden" name="id_dosen" value="<?= $row['id_dosen']; ?>">
                        <input type="text" name="nama_dosen" value="<?= $row['nama_dosen']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Gelar Dosen</td>
                    <td><input type="text" name="gelar_dosen" value="<?= $row['gelar_dosen']; ?>"></td>
                </tr>
                <tr>
                    <td>Pendidikan Dosen</td>
                    <td>
                        <select name="pendidikan_dosen">
                            <option></option>
                            <option value="S1" <?= $row['pendidikan_dosen'] == 'S1' ? 'selected' : ''; ?>>S1</option>
                            <option value="S2" <?= $row['pendidikan_dosen'] == 'S2' ? 'selected' : ''; ?>>S2</option>
                            <option value="S3" <?= $row['pendidikan_dosen'] == 'S3' ? 'selected' : ''; ?>>S3</option>
                            <option value="D4" <?= $row['pendidikan_dosen'] == 'D4' ? 'selected' : ''; ?>>D4</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Home Base Prodi</td>
                    <td>
                        <select name="prodi_dosen">
                            <option></option>
                            <option value="D4-Teknik Informatika" <?= $row['prodi_dosen'] == 'D4-Teknik Informatika' ? 'selected' : ''; ?>>D4-Teknik Informatika</option>
                            <option value="D4-Teknik Multimedia dan Jaringan" <?= $row['prodi_dosen'] == 'D4-Teknik Multimedia dan Jaringan' ? 'selected' : ''; ?>>D4-Teknik Multimedia dan Jaringan</option>
                            <option value="D4-Teknik Multimedia Digital" <?= $row['prodi_dosen'] == 'D4-Teknik Multimedia Digital' ? 'selected' : ''; ?>>D4-Teknik Multimedia Digital</option>
                            <option value="D1-Teknik Komputer dan Jaringan" <?= $row['prodi_dosen'] == 'D1-Teknik Komputer dan Jaringan' ? 'selected' : ''; ?>>D1-Teknik Komputer dan Jaringan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>NIDN Dosen</td>
                    <td><input type="number" name="nidn_dosen" value="<?= $row['nidn_dosen']; ?>"></td>
                </tr>
                <tr>
                    <td>NIP Dosen</td>
                    <td><input type="number" name="nip_dosen" value="<?= $row['nip_dosen']; ?>"></td>
                </tr>
                <tr>
                    <td>Keterangan Dosen</td>
                    <td>
                        <select name="ket_dosen">
                            <option></option>
                            <option value="Non PNS" <?= $row['ket_dosen'] == 'Non PNS' ? 'selected' : ''; ?>>Non PNS</option>
                            <option value="PNS" <?= $row['ket_dosen'] == 'PNS' ? 'selected' : ''; ?>>PNS</option>
                            <option value="CPNS" <?= $row['ket_dosen'] == 'CPNS' ? 'selected' : ''; ?>>CPNS</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Simpan</button></td>
                </tr>
            </table>

        <?php } ?>
    </form>
</body>

</html>