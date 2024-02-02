<?php
session_start();
include "connect.php";
$uang = $_GET['uang'];

function generateRandomInteger($start, $end)
{
   return mt_rand($start, $end);
}
$randomNumber = generateRandomInteger(1, 1000000000000000000);

$id_order = $randomNumber;
$id_user = $_SESSION['username_user'];
$nominal_uang = $uang;
$waktu_order = date("Y-m-d H:i:s");

$total = 0;

$query2 = mysqli_query($conn, "SELECT * FROM tb_cart_item");
while ($row = mysqli_fetch_array($query2)) {
   $id_item = $row["id_item"];
   $id_obat = $row["id_obat"];
   $jumlah = $row["jumlah"];
   $total_harga = $row["total_harga"];

   $total += $total_harga;

   $query3 = mysqli_query($conn, "INSERT INTO tb_order_item(id_item, id_order, id_obat, jumlah, total_harga) VALUES($id_item, $id_order, $id_obat, $jumlah, $total_harga)");
}
$query = mysqli_query($conn, "INSERT INTO tb_order (id_order, id_user, nominal_uang, total, waktu_order) VALUES($id_order, '$id_user', $nominal_uang, $total, '$waktu_order')");

$query4 = mysqli_query($conn, "DELETE FROM tb_cart_item");
if ($query) {
   $kembalian = $nominal_uang - $total;
   header('location:../kasir?status=berhasil&kembalian=' . $kembalian);
} else {
   header('location:../kasir?status=gagal');
}

?>