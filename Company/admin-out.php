<?php
    session_start();
    if (isset($_POST["logout"])) {
        session_destroy();
        header("Location: index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
  <title>Document</title>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
      navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
          navLinks.forEach(function (link) {
            link.classList.remove("active");
          });
          this.classList.add("active");
        });
      });
    });
  </script>
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <div class="container">
    <a class="navbar-brand" href="#">
<img src="image/Screenshot_2023-11-17_201931-removebg-preview.png" alt="" width="45" height="45" class="d-inline-block align-text-center">VGosy</a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header bg-dark">
          <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">MENU</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-primary">
          <ul class="navbar-nav ms-auto">
            <!-- <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#Hom">BERANDA</a>
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
              <a class="nav-link" href="index.php">KOMENTAR</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link active" href="admin.php">ADMIN</a>
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
                        <h2 class="card-title text-center">Admin Log out</h2>
                        
                          
                            <form style="text-align:center">
                                  <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal' >log Out</button>
                                  <a class="btn btn-primary" type="submit" href="admin.php">Kembali</a>
                                </form>
                             

          <form action='admin-out.php' method='post'>
        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>warning</h5>
              <span>&#9888;</span> 
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
              Apakah anda ingin keluar?
              <input type='hidden' name='id' id='user_id'>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal' >Close</button>
              <button type='submit' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal' name="logout">Log Out</button>
            </div>
          </div>
        </div>
      </div>
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
</body>
</html>