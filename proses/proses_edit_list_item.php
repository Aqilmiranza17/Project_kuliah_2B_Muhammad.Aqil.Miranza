<?php
include "connect.php";
$id_list_order = (isset($_POST["id_list_order"])) ? htmlentities($_POST["id_list_order"]) : "";
$list_obat = (isset($_POST["list_obat"])) ? htmlentities($_POST["list_obat"]) : "";
$jumlah = (isset($_POST["jumlah"])) ? htmlentities($_POST["jumlah"]) : "";
$idobat = (isset($_POST["idobat"])) ? htmlentities($_POST["idobat"]) : "";

if (!empty($_POST['edit_list_item'])) {
   $query = mysqli_query($conn, "UPDATE tb_list_order SET jumlah='$jumlah' WHERE id_list_order = '$id_list_order'");
   if ($query) {
      $message = "<script>alert('data berhasil di update');
         window.location='../kasir'</script>";
   } else {
      $message = "<script>alert('data gagal di update');
         window.location='../kasir'</script>";
   }
}
echo $message;
?>