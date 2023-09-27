<html>
<body>
    <?php
    echo"Mencari jumlah huruf vokal dalam satu kata";
    echo"<br>";//ganti baris
    $jumlah = 0;
    $kata = "Belajar PHP";//suatu kata
    $huruf = 'a';//huruf vokal yan gidcari bisa huruf a, i, u, e, o
    for($i = 0; $i < strlen($kata); $i++){
        if(substr($kata, $i, 1) == $huruf){
            $jumlah ++;
        }
    }
    echo "Jumlah huruf " . $huruf . " dalam kata " . $kata ." : ";
    echo"<br>";
    echo $jumlah;
    ?>
</body>
</html>