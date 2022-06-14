<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';

// ambil data mahasiswa
$id = $_GET["AssgID"];

// query data mahasiswa berdasarkan id
$asg = query("SELECT * FROM assignment_list WHERE AssgID = $id")[0];


if( isset($_POST["submit"]) ){

    if( ubah($_POST) > 0 ){
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/edit.css" />
</head>
<body>
    <h1>Edit Assignment</h1>

    
    <form action="" method="post" enctype = "multipart/form-data">
    <input type="hidden" name="id" value="<?=$asg["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?=$asg["gambar"]; ?>">
        <ul>
            
            <li>
                <label for="title">Title: </label>
                <input type="text" name="title" id="title" required value="<?=$asg["title"]; ?>">
            </li>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" required value="<?=$asg["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" required value="<?=$asg["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?=$asg["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label> <br>
                <img src="img/<?=$asg["gambar"]?>" alt="" width="60"> <br>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li><button type="submit" name="submit">Ubah data!</button></li>
        </ul>
    </form>


</body>
</html>