<html>
<head>
    <title>Koneksi Database Mysql</title>
</head>
<body>
    <h1>Demo Koneksi database Mysql</h1>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "db_belajar");
    if($conn){
        echo"Server terkoneksi";
    }else{
        echo"Server tidak terkoneksi";
    }
    ?>
</body>
</html>