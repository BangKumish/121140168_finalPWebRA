<?php
  include 'koneksi.php';
  session_start();

  $selectAll = "SELECT * FROM datagame;";
  $sql = mysqli_query($databaseLink, $selectAll);
  $no = 1;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UAS Pemrograman Web</title>

  <!-- Bootstrap -->
  <link href="utility/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <script src="utility/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Fontawsome -->
  <link rel="stylesheet" href="utility/fontawsome/css/font-awesome.min.css" />

  <!-- DataTables -->
  <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    /* CSS for dark background */
    body.dark-mode {
      background-color: #222;
      color: white;
    }
    body.light-mode {
      background-color: #f5f5f5;
      color: #333;
    }
    </style>

</head>
<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> UAS Pemrograman Web </a>
    </div>
  </nav>

  <!-- Judul -->
  <div class="container-fluid p-3">
    <h1 class="mt-10">Data Game</h1>
    <figure>
      <blockquote class="blockquote">
        <p>Server-Side menggunakan PHP</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        Andreas Sihotang <cite title="Source Title">RA/121140168</cite>
      </figcaption>
    </figure>
    <a href="kelola.php" type="button" class="btn btn-dark mb-3">
      <i class="fa fa-plus"></i>
      Tambah Data
    </a>

    <?php
      if(isset($_SESSION['eksekusi'])):
    ?>
      <div class="alert alert-light alert-dismissible fade show" role="alert">
          <strong>
            <?php
              echo $_SESSION['eksekusi'];
            ?>
          </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      session_destroy();
      endif;
    ?>

    <div class="table-responsive">
      <table id="dt" class="table align-middle display cell-border hover">
        <thead>
          <tr>
            <th>
              <center>No.</center>
            </th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Tanggal Rilis</th>
            <th>Pengembang</th>
            <th>Rating</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($result = mysqli_fetch_assoc($sql)) {
          ?>
            <tr>
              <td>
                <center>
                  <?php echo $no++ ,'.'; ?>
                </center>
              </td>
              <td>
                <?php echo $result['Judul']; ?>
              </td>
              <td>
                <?php echo $result['Genre']; ?>
              </td>
              <td>
                <?php echo $result['tanggalRilis']; ?>
              </td>
              <td>
                <?php echo $result['Pengembang']; ?>
              </td>
              <td>
                <?php echo $result['Rating']; ?>
              </td>
              <td>
                <a href="kelola.php?ubah=<?php echo $result['id']; ?>" type="button" class="btn btn-success">
                  <i class="fa fa-pencil"></i>
                  Edit
                </a>
                <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button" class="btn btn-danger"
                onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
                  <i class="fa fa-trash"></i>
                  Hapus
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

<!-- Inisiasi DataTable -->
<script>
  new DataTable('#dt');
</script>

</html>