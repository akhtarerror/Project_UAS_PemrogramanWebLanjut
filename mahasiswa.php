<?php

$activePage = 'mahasiswa';
include 'header.php';

?>


<div class="head-title">
    <div class="left">
        <h1>Dashboard</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <i class="fas fa-chevron-right"></i>
            <li>
                <a href="#" class="active">Mahasiswa</a>
            </li>
        </ul>
    </div>
</div>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Mahasiswa</h3>
            <a href="search_mahasiswa.php" target="_blank">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <a href='detail_mahasiswa.php' target='_blank'>
                <i class="fas fa-circle-info"></i>
            </a>
            <a href="tambah_mahasiswa.php">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>NIM</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php'; // Ensure database connection is included

                // Set the number of records per page
                $recordsPerPage = 5;

                // Determine current page for Mahasiswa
                $currentPageMahasiswa = isset($_GET['page_mahasiswa']) && is_numeric($_GET['page_mahasiswa']) ? $_GET['page_mahasiswa'] : 1;

                // Calculate the offset for the SQL query for Mahasiswa
                $offsetMahasiswa = ($currentPageMahasiswa - 1) * $recordsPerPage;

                // Fetch data from the 'mahasiswa' table with pagination for Mahasiswa
                $queryMahasiswa = "SELECT * FROM mahasiswa LIMIT $offsetMahasiswa, $recordsPerPage";
                $resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);

                // Check if the query was successful
                if (!$resultMahasiswa) {
                    die("Query failed: " . mysqli_error($koneksi));
                }

                // Loop through the fetched data from mahasiswa table and display it in the table
                while ($rowMahasiswa = mysqli_fetch_assoc($resultMahasiswa)) {
                    echo "<tr>";
                    echo "<td><p>" . $rowMahasiswa['nama_mahasiswa'] . "</p></td>";
                    echo "<td>" . $rowMahasiswa['nim_mahasiswa'] . "</td>";
                    echo "<td>
                            <a href='detail_user_mahasiswa.php?id=" . $rowMahasiswa["id_mahasiswa"] . "' target='_blank'><span class='status complete'>Detail</span></a>
                            <a href='edit_mahasiswa.php?id=" . $rowMahasiswa["id_mahasiswa"] . "'><span class='status process'>Ubah</span></a>
                            <a href='hapus_mahasiswa.php?id=" . $rowMahasiswa["id_mahasiswa"] . "'><span class='status pending'>Hapus</span></a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination for Mahasiswa -->
        <div class="pagination">
            <?php
            // Calculate total number of pages for Mahasiswa table
            $totalPagesMahasiswa = ceil(mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM mahasiswa")) / $recordsPerPage);

            // Display previous link if not on the first page for Mahasiswa table
            if ($currentPageMahasiswa > 1) {
                echo "<a href='?page_mahasiswa=" . ($currentPageMahasiswa - 1) . "' class='pagination-link'>&laquo;</a>";
            }

            // Display numbered pagination links for Mahasiswa table
            $startPageMahasiswa = max(1, $currentPageMahasiswa - 2);
            $endPageMahasiswa = min($totalPagesMahasiswa, $startPageMahasiswa + 4);

            for ($i = $startPageMahasiswa; $i <= $endPageMahasiswa; $i++) {
                $activeClass = ($i == $currentPageMahasiswa) ? 'active' : '';
                echo "<a href='?page_mahasiswa=$i' class='pagination-link $activeClass'>$i</a>";
            }

            // Display next link if not on the last page for Mahasiswa table
            if ($currentPageMahasiswa < $totalPagesMahasiswa) {
                echo "<a href='?page_mahasiswa=" . ($currentPageMahasiswa + 1) . "' class='pagination-link'>&raquo;</a>";
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>