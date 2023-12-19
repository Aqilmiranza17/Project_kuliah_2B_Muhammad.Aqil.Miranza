<?php
include "connect.php";
$id_list_order = (isset($_POST["id_list_order"])) ? htmlentities($_POST["id_list_order"]) : "";
$list_obat = (isset($_POST["list_obat"])) ? htmlentities($_POST["list_obat"]) : "";
$jumlah = (isset($_POST["jumlah"])) ? htmlentities($_POST["jumlah"]) : "";
$idobat = (isset($_POST["idobat"])) ? htmlentities($_POST["idobat"]) : "";

if (!empty($_POST['delete_orderitem_validate'])) {
   $select = mysqli_query($conn, "SELECT kode_order FROM tb_list_order WHERE kode_order='$kode_order'");
   $query = mysqli_query($conn, "DELETE FROM tb_list_order WHERE id_list_order='$id'");
   if ($query) {
      $message = "<script>alert('data berhasil dihapus');
      window.location='../?x=orderitem&order=" . $kode_order . "&meja=" . $meja . "&pelanggan=" . $pelanggan . "'</script>";
   } else {
      $message = "<script>alert('data gagal dihapus');
      window.location='../?x=orderitem&order=" . $kode_order . "&meja=" . $meja . "&pelanggan=" . $pelanggan . "'</script>";
   }
}
echo $message;
?>