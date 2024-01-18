<?php
include 'koneksi.php';

// Check if it's an AJAX request
if (isset($_GET['ajax']) && $_GET['ajax'] == true) {
    // AJAX request, handle search and return results
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $queryDosen = "SELECT * FROM dosen WHERE 
                   nip_dosen LIKE '%$search%' OR
                   nidn_dosen LIKE '%$search%' OR
                   nama_dosen LIKE '%$search%' OR
                   gelar_dosen LIKE '%$search%' OR
                   pendidikan_dosen LIKE '%$search%' OR
                   prodi_dosen LIKE '%$search%' OR
                   ket_dosen LIKE '%$search%'";
    $resultDosen = mysqli_query($koneksi, $queryDosen);

    if (!$resultDosen) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    // Return HTML table rows
    while ($rowDosen = mysqli_fetch_assoc($resultDosen)) {
        echo "<tr>";
        echo "<td>" . $rowDosen['nip_dosen'] . "</td>";
        echo "<td>" . $rowDosen['nidn_dosen'] . "</td>";
        echo "<td>" . $rowDosen['nama_dosen'] . "</td>";
        echo "<td>" . $rowDosen['gelar_dosen'] . "</td>";
        echo "<td>" . $rowDosen['pendidikan_dosen'] . "</td>";
        echo "<td>" . $rowDosen['prodi_dosen'] . "</td>";
        echo "<td>" . $rowDosen['ket_dosen'] . "</td>";
        echo "</tr>";
    }
    exit(); // Stop further execution after returning AJAX response
}

// If not an AJAX request, continue with regular page load
$search = isset($_GET['search']) ? $_GET['search'] : '';
$queryDosen = "SELECT * FROM dosen WHERE 
               nip_dosen LIKE '%$search%' OR
               nidn_dosen LIKE '%$search%' OR
               nama_dosen LIKE '%$search%' OR
               gelar_dosen LIKE '%$search%' OR
               pendidikan_dosen LIKE '%$search%' OR
               prodi_dosen LIKE '%$search%' OR
               ket_dosen LIKE '%$search%'";
$resultDosen = mysqli_query($koneksi, $queryDosen);

if (!$resultDosen) {
    die("Query failed: " . mysqli_error($koneksi));
}
?>

<!-- Rest of your HTML code remains unchanged -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cari Data Dosen</title>
    <link rel="stylesheet" type="text/css" href="css/table.css">
</head>

<body>
    <main class="table" id="dosen_table">
        <section class="table__header">
            <h1>Cari Data Dosen</h1>
            <!-- ... -->
            <div class="input-group">
                <form method="GET" action="" id="searchFormDosen">
                    <input type="search" name="search" id="searchInputDosen" autocomplete="off" placeholder="Search Data..." value="<?php echo $search; ?>">
                </form>
            </div>
            <!-- ... -->


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
                        <!-- You can add or remove columns based on your actual dosen table structure -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rowDosen = mysqli_fetch_assoc($resultDosen)) {
                        echo "<tr>";
                        echo "<td>" . $rowDosen['nip_dosen'] . "</td>";
                        echo "<td>" . $rowDosen['nidn_dosen'] . "</td>";
                        echo "<td>" . $rowDosen['nama_dosen'] . "</td>";
                        echo "<td>" . $rowDosen['gelar_dosen'] . "</td>";
                        echo "<td>" . $rowDosen['pendidikan_dosen'] . "</td>";
                        echo "<td>" . $rowDosen['prodi_dosen'] . "</td>";
                        echo "<td>" . $rowDosen['ket_dosen'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInputDosen = document.getElementById('searchInputDosen');
            var searchFormDosen = document.getElementById('searchFormDosen');

            function performSearchDosen() {
                var searchValueDosen = searchInputDosen.value;

                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'search_dosen.php?ajax=true&search=' + encodeURIComponent(searchValueDosen), true);

                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 400) {
                        // Replace the table body with updated data
                        document.getElementById('dosen_table').getElementsByTagName('tbody')[0].innerHTML = xhr.responseText;
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
            searchInputDosen.addEventListener('input', function() {
                performSearchDosen();
            });

            // Prevent form submission on Enter key press
            searchFormDosen.addEventListener('submit', function(event) {
                event.preventDefault();
                performSearchDosen();
            });
        });
    </script>

</body>

</html>