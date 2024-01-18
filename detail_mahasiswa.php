<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <style>
        :root {
            --poppins: "Poppins", sans-serif;
            --lato: "Lato", sans-serif;

            --light: #f9f9f9;
            --green: #008797;
            --light-green: #afc8ad;
            --grey: #eee;
            --dark-grey: #aaaaaa;
            --dark: #162527;
            --red: #db504a;
            --yellow: #ffce26;
            --light-yellow: #fff2c6;
            --orange: #fd7238;
            --light-orange: #ffe0d3;
        }

        body.dark {
            --light: #162527;
            --grey: #040d12;
            --dark: #fbfbfb;
        }

        @media print {
            body {
                font-size: 12pt;
            }

            /* Define A4 size */
            @page {
                size: A4;
                margin: 0;
            }

            /* Set margins for A4 size */
            main {
                page-break-before: always;
                margin: 20mm;
            }

            /* Add other print-specific styles here */
        }

        .print {
            padding: 10px;
            background-color: var(--green);
            color: var(--light);
            border: none;
            outline: none;
            border-radius: 5px;
            cursor: pointer;
            transition: .3s;
        }

        .print:hover {
            background-color: var(--dark);
            color: var(--light);
        }

        thead th:hover {
            color: #008797;
        }

        .table__header h1 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
            margin-bottom: 0.5rem;
        }

        @media only screen and (max-width: 600px) {
            .table__header h1 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <?php
    // Fetch all data from the 'mahasiswa' table
    include 'koneksi.php';

    $queryMahasiswa = "SELECT * FROM mahasiswa";
    $resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);

    // Check if the query was successful
    if (!$resultMahasiswa) {
        die("Query failed: " . mysqli_error($koneksi));
    }
    ?>>

    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Detail Mahasiswa</h1>
            <button class="print" onclick="window.open('detail_mahasiswa_print.php', '_blank')">Print</button>
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
        </section>
    </main>
    <script src="js/table.js"></script>

</body>

</html>