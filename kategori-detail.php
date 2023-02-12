<?php
require "session.php";
require "../koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM genre WHERE id='$id'");
$data = mysqli_fetch_array($query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details Genre</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<body>
  <?php require "navbar.php" ?>
  <div class="container mt-5">
    <h2>Detail Genre</h2>
    <div class="col-12 cold-md-6">
      <form action="" method="post">
        <div>
          <label for="genre">Genre</label>
          <input type="text" name="genre" id="genre" class="form-control mt-1" value="<?php echo $data['judul']; ?>">
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
          <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
        </div>
      </form>
      <?php
      if (isset($_POST['editBtn'])) {
        $genre = htmlspecialchars($_POST['genre']);

        if ($data['judul'] == $genre) {
      ?>
          <meta http-equiv="refresh" content="0; url=kategori.php" />
          <?php
        } else {
          $query = mysqli_query($con, "SELECT * FROM genre WHERE judul= '$genre'");
          $jumlahData = mysqli_num_rows($query);

          if ($jumlahData > 0) {
          ?>
            <div class="alert alert-danger mt-3" role="alert">
              Data Sudah Ada Goblog!
            </div>
            <?php
          } else {
            $querySimpan = mysqli_query($con, "UPDATE genre SET judul='$genre' WHERE id = $id");
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
      }
      if (isset($_POST['deleteBtn'])) {
        $queryDelete = mysqli_query($con, " DELETE FROM genre WHERE id='$id'");
        if ($queryDelete) {
          ?>
          <div class="alert alert-primary mt-3" role="alert">
            Data Berhasil Dihapus
          </div>
          <meta http-equiv="refresh" content="1 ; url=kategori.php" />
      <?php
        } else {
          mysqli_error($con);
        }
      }
      ?>
    </div>
  </div>

  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>