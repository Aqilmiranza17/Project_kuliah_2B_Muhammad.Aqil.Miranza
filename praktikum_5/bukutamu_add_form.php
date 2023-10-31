<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Simpan Buku Tamu</title>
</head>
<body>
    <h1>simpan buku tamu mysql</h1>
    <?php
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];
    $conn=mysqli_connect
    ("localhost","root","","dbbukutamu")
    or die ("koneksi gagal");
    echo "Nama     : $nama <br>";
    echo "email    : $email <br>";
    echo "komentar : $komentar <br>";
    
    echo "simpan bukutamu berhasil dilakukan";
    ?>
</body>
</html>