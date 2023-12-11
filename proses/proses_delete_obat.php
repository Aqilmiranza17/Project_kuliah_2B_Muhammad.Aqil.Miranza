<?php
include "connect.php";
$nama_obat = (isset($_POST["nama_obat"])) ? htmlentities($_POST["nama_obat"]) : "";
$kategori = (isset($_POST["kategori"])) ? htmlentities($_POST["kategori"]) : "";


if (!empty($_POST['hapus_obat'])) {
   $query = mysqli_query($conn, "DELETE FROM tb_daftar_obat WHERE nama_obat='$nama_obat'");
   if ($query) {
      $message = "<script>alert('data Obat berhasil dihapus');
      window.location='../obat'</script>";
   } else {
      $message = "<script>alert('data obat gagal dihapus');
      window.location='../obat'</script>";
   }
}
echo $message;
?>