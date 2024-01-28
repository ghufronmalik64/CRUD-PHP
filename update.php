<?php
 session_start();

 if (!isset ($_SESSION["login"])) {
    header ("Location: login.php");
    exit;
}

require 'functions.php';

// Ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query ("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (update($_POST) > 0) {
        echo " 
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambahUbah.css">
    <title>Mengubah data Mahasiswa</title>
</head>
<body>
    <div class="container">
        
        <h1 class="tulisan-tambah">Mengubah Data Mahasiswa</h1>
        
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
            <div class="box-form">
                <div>
                    <label for="nim">NIM :</label>
                    <input type="text" name="nim" id="nim" autofocus autocomplete="on" required class="form-data" value="<?= $mhs["nim"]; ?>">
                </div>
                <div>
                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama" autocomplete="on" required class="form-data" value="<?= $mhs["nama"]; ?>">
                </div>
                <div>
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" autocomplete="on" required class="form-data" value="<?= $mhs["email"]; ?>">
                </div>
                <div>
                    <label for="jurusan">Jurusan :</label>
                    <input type="text" name="jurusan" id="jurusan" autocomplete="on" required class="form-data" value="<?= $mhs["jurusan"]; ?>">
                </div>
                <div>
                    <label for="gambar">Foto :</label><br>
                    <img src="img/<?= $mhs['gambar']; ?>" width="50">
                    <input type="file" name="gambar" id="gambar" autocomplete="on" required class="form-data">
                </div>
                <div>
                    <button type="submit" name="submit" class="tombol-tambah">Ubah Data!</button>
                </div>
            </div>
        </form>

    </div>
</body>
</html>
