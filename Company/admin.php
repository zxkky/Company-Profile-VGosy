<?php
    session_start();

    if (!isset($_SESSION["token"])) {
      header("Location: ./admin-log.php");   
    }
?>

<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
              <a class="nav-link active" href="admin-out.php">ADMIN</a>
            </li>
          </ul>
        </div>
      </div>
   
  </nav>
  <div class="container" style="margin-top: 80px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
  <div class="mb-3">
    <input class="form-control" id="search-input" type="text" placeholder="Masukan nama  " aria-describedby="search-button">
    </div>
    <form action='delet.php' method='post'>
        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>warning</h5>
              <span>&#9888;</span> 
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
              Apakah anda ingin menghapus?
              <input type='hidden' name='id' id='user_id'>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
              <button type='submit' name='hapus' class='btn btn-danger'>Hapus</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="container">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">


        <tr>
          <th>NO</th>
          <th>Id</th>
          <th>Nama</th>
          <th>email</th>
          <th>Pesan</th>
          <th>gender</th>
          <th>Waktu</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="table-body">
        <?php
        $sql = "SELECT * FROM demo";
        $result = $conn->query($sql);
        $nomor_urut = 1;

        while ($demo = $result->fetch_array()) {
          echo "<tr>";
          echo "<th scope='row'>" . $nomor_urut . "</th>";
          echo "<td>" . $demo['id'] . "</td>";
          echo "<td>" . $demo['name'] . "</td>";
          echo "<td>" . $demo['email'] . "</td>";
          echo "<td>" . $demo['message'] ."</td>";
          echo "<td>" . $demo['gender'] . "</td>";
          echo "<td>" . $demo['waktu'] . "</td>";
          echo "<td>
          
          <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick='hapus($demo[id]);'>
                        Hapus
                        </button>
                        </td>";
                        echo "</tr>";
                        $nomor_urut += 1;
                      }
                      ?>
  
  <!-- <a class='btn btn-primary' href='add.php?id=$demo[id]'>Edit</a> -->
      </tbody>
    </table>
      </div>
      </div>
    <!-- <a class='btn btn-primary' href="tam.php">Tambah Baru</a> -->
    <p class="mt-3">Total: <?php echo mysqli_num_rows($result) ?></p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function hapus(id) {
      const user_id = document.getElementById('user_id');
      user_id.value = id;
    }

    document.addEventListener("DOMContentLoaded", function () {
      const searchInput = document.getElementById("search-input");
      const tableBody = document.getElementById("table-body");
      const rows = tableBody.getElementsByTagName("tr");

      searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();

        Array.from(rows).forEach(function (row) {
          const nameCell = row.querySelector("td:nth-child(2)");
          let rowContainsSearchTerm = false;

          if (nameCell.textContent.toLowerCase().includes(searchTerm)) {
            rowContainsSearchTerm = true;
          }

          if (rowContainsSearchTerm) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        });
      });
    });
  </script>
</body>
</html>

        
     
