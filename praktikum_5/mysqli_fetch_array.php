<html>
<head>
    <title>koneksi database mysql</title>
</head>
<body>
    <h1>Koneksi database menggunakan mysqli_fetch_array</h1>
    <?php
    $conn = mysqli_connect("localhost","root","","db_belajar") or die("Koneksi gagal");
    $hasil = mysqli_query($conn, "select * from tb_liga");
    while($row = mysqli_fetch_array($hasil)){
        echo"Liga ".$row["negara"]." ";
        echo"Mempunyai ".$row[2]." ";
        echo"Wakil di liga champion <br>";
    }
    ?>
</body>
</html>