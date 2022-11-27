<?php
include 'crud/koneksi.php';

// menangkap data yang di kirim dari form
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$judul = $_POST['judul'];
$tanggal_pinjam = date('Y-m-d');
$tanggal_kembali = date('Y-m-d', strtotime($tanggal_pinjam . ' + 10 days'));
$status = $_POST['status'];

$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis = '$nis' AND nama ='$nama' AND status ='1'");
$result = $cek->num_rows;

if ($result) {

    $data =  mysqli_query($koneksi, "INSERT INTO pinjam_buku  VALUES(NULL,'$nis','$nama','$judul','$tanggal_pinjam','$tanggal_kembali','$status')");
    echo "<script type='text/javascript'>alert('Berhasil !');
    window.location='index.php';
    </script>";
} else {
    echo "<script type='text/javascript'>alert('Siswa Tidak Terdaftar / Belum Aktif');
    window.location='index.php';
    </script>";
}
