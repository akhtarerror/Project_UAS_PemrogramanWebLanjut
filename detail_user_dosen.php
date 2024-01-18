<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Dosen</title>
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
        $dosenId = $_GET['id'];

        // Fetch data for the specific Dosen using the ID
        $queryDosen = "SELECT * FROM dosen WHERE id_dosen = $dosenId";
        $resultDosen = mysqli_query($koneksi, $queryDosen);

        // Check if the query was successful
        if (!$resultDosen) {
            die("Query failed: " . mysqli_error($koneksi));
        }

        // Fetch the Dosen data
        $rowDosen = mysqli_fetch_assoc($resultDosen);
    } else {
        // Redirect or handle the case where 'id' parameter is not set
        header("Location: some_error_page.php");
        exit();
    }
    ?>

    <main class="table" id="dosen_table">
        <section class="table__header">
            <h1>Detail Dosen</h1>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Gelar Dosen</th>
                        <th>Pendidikan Dosen</th>
                        <th>Prodi</th>
                        <th>Keterangan Dosen</th>
                        <!-- Add more columns based on your actual dosen table structure -->
                        <!-- For example, if you have columns like 'email_dosen', 'phone_dosen', etc., add them here -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display the Dosen data in the table
                    echo "<tr>";
                    echo "<td>" . $rowDosen['nip_dosen'] . "</td>";
                    echo "<td>" . $rowDosen['nidn_dosen'] . "</td>";
                    echo "<td>" . $rowDosen['nama_dosen'] . "</td>";
                    echo "<td>" . $rowDosen['gelar_dosen'] . "</td>";
                    echo "<td>" . $rowDosen['pendidikan_dosen'] . "</td>";
                    echo "<td>" . $rowDosen['prodi_dosen'] . "</td>";
                    echo "<td>" . $rowDosen['ket_dosen'] . "</td>";
                    // Add more cells based on your actual dosen table structure
                    // For example, if you have columns like 'email_dosen', 'phone_dosen', etc., add them here
                    echo "</tr>";
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="js/table.js"></script>

</body>

</html>