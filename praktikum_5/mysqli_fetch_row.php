<html>
<head>
    <title>Koneksi database menggunakan Mysql</title>
</head>
<body>
    <h1>Koneksi database dengan mysqli_fetch_assoc</h1>
    <?php
    $conn = mysqli_connect("localhost","root","","db_belajar") or die("Koneksi gagal");
    $hasil = mysqli_query($conn, "select * from tb_liga");
    while($row = mysqli_fetch_row($hasil)){
        echo"Liga ".$row[1]." ";
        echo"Mempunyai ".$row[2]." ";
        echo"Wakil di liga champion <br>";
    }
    ?>
</body>
</html>