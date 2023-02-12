<?php
require "session.php";
require "../koneksi.php";

$queryGenre = mysqli_query($con, "SELECT * FROM genre");
$jumlahGenre = mysqli_num_rows($queryGenre);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<style>
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
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fa fa-headphones"></i> Genre
        </li>
      </ol>
    </nav>



    <div class="my-5 col-12 col-md-6">
      <h3>Tambah Genre</h3>
      <form action="" method="post">
        <div>
          <label for="genre" class="">Genre</label>
          <input type="text" id="genre" name="genre" placeholder="Input Nama Genre" class="form-control mt-2">
        </div>
        <div class="mt-3">
          <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
        </div>
      </form>

      <?php
      if (isset($_POST['simpan_kategori'])) {
        $kategori = htmlspecialchars($_POST['genre']);

        $queryExist = mysqli_query($con, "SELECT judul FROM genre WHERE judul='$kategori'");
        $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

        if ($jumlahDataKategoriBaru > 0) {
      ?>
          <div class="alert alert-danger mt-3" role="alert">
            Data Sudah Ada Goblog!
          </div>
          <?php
        } else {
          $querySimpan = mysqli_query($con, "INSERT INTO genre (judul) VALUES ('$kategori')");
          if ($querySimpan) {
          ?>
            <div class="alert alert-primary mt-3" role="alert">
              Data Berhasil di Masukkan!
            </div>
            <meta http-equiv="refresh" content="1 ; url=kategori.php" />
      <?php
          } else {
            echo mysqli_error($con);
          }
        }
      }

      ?>

    </div>

    <div class="mt-3">
      <h2>List Genre</h2>
      <div class="table-responsive mt-5">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($jumlahGenre == 0) {
            ?>
              <tr>
                <td colspan="3" class="text-center"> Data Genre Tidak Ada !</td>
              </tr>
              <?php
            } else {
              $number = 1;
              while ($data = mysqli_fetch_array($queryGenre)) {
              ?>
                <tr>
                  <td><?php echo $number; ?></td>
                  <td><?php echo $data['judul']; ?></td>
                  <td>
                    <a href="kategori-detail.php?id=<?php echo $data['id']; ?>" class="btn btn-info"> <i class="fas fa-search"> </i></a>
                  </td>
                </tr>
            <?php
                $number++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>