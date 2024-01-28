<?php 
require 'functions.php';

if (isset($_POST["register"]) ) {
    
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert ('User baru berhasil ditambahkan!');
                document.location.href = 'login.php';
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<head>
    <title>Halaman Rgistrasi</title>
    <link rel="stylesheet" href="loginRegister.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Registrasi</h1>
        
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
        <div class="box-input">
            <i class="uil uil-padlock password"></i>
            <label for="password2"></label>
            <input type="password" name="password2" id="password2" placeholder="Confirm Pasword" required>
        </div>
        <div>
            <button type="submit" name="register" class="btn-input">Submit</button>
        </div>
    </form>

</div>

</body>
</html>