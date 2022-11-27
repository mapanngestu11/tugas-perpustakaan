<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];


// menginput data ke database
mysqli_query($koneksi, "update siswa set nis='$nis', nama='$nama', kelas='$kelas', jenis_kelamin='$jenis_kelamin', alamat='$alamat', status='$status' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:../Siswa.php");
