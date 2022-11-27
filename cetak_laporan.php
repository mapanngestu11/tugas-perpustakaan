<?php

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

// var_dump($tgl1, $tgl2);
// die;

?>

<!DOCTYPE html>
<html>

<head>
    <title>CETAK LAPORAN PERPUSTAKAAN</title>
</head>

<body>

    <center>

        <h2>DATA LAPORAN PERPUSTAKAAN</h2>
        <h4>PERPUSTAKAAN SEKOLAH</h4>

    </center>

    <?php
    include 'crud/koneksi.php';
    ?>

    <table border="1" style="width: 100%">
        <tr>
            <th width="1%">No</th>
            <th>Nis.</th>
            <th>Nama</th>
            <th>Buku</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
        <?php
        $no = 1;
        $sql = mysqli_query($koneksi, "SELECT * FROM pinjam_buku
        WHERE tanggal_pinjam BETWEEN '$tgl1' AND '$tgl2';");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['tanggal_kembali']; ?></td>
                <td><?php echo $data['status']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <script>
        window.print();
    </script>

</body>

</html>