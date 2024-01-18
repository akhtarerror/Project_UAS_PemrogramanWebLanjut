<?php
$activePage = 'dashboard';
include 'header.php';
session_start();

// Check if the user is not logged in and redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Fetch the count of Mahasiswa
$queryMahasiswaCount = "SELECT COUNT(*) AS mahasiswa_count FROM mahasiswa";
$resultMahasiswaCount = mysqli_query($koneksi, $queryMahasiswaCount);
$rowMahasiswaCount = mysqli_fetch_assoc($resultMahasiswaCount);
$mahasiswaCount = $rowMahasiswaCount['mahasiswa_count'];

// Fetch the count of Dosen
$queryDosenCount = "SELECT COUNT(*) AS dosen_count FROM dosen";
$resultDosenCount = mysqli_query($koneksi, $queryDosenCount);
$rowDosenCount = mysqli_fetch_assoc($resultDosenCount);
$dosenCount = $rowDosenCount['dosen_count'];

// Set the number of records per page
$recordsPerPage = 5;

// Determine current page for Dosen
$currentPageDosen = isset($_GET['page_dosen']) && is_numeric($_GET['page_dosen']) ? $_GET['page_dosen'] : 1;

// Calculate the offset for the SQL query for Dosen
$offsetDosen = ($currentPageDosen - 1) * $recordsPerPage;

// Fetch data from the 'dosen' table with pagination for Dosen
$queryDosen = "SELECT * FROM dosen LIMIT $offsetDosen, $recordsPerPage";
$resultDosen = mysqli_query($koneksi, $queryDosen);

// Determine current page for Mahasiswa
$currentPageMahasiswa = isset($_GET['page_mahasiswa']) && is_numeric($_GET['page_mahasiswa']) ? $_GET['page_mahasiswa'] : 1;

// Calculate the offset for the SQL query for Mahasiswa
$offsetMahasiswa = ($currentPageMahasiswa - 1) * $recordsPerPage;

// Fetch data from the 'mahasiswa' table with pagination for Mahasiswa
$queryMahasiswa = "SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC LIMIT $offsetMahasiswa, $recordsPerPage";
$resultMahasiswa = mysqli_query($koneksi, $queryMahasiswa);

// Fetch data from the 'dosen' table with pagination for Dosen
$queryDosen = "SELECT * FROM dosen ORDER BY id_dosen DESC LIMIT $offsetDosen, $recordsPerPage";
$resultDosen = mysqli_query($koneksi, $queryDosen);

// Check if the query was successful
if (!$resultDosen || !$resultMahasiswa) {
    die("Query failed: " . mysqli_error($koneksi));
}
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
                <a href="#" class="active">Home</a>
            </li>
        </ul>
    </div>
</div>

<!-- dashboard.php -->
<div class="box-info">
    <li>
        <i class="fas fa-user-friends"></i>
        <span class="text">
            <h3 id="mahasiswaCount"><?php echo $mahasiswaCount; ?></h3>
            <p>Mahasiswa</p>
        </span>
    </li>
    <li>
        <i class="fas fa-user-friends"></i>
        <span class="text">
            <h3 id="dosenCount"><?php echo $dosenCount; ?></h3>
            <p>Dosen</p>
        </span>
    </li>
    <li>
        <i class="fas fa-school"></i>
        <span class="text">
            <h3>4</h3>
            <p>Prodi</p>
        </span>
    </li>
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

    <div class="todo">
        <div class="head">
            <h3>Prodi</h3>
        </div>

        <ul class="todo-list">
            <li class="completed">
                <p>D4 Teknik Informatika</p>
                <a href="ti.php" target="_blank">
                    <i class="fas fa-circle-info"></i>
                </a>
            </li>
            <li class="completed">
                <p>D4 Teknik Multimedia Digital</p>
                <a href="tmd.php" target="_blank">
                    <i class="fas fa-circle-info"></i>
                </a>
            </li>
            <li class="completed">
                <p>D4 Teknik Multimedia dan Jaringan</p>
                <a href="tmj.php" target="_blank">
                    <i class="fas fa-circle-info"></i>
                </a>
            </li>
            <li class="completed">
                <p>D1 Teknik Komputer dan Jaringan</p>
                <a href="tkj.php" target="_blank">
                    <i class="fas fa-circle-info"></i>
                </a>
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
                // Loop through the fetched data and display it in the table
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

<script src="js/dashboard.js"></script>

<?php
include 'footer.php';
?>