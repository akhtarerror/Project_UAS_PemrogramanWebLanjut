<?php
session_start();

include("koneksi.php");

$error_message = ""; // Initialize error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];
    $user_captcha = $_POST['kode_captcha'];

    // Validate captcha
    if (!isset($_SESSION["code"]) || strtolower($user_captcha) !== strtolower($_SESSION["code"])) {
        $error_message = "Captcha salah. Silakan coba lagi.";
    } else {
        // Query to retrieve hashed password from the database
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($koneksi, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row["password"];

            // Verify password using password_verify
            if (password_verify($password, $stored_password)) {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['login_success'] = true;

                // Clear captcha session after successful login
                unset($_SESSION['code']);

                header("Location: index.php");
                exit();
            } else {
                $error_message = "Username atau password salah.";
            }
        } else {
            $error_message = "Username atau password salah.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login Admin PNJ</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        /* Tambahkan CSS untuk pesan error */
        .error-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #db504a;
            /* Warna merah */
            color: #ffffff;
            /* Warna putih */
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 999;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <img src="captcha.php" alt="gambar" class="captcha">
            <div class="input-box">
                <input type="text" id="kode_captcha" name="kode_captcha" maxlength="5" placeholder="Captcha" required>
                <i class='bx bxs-check-shield'></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Belum punya akun? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>

    <?php
    // Display error message if any
    if (!empty($error_message)) {
        echo "<div class='error-message' id='error-message'>$error_message</div>";
    }
    ?>

    <script>
        // Tambahkan JavaScript untuk menghilangkan pesan error setelah 5 detik
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000); // 5000 miliseconds = 5 seconds
    </script>
</body>

</html>