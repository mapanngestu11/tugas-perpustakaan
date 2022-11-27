<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Data Perpustakaan</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

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
    </style>


    <!-- Custom styles for this template -->
    <link href="assets/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Data Perpustakaan</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="Login.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <?php include 'menu.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Data Siswa</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>

                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="crud/add_siswa.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nis.</label>
                                            <input name="nis" class="form-control" placeholder="nis" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nama Lengkap</label>
                                            <input name="nama" class="form-control" placeholder="nama" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Kelas</label>
                                            <select class="form-control" name="kelas" required>
                                                <option value="">--Pilih--</option>
                                                <option value="X"> X </option>
                                                <option value="XI"> XI </option>
                                                <option value="XII"> XII </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" required>
                                                <option value="">--Pilih--</option>
                                                <option value="laki-laki"> Laki-Laki </option>
                                                <option value="perempuan"> Perempuan </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat"></textarea>
                                            <input type="hidden" name="status" value="1">
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
                <!-- end -->

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'crud/koneksi.php';
                        $no = 1;
                        $data = mysqli_query($koneksi, "select * from siswa");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nis']; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['kelas']; ?></td>
                                <td>
                                    <?php
                                    if ($d['status'] == 1) {
                                        echo "Aktif";
                                    } else {
                                        echo "Belum Aktif";
                                    }
                                    ?>
                                </td>
                                <td><button class="btn btn-warning btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $d['id'] ?>" style="color: white;">Edit</button> <a href="crud/delete_siswa.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-rounded">Hapus</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>


            </main>
        </div>
    </div>


    <!-- edit -->

    <!-- Modal -->
    <?php
    include 'crud/koneksi.php';
    $no = 1;
    $data = mysqli_query($koneksi, "select * from siswa");
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
                        <form action="crud/update_siswa.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nis.</label>
                                    <input name="nis" class="form-control" placeholder="nis" value="<?php echo $d['nis']; ?>" required>
                                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Lengkap</label>
                                    <input name="nama" class="form-control" value="<?php echo $d['nama']; ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Kelas</label>
                                    <select class="form-control" name="kelas" required>
                                        <option value="<?php echo $d['kelas']; ?>"><?php echo $d['kelas']; ?> </option>
                                        <option value="X"> X </option>
                                        <option value="XI"> XI </option>
                                        <option value="XII"> XII </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="<?php echo $d['jenis_kelamin']; ?>"><?php echo $d['jenis_kelamin']; ?></option>
                                        <option value="laki-laki"> Laki-Laki </option>
                                        <option value="perempuan"> Perempuan </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat"><?php echo $d['alamat']; ?></textarea>
                                    <input type="hidden" name="status" value="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="<?php echo $d['status']; ?>"><?php
                                                                                    if ($d['status'] == 1) {
                                                                                        echo "Aktif";
                                                                                    } else {
                                                                                        echo "Tidak Aktif";
                                                                                    } ?></option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
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

    <!-- end -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="assets/dashboard.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>