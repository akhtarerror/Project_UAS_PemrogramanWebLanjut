<?php
session_start();

include("koneksi.php");

// Initialize alert message and color
$alert_message = "";
$alert_color = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST["nama_lengkap"]);
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $email = mysqli_real_escape_string($koneksi, $_POST["email"]);
    $nomor_telepon = mysqli_real_escape_string($koneksi, $_POST["nomor_telepon"]);
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $jenis_kelamin = isset($_POST["jenis_kelamin"]) ? $_POST["jenis_kelamin"] : "";

    // Form validation
    if (empty($nama_lengkap) || empty($username) || empty($email) || empty($nomor_telepon) || empty($password) || empty($jenis_kelamin)) {
        $alert_message = "Semua data wajib diisi.";
    } else {
        // Check if username or email is already used
        $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $check_result = mysqli_query($koneksi, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $alert_message = "Username atau email sudah digunakan.";
        } else {
            // Check confirmation password
            $confirm_password = $_POST["confirmPassword"];
            if ($password != $confirm_password) {
                $alert_message = "Konfirmasi password tidak sesuai.";
            } else {
                // Insert user data into the database
                $query = "INSERT INTO users (nama_lengkap, username, email, nomor_telepon, password, jenis_kelamin) 
                          VALUES ('$nama_lengkap', '$username', '$email', '$nomor_telepon', '$hashed_password', '$jenis_kelamin')";

                $result = mysqli_query($koneksi, $query);

                if ($result) {
                    // Include backup script to backup registered user data
                    include 'backup.php';

                    $alert_message = "Registrasi berhasil!";
                    $alert_color = "success";
                } else {
                    $alert_message = "Error: " . $query . "<br>" . mysqli_error($koneksi);
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Form Register Admin PNJ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/register.css" />
    <style>
        /* Tambahkan CSS untuk pesan alert */
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            /* Warna hijau */
            color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 999;
        }

        .error-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #db504a;
            /* Warna merah */
            color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 999;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="form-title">Register</h1>
        <form action="register.php" method="post">
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Enter Full Name" />
                </div>
                <div class="user-input-box">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Username" />
                </div>
                <div class="user-input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email" />
                </div>
                <div class="user-input-box">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" placeholder="Enter Phone Number" />
                </div>
                <div class="user-input-box">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" />
                </div>
                <div class="user-input-box">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" />
                </div>
            </div>
            <div class="gender-details-box">
                <span class="gender-title">Jenis Kelamin</span>
                <div class="gender-category">
                    <input type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki">
                    <label for="laki-laki">Laki-Laki</label>
                    <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                    <label for="perempuan">Perempuan</label>
                </div>
            </div>
            <div class="form-submit-btn">
                <input type="submit" value="Register">
            </div>
            <div class="login-link">
                <p>Sudah punya akun? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>

    <?php
    // Tampilkan pesan alert jika ada
    if (!empty($alert_message)) {
        // Tambahkan kondisi untuk menentukan warna alert
        $alert_class = ($alert_color == "success") ? "success-message" : "error-message";
        echo "<div class='$alert_class' id='alert-message'>$alert_message</div>";
    }
    ?>

    <script>
        // Tambahkan JavaScript untuk menghilangkan pesan alert setelah 5 detik
        setTimeout(function() {
            var alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                alertMessage.style.display = 'none';
            }

            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000); // 5000 miliseconds = 5 seconds
    </script>
</body>

</html>