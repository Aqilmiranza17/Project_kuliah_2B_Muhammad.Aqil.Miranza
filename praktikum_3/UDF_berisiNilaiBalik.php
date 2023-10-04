<?php
function psgpjg($pjg, $lbr){
    $luas = $pjg * $lbr; // Menghitung luas persegi panjang
    return $luas; // Mengembalikan nilai luas
}

$bil1 = 5;
$bil2 = 3;
echo "Luas persegi panjang dengan pjg 5 dan lebar 3 = ";
echo psgpjg($bil1, $bil2); // Memanggil fungsi dan mencetak nilai kembalian
?>
