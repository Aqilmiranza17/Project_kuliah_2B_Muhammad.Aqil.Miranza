<?php
// matrix 1
$a = [
    1, 2, 3, 4, 5
];

$b = [
    1, 2, 3, 4, 5
];

// menampilkan matrix a
echo "matrix a<br>";
for($i = 0; $i < 5; $i++){
    echo $a[$i]. " ";
}
echo"<br>";
echo"<br>";
//menampilkan matrix b
echo"matrix b<br>";
for($i = 0; $i < 5; $i++){
    echo $b[$i]. " ";
}

echo"<br>";
echo"<br>";

// penjumlahan matrix a dan b
echo "penjumlahan matrix a dan b<br>";
for($i = 0; $i < 5; $i++){
    echo $a[$i] + $b[$i] . " ";
}
?>
