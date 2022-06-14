<?php 

require 'functions.php';

if( isset ($_POST["register"]) ){
    if( register($_POST)>0 ){
        echo "<script>
            alert('User baru berhasil ditambahkan')
        </script>";
    } else{
        echo mysqli_error($conn);
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
    <link rel="stylesheet" href="styles/registration.css">
    <title>Registrasi</title>
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
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr />
       
            <label for="username"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="username" id="username" required>
       

      
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>
      
            <label for="password2"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="password2" id="password2" required>

        <hr>
        <li><button type="submit" name="register" class="registerbtn">Register</button></li>

     
    </div>
    
</form>
    <div class="container signin">
        <p>Already have an account? <u> <a href="login.php">Log in</a>.</u></p>
    </div>
</body>
</html>