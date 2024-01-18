<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin TIK PNJ</title>
    <link rel="stylesheet" href="fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="style.css">
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

        .table-data .head a {
            text-decoration: none;
            color: var(--dark);

        }

        .pagination-link.active {
            background-color: var(--dark-grey);
            color: var(--light);
        }

        .form-input {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <section class="sidebar">
        <a href="#" class="logo">
            <img src="img/logo_pnj.png" alt="" class="logo-img enlarge" />
            <span class="text">Admin TIK PNJ</span>
        </a>

        <ul class="side-menu top">
            <li <?php echo $activePage === 'dashboard' ? 'class="active"' : ''; ?>>
                <a href="index.php" class="nav-link">
                    <i class="fas fa-border-all"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li <?php echo $activePage === 'mahasiswa' ? 'class="active"' : ''; ?>>
                <a href="mahasiswa.php" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="text">Mahasiswa</span>
                </a>
            </li>
            <li <?php echo $activePage === 'dosen' ? 'class="active"' : ''; ?>>
                <a href="dosen.php" class="nav-link">
                    <i class="fas fa-chart-simple"></i>
                    <span class="text">Dosen</span>
                </a>
            </li>
        </ul>

        <ul class="side-menu">
            <li>
                <a href="logout.php" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <section class="content">
        <nav>
            <i class="fas fa-bars menu-btn"></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Cari data..." />
                    <button class="search-btn">
                        <i class="fas fa-search search-icon"></i>
                    </button>
                </div>
            </form>

            <input type="checkbox" hidden id="switch-mode" />
            <label for="switch-mode" class="switch-mode"></label>
        </nav>

        <main>