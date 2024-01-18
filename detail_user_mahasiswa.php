<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <style>
        thead th:hover {
            color: #008797;
        }
    </style>
</head>

<body>
    <?php
    // Include the database connection
    include 'koneksi.php';

    // Check if the 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $mahasiswaId = $_GET['id'];

        // Fetch data for the specific Mahasiswa using the ID
        $queryMahasiswa = "SELECT * FROM mahasiswa WHERE id_mahasiswa = $mahasiswaId";
        $resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);

        // Check if the query was successful
        if (!$resultMahasiswa) {
            die("Query failed: " . mysqli_error($koneksi));
        }

        // Fetch the Mahasiswa data
        $rowMahasiswa = mysqli_fetch_assoc($resultMahasiswa);
    } else {
        // Redirect or handle the case where 'id' parameter is not set
        header("Location: some_error_page.php");
        exit();
    }
    ?>

    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Detail Mahasiswa</h1>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi Mahasiswa</th>
                        <th>Kelas Mahasiswa</th>
                        <th>Angkatan Mahasiswa</th>
                        <th>Gender Mahasiswa</th>
                        <th>Email Mahasiswa</th>
                        <th>No Telepon Mahasiswa</th>
                        <th>Status Mahasiswa</th>
                        <!-- You can add or remove columns based on your actual mahasiswa table structure -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display the Mahasiswa data in the table
                    echo "<tr>";
                    echo "<td>" . $rowMahasiswa['nim_mahasiswa'] . "</td>";
                    echo "<td>" . $rowMahasiswa['nama_mahasiswa'] . "</td>";
                    echo "<td>" . $rowMahasiswa['prodi_mahasiswa'] . "</td>";
                    echo "<td>" . $rowMahasiswa['kelas_mahasiswa'] . "</td>";
                    echo "<td>" . $rowMahasiswa['angkatan_mahasiswa'] . "</td>";
                    echo "<td>" . $rowMahasiswa['gender_mahasiswa'] . "</td>";
                    echo "<td>" . $rowMahasiswa['email_mahasiswa'] . "</td>";
                    echo "<td>" . $rowMahasiswa['no_telepon_mahasiswa'] . "</td>";
                    echo "<td>" . $rowMahasiswa['status_mahasiswa'] . "</td>";
                    // You can add or remove cells based on your actual mahasiswa table structure
                    echo "</tr>";
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="js/table.js"></script>

</body>

</html>