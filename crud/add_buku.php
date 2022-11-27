<?php
include 'koneksi.php';
$judul = $_POST['judul'];
$ringkasan = $_POST['ringkasan'];


$rand = rand();
$ekstensi = array('pdf', 'jpg', 'png', 'jpeg');
$filename = $_FILES['file']['name'];
$ukuran = $_FILES['file']['size'];
$filename1 = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$ext1 = pathinfo($filename1, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
    echo "<script type='text/javascript'>alert('Gagal, File Ekstensi berbeda !');
    window.location='../buku.php';
    </script>";
} else {
    if ($ukuran < 10044070) {
        $xx = $rand . '_' . $filename;
        $xx1 = $rand . '_' . $filename1;
        move_uploaded_file($_FILES['file']['tmp_name'], 'pdf/' . $rand . '_' . $filename);
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/' . $rand . '_' . $filename1);
        mysqli_query($koneksi, "INSERT INTO buku VALUES(NULL,'$judul','$ringkasan','$xx','$xx1')");
        echo "<script type='text/javascript'>alert('Berhasil !');
        window.location='../buku.php';
        </script>";
    } else {
        header("location:../buku.php?alert=gagak_ukuran");
    }
}
