<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];


// menginput data ke database
$data = mysqli_query($koneksi, "insert into siswa values('','$nis','$nama','$kelas','$jenis_kelamin','$alamat','$status')");

// mengalihkan halaman kembali ke index.php
header("location:../Siswa.php");
