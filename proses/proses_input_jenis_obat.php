<?php
include "connect.php";
$jenis_obat = (isset($_POST["jenis_obat"])) ? htmlentities($_POST["jenis_obat"]) : "";
$kategori_obat = (isset($_POST["kategori_obat"])) ? htmlentities($_POST["kategori_obat"]) : "";

if (!empty($_POST['input_jenis_validate'])) {
   $select = mysqli_query($conn, "SELECT kategori_obat FROM tb_kategori_obat WHERE kategori_obat = '$kategori_obat'");
   if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('Kategori yang dimasukkan telah ada');
      window.location='../katmenu'</script>";
   } else {
      $query = mysqli_query($conn, "INSERT INTO tb_kategori_obat(jenis, kategori_obat) values('$jenis_obat', '$kategori_obat')");
      if ($query) {
         $message = "<script>alert('data berhasil diupdate');
         window.location='../jenis'</script>";
      } else {
         $message = "<script>alert('data gagal diupdate');
         window.location='../jenis'</script>";
      }
   }
}
echo $message;
?>