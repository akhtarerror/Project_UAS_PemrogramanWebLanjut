<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print - Detail Mahasiswa PNJ</title>
    <style>
        body {
            font-size: 10pt;
            text-align: center;
        }

        /* Define A4 size */
        @page {
            size: A4;
            margin: 20mm;
        }

        /* Set margins for A4 size */
        main {
            page-break-before: always;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: left;
        }

        th,
        td {
            width: 15px;
            /* Fix the width for all columns */
            font-size: 8pt;
            /* Adjust the font size for print readability */
            padding: 5px;
            margin: 3px;
            /* Add margin between each cell */
        }

        /* You can add a media query for smaller screens if needed */
        @media print {
            main {
                margin-top: 20px;
                /* Margin-top for each printed page */
            }

            th,
            td {
                width: auto;
                /* Allow automatic width for printing */
            }
        }


        /* Add other print-specific styles here */
    </style>
</head>

<body>
    <?php
    // Fetch data from the 'mahasiswa' table where prodi_mahasiswa is 'D4-Teknik Informatika'
    include 'koneksi.php';

    $queryMahasiswa = "SELECT * FROM mahasiswa";
    $resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);

    // Check if the query was successful
    if (!$resultMahasiswa) {
        die("Query failed: " . mysqli_error($koneksi));
    }
    ?>

    <main class="table" id="customers_table">
        <h1>Detail Mahasiswa PNJ</h1>
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
                // Loop through the fetched data and display it in the table
                while ($rowMahasiswa = mysqli_fetch_assoc($resultMahasiswa)) {
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
                }
                ?>
            </tbody>
        </table>
    </main>
    <script>
        // Automatically trigger print when the page loads
        window.onload = function() {
            window.print();
        }
    </script>
</body>

</html>