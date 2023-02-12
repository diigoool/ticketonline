<?php
require "session.php";
require "../koneksi.php";
$queryGenre = mysqli_query($con, "SELECT * FROM genre");
$jumlahGenre = mysqli_num_rows($queryGenre);

$queryTicket = mysqli_query($con, "SELECT * FROM ticket");
$jumlahTicket = mysqli_num_rows($queryTicket);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<style>
  .kotak {
    border: solid;
  }

  .summary-kategori {
    background-color: #517f48;
    border-radius: 15px;
  }

  .summary-produk {
    background-color: #487f7a;
    border-radius: 15px;
  }

  .no-decoration {
    text-decoration: none;
  }
</style>

<body>
  <?php require "navbar.php"; ?>
  <div class="container mt-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <a href="../adminpanel" class="no-decoration text-muted">
            <i class="fa fa-home-user"></i> Home </a>
        </li>
      </ol>
    </nav>
    <h2>Halo Admin</h2>

    <div class="container mt-5">
      <div class="row">


        <div class="col-lg-4 col-md-6">
          <div class="summary-kategori p-3">
            <div class="row">
              <div class="col-6">
                <i class="fa fa-headphones fa-5x text-white"> </i>
              </div>
              <div class="col-6 text-white">
                <h3 class="fs-2">Genre</h3>
                <p class="fs-4"><?php echo $jumlahGenre; ?> Genre Music</p>
                <p><a href="kategori.php" class="text-white no-decoration link-secondary">Lihat Detail</a></p>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-4 col-md-6">
          <div class="summary-produk p-3">
            <div class="row">
              <div class="col-6">
                <i class="fa fa-guitar fa-5x text-white"> </i>
              </div>
              <div class="col-6 text-white">
                <h3 class="fs-2">Ticket</h3>
                <p class="fs-4"><?php echo $jumlahTicket; ?> Ticket Konser</p>
                <p><a href="produk.php" class="text-white no-decoration link-secondary">Lihat Detail</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>