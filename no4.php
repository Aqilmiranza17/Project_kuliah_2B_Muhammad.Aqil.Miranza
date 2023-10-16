<?php
    $num1 = 5;
    $num2 = 28;
    $num3 = 23;
    
function NilaiTerbesar($num1, $num2, $num3){
    $tertinggi = max($num1, $num2, $num3);
    return $tertinggi;
}


$hasil = NilaiTerbesar($num1, $num2, $num3);
// $hasil = NilaiTerbesar($num1, $num2, $num3);
echo "Nilai terbesar dari 3 buah nilai antara num1, num2 , num3 adalah ". $hasil;
?>