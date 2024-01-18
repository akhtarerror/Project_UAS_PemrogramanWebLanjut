<?php
$activePage = 'dosen';
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
                <a href="#" class="active">Dosen</a>
            </li>
        </ul>
    </div>
</div>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Dosen</h3>
            <a href="search_dosen.php" target="_blank">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <a href='detail_dosen.php' target='_blank'>
                <i class="fas fa-circle-info"></i>
            </a>
            <a href="tambah_dosen.php">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Dosen</th>
                    <th>NIDN</th>
                    <th>NIP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php'; // Ensure database connection is included

                // Set the number of records per page
                $recordsPerPage = 5;

                // Determine current page for Dosen
                $currentPageDosen = isset($_GET['page_dosen']) && is_numeric($_GET['page_dosen']) ? $_GET['page_dosen'] : 1;

                // Calculate the offset for the SQL query for Dosen
                $offsetDosen = ($currentPageDosen - 1) * $recordsPerPage;

                // Fetch data from the 'dosen' table with pagination for Dosen
                $queryDosen = "SELECT * FROM dosen LIMIT $offsetDosen, $recordsPerPage";
                $resultDosen = mysqli_query($koneksi, $queryDosen);

                // Check if the query was successful
                if (!$resultDosen) {
                    die("Query failed: " . mysqli_error($koneksi));
                }

                // Loop through the fetched data from dosen table and display it in the table
                while ($rowDosen = mysqli_fetch_assoc($resultDosen)) {
                    echo "<tr>";
                    echo "<td><p>" . $rowDosen['nama_dosen'] . "</p></td>";
                    echo "<td>" . $rowDosen['nidn_dosen'] . "</td>";
                    echo "<td>" . $rowDosen['nip_dosen'] . "</td>";
                    echo "<td>
                            <a href='detail_user_dosen.php?id=" . $rowDosen["id_dosen"] . "' target='_blank'><span class='status complete'>Detail</span></a>
                            <a href='edit_dosen.php?id=" . $rowDosen["id_dosen"] . "'><span class='status process'>Ubah</span></a>
                            <a href='hapus_dosen.php?id=" . $rowDosen["id_dosen"] . "'><span class='status pending'>Hapus</span></a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination for Dosen -->
        <div class="pagination">
            <?php
            // Calculate total number of pages for Dosen table
            $totalPagesDosen = ceil(mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dosen")) / $recordsPerPage);

            // Display previous link if not on the first page for Dosen table
            if ($currentPageDosen > 1) {
                echo "<a href='?page_dosen=" . ($currentPageDosen - 1) . "' class='pagination-link'>&laquo;</a>";
            }

            // Display numbered pagination links for Dosen table
            $startPageDosen = max(1, $currentPageDosen - 2);
            $endPageDosen = min($totalPagesDosen, $startPageDosen + 4);

            for ($i = $startPageDosen; $i <= $endPageDosen; $i++) {
                $activeClass = ($i == $currentPageDosen) ? 'active' : '';
                echo "<a href='?page_dosen=$i' class='pagination-link $activeClass'>$i</a>";
            }

            // Display next link if not on the last page for Dosen table
            if ($currentPageDosen < $totalPagesDosen) {
                echo "<a href='?page_dosen=" . ($currentPageDosen + 1) . "' class='pagination-link'>&raquo;</a>";
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>