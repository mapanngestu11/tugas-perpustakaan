<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Perpustakaan Kita</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">



  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .navbar-background {
      background-color: #27b4a4 !important;
    }

    .navbar-teks {
      color: black;
    }

    .gambar-dashboard {
      width: 450px;
      height: 450px;
    }

    .formulir {
      padding: 5px;
    }

    /* Show it is fixed to the top */
    body {
      min-height: 75rem;
      padding-top: 4.5rem;
    }
  </style>


</head>

<body>

  <nav class="navbar navbar-expand-md navbar-background fixed-top bg-white">
    <div class="container-fluid">
      <a class="navbar-brand navbar-teks" href="#">Perpustakaan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-ite">
            <a class="nav-link active navbar-teks" aria-current="page" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-teks" href="#buku">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-teks" href="kelompok.php">Anggota Kelompok</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>



  <main class="container">
    <div class="bg-light p-5 rounded">
      <div class="row">
        <div class="col-md-6">
          <h1>Mari kita<strong> Giat </strong>Membaca</h1>
          <p class="lead">Makin banyak aku membaca, makin banyak aku memperoleh informasi.</p>
          <form action="add_siswa.php" method="post">
            <div class="row" style="padding:5px;">
              <div class="col-md-6">
                <label>Nis.</label>
                <input name="nis" class="form-control" placeholder="Nis." required>
              </div>
              <div class="col-md-6">
                <label>Nama Lengkap</label>
                <input name="nama" class="form-control" placeholder="Nama kamu" required>
                <input type="hidden" name="status" value="0">
              </div>
            </div>
            <div class="row" style="padding:5px;">
              <div class=" col-md-6">
                <label>Kelas</label>
                <select name="kelas" class="form-control">
                  <option>--Pilih--</option>
                  <option value="X"> X </option>
                  <option value="XI"> XI </option>
                  <option value="XII"> XII </option>
                </select>

                <label style="padding-top: 4px;">Jenis Kelamin</label>
                <select name="" class="form-control">
                  <option>--Pilih--</option>
                  <option value="laki-laki"> Laki-Laki </option>
                  <option value="perempuan"> Perempuan </option>
                </select>
              </div>
              <div class=" col-md-6">
                <label>Alamat</label>
                <textarea class="form-control" name="pesan" rows="4"></textarea>
              </div>

            </div>


            <br>
            <button type="submit" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Daftar Anggota &raquo;</button>
          </form>
        </div>
        <div class="col-md-6">
          <img src="assets/img/undraw_Bibliophile_re_xarc.png" class="gambar-dashboard">
        </div>
      </div>
    </div>
  </main>

  <section class="py-5 text-center container" id="buku">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Daftar <strong>Buku</strong></h1>
        <p class="lead text-muted">Buku adalah sahabat paling setia rela mendampingi di mana pun dan kapan pun tanpa pernah memikirkan dirinya. Sebaik-baik teman sepanjang zaman adalah buku.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Daftar Anggota</a>
          <a href="login.php" class="btn btn-secondary my-2">Login</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        include 'crud/koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from buku");
        while ($d = mysqli_fetch_array($data)) {
        ?>
          <div class="col">
            <div class="card shadow-sm">
              <img id="myImg" src="crud/gambar/<?php echo $d['gambar']; ?>" style="height:200px; max-width:500px">
              <div class="card-body">
                <b><?php echo $d['judul'] ?></b>
                <p class="card-text"><?php echo $d['ringkasan'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalgambar<?php echo $d['id'] ?>">Lihat</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $d['id'] ?>">Pinjam</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>


  <!-- Modal -->
  <?php
  include 'crud/koneksi.php';
  $no = 1;
  $data = mysqli_query($koneksi, "select * from buku");
  while ($d = mysqli_fetch_array($data)) {
  ?>
    <div class="modal fade" id="exampleModal<?php echo $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="pinjam_buku.php" method="POST">
              <div class="row">
                <div class="col-md-10">
                  <label>Nis.</label>
                  <input name="nis" class="form-control" placeholder="nis" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-10">
                  <label>Nama</label>
                  <input name="nama" class="form-control" placeholder="nama" required>
                  <input type="hidden" name="status" value="sedang di pinjam">
                </div>
              </div>
              <div class="row">
                <div class="col-md-10">
                  <label>Judul</label>
                  <input name="judul" class="form-control" value="<?php echo $d['judul'] ?>" readonly>
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-- end -->

  <?php
  include 'crud/koneksi.php';
  $no = 1;
  $data = mysqli_query($koneksi, "select * from buku");
  while ($d = mysqli_fetch_array($data)) {
  ?>
    <div class="modal fade" id="exampleModalgambar<?php echo $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Gambar Cover</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <center>
                  <img id="myImg" src="crud/gambar/<?php echo $d['gambar']; ?>" style="height:200px; max-width:700px">
                </center>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
  <?php } ?>
  <!-- end -->

  </div>
  </div>

  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">

        <a href="#"><img src="assets/img/up.png" style="width: 50px;"></a>
      </p>
      <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    </div>
  </footer>


  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>