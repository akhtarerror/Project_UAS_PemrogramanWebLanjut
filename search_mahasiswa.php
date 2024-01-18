<?php
include 'koneksi.php';

// Check if it's an AJAX request
if (isset($_GET['ajax']) && $_GET['ajax'] == true) {
    // AJAX request, handle search and return results
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $queryMahasiswa = "SELECT * FROM mahasiswa WHERE 
                       nim_mahasiswa LIKE '%$search%' OR
                       nama_mahasiswa LIKE '%$search%' OR
                       prodi_mahasiswa LIKE '%$search%' OR
                       kelas_mahasiswa LIKE '%$search%' OR
                       angkatan_mahasiswa LIKE '%$search%' OR
                       gender_mahasiswa LIKE '%$search%' OR
                       email_mahasiswa LIKE '%$search%' OR
                       no_telepon_mahasiswa LIKE '%$search%' OR
                       status_mahasiswa LIKE '%$search%'";
    $resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);

    if (!$resultMahasiswa) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    // Return HTML table rows
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
        echo "</tr>";
    }
    exit(); // Stop further execution after returning AJAX response
}

// If not an AJAX request, continue with regular page load
$search = isset($_GET['search']) ? $_GET['search'] : '';
$queryMahasiswa = "SELECT * FROM mahasiswa WHERE 
                   nim_mahasiswa LIKE '%$search%' OR
                   nama_mahasiswa LIKE '%$search%' OR
                   prodi_mahasiswa LIKE '%$search%' OR
                   kelas_mahasiswa LIKE '%$search%' OR
                   angkatan_mahasiswa LIKE '%$search%' OR
                   gender_mahasiswa LIKE '%$search%' OR
                   email_mahasiswa LIKE '%$search%' OR
                   no_telepon_mahasiswa LIKE '%$search%' OR
                   status_mahasiswa LIKE '%$search%'";
$resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);

if (!$resultMahasiswa) {
    die("Query failed: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cari Data mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="css/table.css">
</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Cari Data Mahasiswa</h1>
            <div class="input-group">
                <form method="GET" action="" id="searchForm">
                    <input type="search" name="search" id="searchInput" autocomplete="off" placeholder="Search Data..." value="<?php echo $search; ?>">
                </form>
            </div>

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
                    </tr>
                </thead>
                <tbody>
                    <?php
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
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');
            var searchForm = document.getElementById('searchForm');

            function performSearch() {
                var searchValue = searchInput.value;

                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'search_mahasiswa.php?ajax=true&search=' + encodeURIComponent(searchValue), true);

                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 400) {
                        // Replace the table body with updated data
                        document.getElementById('customers_table').getElementsByTagName('tbody')[0].innerHTML = xhr.responseText;
                    } else {
                        console.error('Error while fetching data.');
                    }
                };

                xhr.onerror = function() {
                    console.error('Request failed.');
                };

                xhr.send();
            }

            // Trigger search on input change
            searchInput.addEventListener('input', function() {
                performSearch();
            });

            // Prevent form submission on Enter key press
            searchForm.addEventListener('submit', function(event) {
                event.preventDefault();
                performSearch();
            });
        });
    </script>


</body>

</html>