<?php
include "connect.php";
$nama_obat = (isset($_POST["nama_obat"])) ? htmlentities($_POST["nama_obat"]) : "";
$golongan = (isset($_POST["golongan"])) ? htmlentities($_POST["golongan"]) : "";
$kategori = (isset($_POST["kategori"])) ? htmlentities($_POST["kategori"]) : "";
$jenis = (isset($_POST["jenis"])) ? htmlentities($_POST["jenis"]) : "";
$harga = (isset($_POST["harga"])) ? htmlentities($_POST["harga"]) : "";
$stok = (isset($_POST["stok"])) ? htmlentities($_POST["stok"]) : "";

if (!empty($_POST['input_obat'])) {
   $select = mysqli_query($conn, "SELECT * FROM tb_daftar_obat WHERE nama_obat = '$nama_obat'");
   if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('obat yang dimasukkan telah ada');
      window.location='../katmenu'</script>";
   } else {
      $query = mysqli_query($conn, "INSERT INTO tb_daftar_obat(nama_obat, golongan, kategori, jenis, harga, stok) values ('$nama_obat', '$golongan', '$kategori', '$jenis', '$harga', '$stok')");
      if ($query) {
         $message = "<script>alert('data berhasil diupdate');
         window.location='../obat'</script>";
      } else {
         $message = "<script>alert('data gagal diupdate');
         window.location='../obat'</script>";
      }
   }
}
echo $message;
?>