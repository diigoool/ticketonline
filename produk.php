<?php
require "session.php";
require "../koneksi.php";

$query = mysqli_query($con, "SELECT * FROM ticket ");
$jumlahProduk = mysqli_num_rows($query);

$queryGenre = (mysqli_query($con, "SELECT * FROM genre"));
?>


<!DOCTYPE <html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticket</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<style>
  .no-decoration {
    text-decoration: none;
  }

  form div {
    margin-bottom: 10px;
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
          <i class="fa fa-guitar"></i> Ticket
        </li>
      </ol>
    </nav>

    <div class="my-5 col-12 col-md-6">
      <h3>Tambah Ticket</h3>

      <form action="" method="post" enctype="multipart/form-data">
        <div>
          <label for="judul">Judul</label>
          <input type="text" id="judul" name="judul" class="form-control" autocomplete="off" required>
        </div>
        <div>
          <label for="genre">Genre</label>
          <select name="genre" id="genre" class="form-control" required>
            <option value="">Pilih Satu</option>
            <?php
            while ($data = mysqli_fetch_array($queryGenre)) {
            ?>
              <option value="<?php echo $data['id'] ?>"><?php echo $data['judul']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <label for="harga">Harga</label>
          <input type="number" class="form-control" name="harga">
        </div>
        <div>
          <label for="Gambar">Gambar</label>
          <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
        <div>
          <label for="details"></label>
          <textarea name="details" id="details" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div>
          <label for="ketersediaan_stok">Ketersediaan Stok</label>
          <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
            <option value="tersedia">Tersedia</option>
            <option value="habis">Habis</option>
          </select>
        </div>
        <div>
          <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </div>
      </form>
    </div>

    <div class="mt-3">
      <h2>List Ticket</h2>
      <div class="table-responsive mt-5">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Ketersediaan Stok</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($jumlahProduk == 0) {
            ?>
              <tr>
                <td colspan="5" class="text-center"> Data Ticket Tidak Ada !</td>
              </tr>
              <?php
            } else {
              $jumlah = 1;
              while ($data = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?php echo $jumlah; ?></td>
                  <td><?php echo $data['judul']; ?></td>
                  <td><?php echo $data['kategori_id']; ?></td>
                  <td><?php echo $data['harga']; ?></td>
                  <td><?php echo $data['ketersediaan_stok']; ?></td>
                </tr>
            <?php
                $jumlah++;
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