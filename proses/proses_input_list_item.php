<?php
include "connect.php";
$id_list_order = (isset($_POST["id_list_order"])) ? htmlentities($_POST["id_list_order"]) : "";
$list_obat = (isset($_POST["list_obat"])) ? htmlentities($_POST["list_obat"]) : "";
$jumlah = (isset($_POST["jumlah"])) ? htmlentities($_POST["jumlah"]) : "";
$idobat = (isset($_POST["idobat"])) ? htmlentities($_POST["idobat"]) : "";

if (!empty($_POST['input_list_item'])) {
   $select = mysqli_query($conn, "SELECT * FROM tb_list_order WHERE list_obat = $idobat");
   if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('Item yang dimasukkan telah ada');
      window.location='../kasir'</script>";
   } else {
      $query = mysqli_query($conn, "INSERT INTO tb_list_order(list_obat, jumlah) VALUES ('$idobat', '$jumlah')");
      if ($query) {
         $message = "<script>alert('data berhasil dimasukkan');
         window.location='../kasir'</script>";
      } else {
         $message = "<script>alert('data gagal dimasukkan');
         window.location='../kasir'</script>";
      }
   }
}
echo $message;
?>