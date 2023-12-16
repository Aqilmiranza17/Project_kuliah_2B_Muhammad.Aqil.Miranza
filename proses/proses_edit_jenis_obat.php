<?php
include "connect.php";
$id_kategori = (isset($_POST["id_kategori"])) ? htmlentities($_POST["id_kategori"]) : "";
$jenis_obat = (isset($_POST["jenis_obat"])) ? htmlentities($_POST["jenis_obat"]) : "";
$kategori_obat = (isset($_POST["kategori_obat"])) ? htmlentities($_POST["kategori_obat"]) : "";

// echo $id_kategori;
// echo $jenis_obat;
// echo $kategori_obat;
// exit();
if (!empty($_POST['edit_jenis_validate'])) {
   $select = mysqli_query($conn, "SELECT kategori_obat FROM tb_kategori_obat WHERE kategori_obat = '$kategori_obat'");
   if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('Kategori yang dimasukkan telah ada');
      window.location='../jenis'</script>";
   } else {
      $query = mysqli_query($conn, "UPDATE tb_kategori_obat SET jenis='$jenis_obat', kategori_obat='$kategori_obat' WHERE id_kategori='$id_kategori'");
      if ($query) {
         $message = "<script>alert('Kategori berhasil diupdate');
         window.location='../jenis'</script>";
      } else {
         $message = "<script>alert('Kategori gagal diupdate');
         window.location='../jenis'</script>";
      }
   }
}
echo $message;
?>