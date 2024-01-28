<?php
session_start();

if (!isset ($_SESSION["login"])) {
    header ("Location: login.php");
    exit;
}
 
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if(isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&family=Rubik+Doodle+Shadow&display=swap');

         body {
            font-family: sans-serif;
            position: relative;
            height: 100vh;
            width: 100%;
            background: url(img/garis.jpg);
            background-size: cover;
            background-position: center;
        }

        /* Navigasi Atas */
        .navbar {
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            padding: 25px 40px;
            background-color: rgba(87, 89, 93, 0.768);
            border-bottom: 20px;
            position: scroll;
        }
    
        .navbar-nav {
            display: inline-flex;
        }

        .logo {
            color: bisque;
            font-style: italic; 
            font-size: large;
        }

        .cari {
            display: inline-block;
            margin-inline: 150px;
        }

        .button-cari {
            background-color: salmon; 
            color: white;
            cursor: pointer;
        }
        
        .navbar .navbar-nav a {
            color: black;
            font-size: 1.4rem;
            margin: 0 1rem;
        } 

        .navbar .navbar-nav a:hover {
            color: bisque;
            transition: 0.4s ease-in-out;
        }

        /* Judul */
        .judul {
            text-align: center; 
            color: black;
            font-style: bold;
        }

        /* Tabel */
        .con-judul {
            justify-content: normal;
            text-align: center; 
            margin: auto;
            background-color: rgba(87, 89, 93, 0.768);
        }

        .button-ubah {
            background-color: rgb(18, 134, 134);
        }

        .button-hapus {
            background-color: rgb(173, 47, 83);
        }

        .button-ubah a {
            color: black;
        }

        .button-hapus a {
            color: black;
        }

        /* footer */
        .footer {
            margin-top: 20px;
            text-align: center;
            padding: 5px;
            background-color: rgb(255, 255, 0);
            color: black;
            font-size: small;
            width: 100%; 
        }

    </style>
</head>
<body>

    <nav class="navbar">
        <span class="logo">BukaData</span>
        <div class="navbar-nav">
            
            <form action="" method="post" class="cari">
                <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword" autocomplete="on">
                <button type="submit" name="cari" class="button-cari">Cari!</button>
            </form>
            
            <a href="tambah.php" >Tambah Data</a>
            <a href="cetak.php" target="_blank" class="cetak"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 17h-8v-1h8v1zm8-12v13h-4.048c-.404 2.423-3.486 6-6.434 6h-9.518v-6h-4v-13h4v-5h16v5h4zm-18 0h12v-3h-12v3zm12 9h-12v8h6.691c3.469 0 2-3.352 2-3.352s3.309 1.594 3.309-2v-2.648zm4-7h-20v9h2v-4h16v4h2v-9zm-9 11h-5v1h5v-1zm7.5-10c-.276 0-.5.224-.5.5s.224.5.5.5.5-.224.5-.5-.224-.5-.5-.5z"/></svg></a>
            <a href="logout.php" >Logout</a>

        </div>    
    </nav>

    <h1 class="judul">DAFTAR MAHASISWA</h1>
    <br>
    <table border="2" cellpadding="10" cellspacing="0"  class="con-judul">
        
        <tr class="tabel-judul">
            <th>No.</th>
            <th>Foto</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th class="aksi">Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><img src="img/<?= $row ["gambar"] ?>" width="50"></td>
            <td> <?= $row ["nim"] ?></td>
            <td><?= $row ["nama"] ?></td>
            <td><?= $row ["email"] ?></td>
            <td><?= $row ["jurusan"] ?></td>
            <td class="aksi">
                <button class="button-ubah">
                    <a href="update.php?id=<?= $row ["id"]?>">Ubah</a>
                </button>
                <button class="button-hapus">
                    <a href="hapus.php?id=<?= $row ["id"]?>" onclick="return confirm('yakin?')">Hapus</a>
                </button>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>

    </table>

    <footer class="footer">
        <p>Pemrograman Web &#169;2024, Ghufron Malik</p>
    </footer>
</body>
</html>