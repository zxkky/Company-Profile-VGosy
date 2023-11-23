<?php
    session_start();
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($username == "admin") {
            if ($password == "adminkece0903") {
                $_SESSION["token"] = "SECRET-$username:$password";
                header("Location: admin.php");
            } else {
                echo "password salah";
                return false;
            }
        } else {
            echo "username salah";
            return false;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Admin Login</title>
    <style>
        body {
            background-image: url('background.jpg'); /* Ganti 'background.jpg' dengan URL gambar latar belakang Anda */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blur: 10px; /* Menambahkan efek blur ke latar belakang */
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Membuat form tembus pandang dengan latar belakang */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary ">

        <div class="container">

        <a class="navbar-brand" href="#">
<img src="image/Screenshot_2023-11-17_201931-removebg-preview.png" alt="" width="45" height="45" class="d-inline-block align-text-center">VGosy</a>


            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header bg-dark">

                    <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">MENU</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

                </div>

                <div class="offcanvas-body bg-primary">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html#Hom">BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Ten">TENTANG KAMI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Jasa">JASA DAN BARANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Lok">LOKASI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Cont">KONTAK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="komentar.php">KOMENTAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin.php">ADMIN LOGIN</a>
                        </li>
                    </ul>


                </div>

            </div>

        </div>

    </nav>

    <div class="container mt-5" style="height: 80vh; display: flex; flex-direction: column;  justify-content: center;">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Admin Login</h2>
                        <form action="admin-log.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</body>

</html>