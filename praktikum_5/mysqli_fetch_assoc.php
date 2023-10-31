<html>
<head>
    <title>Koneksi database menggunakan Mysql</title>
</head>
<body>
    <h1>Koneksi database dengan mysqli_fetch_assoc</h1>
    <?php
    $conn = mysqli_connect("localhost","root","","db_belajar") or die("Koneksi gagal");
    $hasil = mysqli_query($conn, "select * from tb_liga");
    while($row = mysqli_fetch_assoc($hasil)){
        echo"Liga ".$row["negara"]." ";
        echo"Mempunyai ".$row["champion"]." ";
        echo"Wakil di liga champion <br>";
    }
    ?>
</body>
</html>