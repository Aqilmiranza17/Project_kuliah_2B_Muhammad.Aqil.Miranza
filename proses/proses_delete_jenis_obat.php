<?php
include "connect.php";
$id_kategori = (isset($_POST["id_kategori"])) ? htmlentities($_POST["id_kategori"]) : "";

if (!empty($_POST['hapus_kategori_validate'])) {
   $select = mysqli_query($conn, "SELECT kategori FROM tb_daftar_obat WHERE kategori= '$id_kategori'");
   if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('Kategori telah digunakan pada daftar Obat. Kategori tidak dapat dihapus');
      window.location='../jenis'</script>";
   } else {
      $query = mysqli_query($conn, "DELETE FROM tb_kategori_obat WHERE id_kategori='$id_kategori'");
      if ($query) {
         $message = "<script>alert('Kategori berhasil dihapus');
      window.location='../jenis'</script>";
      } else {
         $message = "<script>alert('Kategori gagal dihapus');
      window.location='../jenis'</script>";
      }
   }
}
echo $message;
?>