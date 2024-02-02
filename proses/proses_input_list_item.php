<?php
include "connect.php";
$id_list_order = (isset($_POST["id_list_order"])) ? htmlentities($_POST["id_list_order"]) : "";
$list_obat = (isset($_POST["list_obat"])) ? htmlentities($_POST["list_obat"]) : "";
$jumlah = (isset($_POST["jumlah"])) ? htmlentities($_POST["jumlah"]) : "";
$idobat = (isset($_POST["idobat"])) ? htmlentities($_POST["idobat"]) : "";

if (!empty($_POST['input_list_item'])) {
   $select = mysqli_query($conn, "SELECT * FROM tb_cart_item WHERE id_obat = $idobat");
   if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('Item yang dimasukkan telah ada');
      window.location='../kasir'</script>";
   } else {
      $query1 = mysqli_query($conn, "SELECT * FROM tb_daftar_obat WHERE id= $idobat");
      $row = mysqli_fetch_array($query1);
      $harga_obat = $row['harga'];
      $total = $harga_obat * $jumlah;
      $query = mysqli_query($conn, "INSERT INTO tb_cart_item (id_obat, jumlah, total_harga) VALUES ($idobat, $jumlah, $total)");
      if ($query) {
         $query4 = mysqli_query($conn, "SELECT * FROM tb_daftar_obat WHERE id= $idobat");
         $row2 = mysqli_fetch_array($query4);
         $stok = $row2['stok'];
         $stok_sekarang = $stok - $jumlah;
         $query3 = mysqli_query($conn, "UPDATE tb_daftar_obat SET stok = $stok_sekarang WHERE id= $idobat");
         $message = "<script>window.location='../kasir'</script>";
      } else {
         $message = "<script>alert('data gagal dimasukkan');
         window.location='../kasir'</script>";
      }
   }
}
echo $message;
?>