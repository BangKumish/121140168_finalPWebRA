<!DOCTYPE html>
<?php
  include 'koneksi.php';
  session_start();

  $idGame = "";
  $judulGame = "";
  $genre = "";
  $tanggalRilis= "";
  $pengembang= "";
  $rating= "";

  if(isset($_GET['ubah'])){

    $idGame = $_GET['ubah'];
    $updateQuery = "SELECT * FROM datagame WHERE id = '$idGame';";
    $sql = mysqli_query($databaseLink, $updateQuery);

    $result = mysqli_fetch_assoc($sql);

    $judulGame = $result['Judul'];
    $genre = $result['Genre'];
    $tanggalRilis= $result['tanggalRilis'];
    $pengembang= $result['Pengembang'];
    $rating= $result['Rating'];

    // var_dump($result);

    // die();
  }
?>

<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UAS Pemrograman Web</title>

  <!-- Bootstrap -->
  <link href="utility/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="utility/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="utility/fontawsome/css/font-awesome.min.css" />
</head>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> UAS Pemrograman Web </a>
    </div>
  </nav>

  <div class="container p-3">
    <form method="POST" action="proses.php">
      <input type="hidden" value="<?php echo $idGame?>" name="id"/>
      <div class="mb-3 row">
        <label for="inputJudul" class="col-sm-2 col-form-label"> 
          Judul 
        </label>
        <div class="col-sm-10">
          <input required type="text" name="judul" class="form-control" id="inputJudul" placeholder="ex: Mobile Legend" value="<?php echo $judulGame?>"/>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputGenre" class="col-sm-2 col-form-label"> 
          Genre 
        </label>
        <div class="col-sm-10">
          <input required type="text" name="genre" class="form-control" id="inputGenre" placeholder="ex: Moba" value="<?php echo $genre?>"/>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputTanggalRilis" class="col-sm-2 col-form-label">
          Tanggal Rilis
        </label>
        <div class="col-sm-10">
          <input required type="text" name="tanggalRilis" class="form-control" id="inputTanggalRilis" placeholder="ex: 2015" value="<?php echo $tanggalRilis?>"/>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPengembang" class="col-sm-2 col-form-label">
          Pengembang
        </label>
        <div class="col-sm-10">
          <input required type="text" name="pengembang" class="form-control" id="inputPengembang" placeholder="ex: Moonton" value="<?php echo $pengembang?>"/>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputRating" class="col-sm-2 col-form-label">
          Rating
        </label>
        <div class="col-sm-10">
          <input required type="text" name="rating" class="form-control" id="Rating" placeholder="ex: 6.9" value="<?php echo $rating?>"/>
        </div>
      </div>

      <div class="mb-3 row">
        <div class="col">
        <button type="button" id="removeRequiredBtn" class="btn btn-warning">Remove Required</button>
          <?php
          if (isset($_GET['ubah'])) {
          ?>
            <button type="submit" name="aksi" value="update" class="btn btn-primary">
              <i class="fa fa-floppy-o" aria-hidden="true"></i>
              Simpan Perubahan
            </button>
          <?php
          } else {
          ?>
            <button type="submit" name="aksi" value="create" class="btn btn-primary">
              <i class="fa fa-floppy-o" aria-hidden="true"></i>
              Tambahkan
            </button>
          <?php
          }
          ?>
          <a href="index.php" type="button" class="btn btn-danger">
            <i class="fa fa-times" aria-hidden="true"></i>
            Batal</a>
        </div>
      </div>

    </form>
  </div>
</body>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input');

    function removeRequired() {
      inputs.forEach(function(input) {
        input.removeAttribute('required');
      });
    }

    document.getElementById('removeRequiredBtn').addEventListener('click', function() {
      removeRequired();
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input');
    const submitBtn = document.querySelector('[type="submit"]');

    function validateInputs() {
      let isValid = true;

      inputs.forEach(function(input) {
        if (input.hasAttribute('required') && !input.value.trim()) {
          isValid = false;
          input.classList.add('is-invalid');
        } else {
          input.classList.remove('is-invalid');
        }
      });

      return isValid;
    }

    form.addEventListener('submit', function(event) {
      if (!validateInputs()) {
        event.preventDefault();
      }
    });
  });
</script>


</html>