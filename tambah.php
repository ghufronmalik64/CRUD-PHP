<?php
 session_start();

 if (!isset ($_SESSION["login"])) {
    header ("Location: login.php");
    exit;
}
 
require 'functions.php';

// cek apakah tombol submit sudah sitekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo " 
        <script>
        alert('Data berhasil ditambahkan!😋');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan! 🤣🤣🤣🤣');
        document.location.href = 'tambah.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambahUbah.css">
    <title>Tambah data Mahasiswa</title>
</head>
<body>
    <div class="container">
        
        <h1 class="tulisan-tambah">Tambah data mahasiswa</h1>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box-form">
                <div class="">
                    <label for="nim">NIM :</label>
                    <input type="text" name="nim" id="nim" autofocus placeholder="Masukkan NIM" autocomplete="on" required class="form-data">
                </div>
                <div class="">
                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama" autocomplete="on" required class="form-data">
                </div>
                <div class="">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan email" autocomplete="on" required class="form-data">
                </div>
                <div class="">
                    <label for="jurusan">Jurusan :</label>
                    <input type="text" name="jurusan" id="jurusan" placeholder="Masukkan jurusan" autocomplete="on" required class="form-data">
                </div>
                <div class="">
                    <label for="gambar">Foto :</label>
                    <input type="file" name="gambar" id="gambar" placeholder="Masukkan file jpg/png/jpeg" autocomplete="on" required class="form-data">
                </div>
                <div class="">
                    <button type="submit" name="submit" class="tombol-tambah">Tambah Data</button>
                </div>
            </div>
        </form>

    </div>

</body>
</html>
