<?php
include "connect.php";
$nama_obat = (isset($_POST["nama_obat"])) ? htmlentities($_POST["nama_obat"]) : "";
$golongan_obat = (isset($_POST["golongan_obat"])) ? htmlentities($_POST["golongan_obat"]) : "";
$kategori_obat = (isset($_POST["kategori_obat"])) ? htmlentities($_POST["kategori_obat"]) : "";
$jenis_obat = (isset($_POST["jenis_obat"])) ? htmlentities($_POST["jenis_obat"]) : "";
$harga = (isset($_POST["harga"])) ? htmlentities($_POST["harga"]) : "";
$stok = (isset($_POST["stok"])) ? htmlentities($_POST["stok"]) : "";

if (!empty($_POST['input_obat'])) {
   $select = mysqli_query($conn, "SELECT * FROM tb_daftar_obat WHERE nama_obat = '$nama_obat'");
   if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('obat yang dimasukkan telah ada');
      window.location='../obat'</script>";
   } else {
      $query = mysqli_query($conn, "INSERT INTO tb_daftar_obat(nama_obat, golongan, kategori, jenis, harga, stok) values ('$nama_obat', '$golongan_obat', '$kategori_obat', '$jenis_obat', '$harga', '$stok')");
      if ($query) {
         $message = "<script>alert('data Obat berhasil diinput');
         window.location='../obat'</script>";
      } else {
         $message = "<script>alert('data Obat gagal diinput');
         window.location='../obat'</script>";
      }
   }
}
echo $message;
?>