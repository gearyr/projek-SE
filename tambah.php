<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
// koneksi ke DBMS
$conn = mysqli_connect('localhost','root','','assignmenttracker');


if( isset($_POST["submit"]) ){

    if( tambah($_POST) > 0 ){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/add.css">
    <title>Add Assignment</title>
    
    <style>
        #title,
        #description,
        #file,
        #deadline,
        #status,
        #link {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        border-radius: 30px;
        background-color: #f1f1f1;
        color : black;
        }
    </style>
</head>
<body>
    
    
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <h1>New Assignment</h1>
            <p>Fill to add assignment</p>
            <hr>
            <label for="title"><b>Title</b></label>
            <input type="text" placeholder="Insert title here..." name="title" id="title" required>
        
            <label for="description"><b>Description</b></label>            <input type="text" placeholder="Insert description here..." name="description" id="description">

            <label for="file"><b>File</b></label>
            <input type="file" name="file" id="file">

            <label for="deadline"><b>Deadline</b></label>
            <input type="datetime-local" name="deadline" id="deadline" required>

            <label for="status"><b>Status</b></label>
            
            <select name="status" id="status">
                <option value="NOT DONE">Not Done</option>
                <option value="ON PROGRESS">On Progress</option>
            </select>
            <hr>
            <button type="submit" name="submit" class="registerbtn">Add</button></li> 
        </div>
        
    </form>
    

</body>
</html>