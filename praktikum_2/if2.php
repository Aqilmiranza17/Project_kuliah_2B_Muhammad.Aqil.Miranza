<html>
<body>
    <?php
    $d = date("D");
    if($d == "Sat"){
        echo"Selamat berakhir pekan!";
    }
    elseif ($d == "Fri"){
        echo"Selamat Menunaikan Sholat Jumat bagi yang muslim!";
    }else{
        echo"Selamat belajar";
    }

    ?>
</body>
</html>