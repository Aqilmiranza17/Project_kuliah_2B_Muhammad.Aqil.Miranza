<?php
include "connect.php";
$id_item = (isset($_POST["id_item"])) ? htmlentities($_POST["id_item"]) : "";
$list_obat = (isset($_POST["list_obat"])) ? htmlentities($_POST["list_obat"]) : "";
$id_obat = (isset($_POST["id_obat"])) ? htmlentities($_POST["id_obat"]) : "";

if (!empty($_POST['hapus_item_kasir'])) {

   $query5 = mysqli_query($conn, "SELECT * FROM tb_cart_item WHERE id_item=$id_item");
   $row3 = mysqli_fetch_array($query5);
   $jumlah = $row3["jumlah"];

   $query4 = mysqli_query($conn, "SELECT * FROM tb_daftar_obat WHERE id= $id_obat");
   $row2 = mysqli_fetch_array($query4);
   $stok = $row2['stok'];
   $stok_sekarang = $stok + $jumlah;

   $query6 = mysqli_query($conn, "UPDATE tb_daftar_obat SET stok=$stok_sekarang WHERE id= $id_obat");


   $query = mysqli_query($conn, "DELETE FROM tb_cart_item WHERE id_item=$id_item");
   if ($query) {
      $message = "<script>
      window.location='../kasir'</script>";
   } else {
      $message = "<script>alert(''item kasir gagal dihapus');
      window.location='../kasir'</script>";
   }
}
echo $message;
?>