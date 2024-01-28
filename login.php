<?php 
session_start();

if (isset ($_SESSION["login"])) {
   header ("Location: index.php");
   exit;
}

require 'functions.php';

if (isset($_POST["login"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

    // cek username 
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        // password_verivy (kebalikan hash. Mengcek string sama atau tidak dengan hash-nya)
        if (password_verify ($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;
            header ("Location: index.php");
            exit;
        }
    }

    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="loginRegister.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Halaman Login</title>
</head>
<body>
<div class="container">

    <h1>Login</h1>
<!-- Notice bila username/password salah -->
<?php if (isset($error) ) : ?>
    <p class="tulisan-salah"
    style="color: red; font-style: italic;">Username / Password salah</p>
<?php endif; ?>

    <form action="" method="post">    
        <div class="box-input">
            <i class="uil uil-user-circle username"></i>
            <label for="username"></label>
            <input type="text" name="username" id="username" placeholder="Enter Your Username" required>
        </div>
        <div class="box-input">
            <i class="uil uil-padlock password"></i>
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Enter Your Pasword" required>
        </div>

        <button type="submit" name="login" class="btn-input">Login</button>
        
        <div class="login_signup">Don't have an account? 
          <a href="registrasi.php"> Signup</a>
        </div>
    </form>
</div>
    
</body>
</html>