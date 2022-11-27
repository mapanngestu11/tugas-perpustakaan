<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = $_POST['password'];



// menginput data ke database
$data = mysqli_query($koneksi, "insert into user values('','$username','$password')");

// mengalihkan halaman kembali ke index.php
header("location:../user.php");
