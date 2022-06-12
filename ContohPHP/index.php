<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if( isset($_POST["cari"]) ){
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        @media print{
            .print{
                display: none;
            }
        }
    </style>
</head>
<body>
 <a href="logout.php" style="float:left;" class="print">logout</a> 

<h1 style= "text-align: center;">Daftar Mahasiswa</h1>

<a href="tambah.php" style="float:left;" class="print">Tambah data mahasiswa</a>


<br> <br>

<form action="" method="post" class="print">
    <input type="text" name="keyword" size="40" autofocus placeholder="Insert keyword.." autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">search</button>
</form>
<br>

<div id="container">
    <table border = "1" cellpadding = "10" cellspacing = "0" style ="margin: auto">
    <tr>
        <th>No</th>
        <th class="print">Aksi</th>
        <th>Gambar</th>
        <th>nrp</th>
        <th>nama</th>
        <th>email</th>
        <th>jurusan</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach ($mahasiswa as $row): ?>
    <tr>
        <td><?= $i?></td>
        <td class="print">
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin akan menghapus?')">hapus</a>
        </td>
        <td><img src="img/<?= $row["gambar"] ?>" width ="70" alt=""></td>
        <td><?= $row["nrp"] ?></td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["jurusan"] ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</div>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>