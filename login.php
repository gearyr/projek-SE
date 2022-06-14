<?php 
require 'functions.php';

session_start();

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key =  $_COOKIE["key"];

    // ambil username berdasarkan id
    $result = mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if($key === hash('sha256',$row["username"])){
        $_SESSION["login"] = true;
    }

}

if( isset($_SESSION["login"]) ){
    header("Location: index.php");
    exit;
}

$conn = mysqli_connect('localhost','root','','assignmenttracker');


if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    //cek username
    if( mysqli_num_rows($result) === 1){
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password,$row["password"])){
            //set session
            $_SESSION["login"] = true;

            // cek remember me
            if(isset($_POST["remember"])){
                // buat cookie
                setcookie('id',$row["id"],time()+60);
                setcookie('key',hash('sha256',$row["username"]),time()+60);
            }

            header("Location: index.php");
            exit;
        }
    }
    $error = true;

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/registration.css" />
    <title>Login</title>
    <style>
        li{
            list-style: none;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>

<form action="" method="post">
    <div class="container">
        <h1>Login Page</h1>
        <hr />
            <label for="username"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="username" id="username" required>
        
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password"name="password" id="password" required>
        <hr>  
            <button type="submit" name="login" class="registerbtn">Login</button>
       
        <?php if(isset($error)): ?>
            <p style="color:red; font-style:italic; text-align:center">Username atau password salah!</p>
        <?php endif; ?>
        
    </div>
</form>
    <div class="container signin">
        <p>Don't have an account? <u> <a href="registrasi.php">Sign up</a>.</u></p>
    </div>
</body>
</html>
