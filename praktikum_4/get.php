<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="get.php">
    <label for="">Nama:</label>
    <input type="text" name="nama">
    <br>
    <label for="">Alamat:</label>
    <input type="text" name="alamat">
    <br>
    <input type="submit" value="kirim">
    </form>
    
    <!-- proses -->
    <?php
    echo $_REQUEST['nama']."<br>";
    echo $_POST['alamat'];
    echo $_REQUEST['nama']+$_POST['alamat'];
    ?>

</body>
</html>