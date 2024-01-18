<?php
include 'koneksi.php';

function deleteData($koneksi, $id)
{
    $id = mysqli_real_escape_string($koneksi, $id);
    $result = mysqli_query($koneksi, "DELETE FROM dosen WHERE id_dosen = '$id'");

    return $result;
}

$id = $_GET['id'];

if (isset($id) && is_numeric($id)) {
    // Check if the form is submitted and confirmation is received
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
        $deleted = deleteData($koneksi, $id);

        if ($deleted) {
            echo '<script>alert("Data berhasil dihapus.");</script>';
        } else {
            echo '<script>alert("Gagal menghapus data.");</script>';
        }

        echo '<script>window.location = "index.php";</script>';
        exit;
    }
} else {
    echo '<script>alert("ID tidak valid.");</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        div {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #0078d4;
        }

        p {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: space-between;
        }

        button {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333;
        }

        a {
            text-decoration: none;
            color: #0078d4;
            padding: 10px 20px;
            border: 1px solid #0078d4;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        a:hover {
            background-color: #0078d4;
            color: white;
        }
    </style>
</head>

<body>

    <div>
        <h2>Konfirmasi Hapus Data</h2>
        <p>Apakah Anda yakin ingin menghapus data ini?</p>
        <form method="post" action="hapus_dosen.php?id=<?php echo $id; ?>">
            <a href="index.php">Batal</a>
            <button type="submit" name="confirm_delete">Ya, Hapus</button>
        </form>

    </div>
</body>

</html>