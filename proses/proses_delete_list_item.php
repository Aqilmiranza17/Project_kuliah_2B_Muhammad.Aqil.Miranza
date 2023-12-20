<?php
include "connect.php";
$id_list_order = (isset($_POST["id_list_order"])) ? htmlentities($_POST["id_list_order"]) : "";
$list_obat = (isset($_POST["list_obat"])) ? htmlentities($_POST["list_obat"]) : "";
$idobat = (isset($_POST["idobat"])) ? htmlentities($_POST["idobat"]) : "";

if (!empty($_POST['hapus_item_kasir'])) {
   $query = mysqli_query($conn, "DELETE FROM tb_list_order WHERE id_list_order='$id_list_order'");
   if ($query) {
      $message = "<script>alert('item kasir berhasil dihapus');
      window.location='../kasir'</script>";
   } else {
      $message = "<script>alert(''item kasir gagal dihapus');
      window.location='../kasir'</script>";
   }
}
echo $message;
?>