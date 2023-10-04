<?php
$str = "Belajar php ternyata menyenangkan";
echo strtolower($str); //ubah huruf ke kecil semua
echo"<br>";
echo strtoupper($str); //ubah huruf ke besar semua
echo"<br>";
echo str_replace("Menyenangkan","Mudah  lho", $str); //mengganti string