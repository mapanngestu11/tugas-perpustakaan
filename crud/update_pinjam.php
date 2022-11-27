<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$judul =  $_POST['judul'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$status = $_POST['status'];

// menginput data ke database
mysqli_query($koneksi, "update pinjam_buku set nis='$nis', nama='$nama',judul='$judul',tanggal_kembali='$tanggal_kembali', status='$status' where id='$id'");


// mengalihkan halaman kembali ke index.php
header("location:../peminjam.php");
