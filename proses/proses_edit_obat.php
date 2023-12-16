<?php
include "connect.php";
$id = (isset($_POST["id"])) ? htmlentities($_POST["id"]) : "";
$nama_obat = (isset($_POST["nama_obat"])) ? htmlentities($_POST["nama_obat"]) : "";
$golongan_obat = (isset($_POST["golongan_obat"])) ? htmlentities($_POST["golongan_obat"]) : "";
$kategori_obat = (isset($_POST["kategori_obat"])) ? htmlentities($_POST["kategori_obat"]) : "";
$jenis_obat = (isset($_POST["jenis_obat"])) ? htmlentities($_POST["jenis_obat"]) : "";
$harga = (isset($_POST["harga"])) ? htmlentities($_POST["harga"]) : "";
$stok = (isset($_POST["stok"])) ? htmlentities($_POST["stok"]) : "";
$keterangan = (isset($_POST["keterangan"])) ? htmlentities($_POST["keterangan"]) : "";

if (!empty($_POST['edit_obat'])) {
   $select = mysqli_query($conn, "SELECT * FROM tb_daftar_obat WHERE nama_obat = '$nama_obat'");
   if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('nama obat yang dimasukkan telah ada');
      window.location='../obat'</script>";
   } else {
      $query = mysqli_query($conn,
         "UPDATE tb_daftar_obat 
      SET nama_obat='$nama_obat', golongan='$golongan_obat', kategori='$kategori_obat', jenis='$jenis_obat', harga='$harga', stok='$stok', keterangan='$keterangan'
      WHERE id='$id'
      ");
      if ($query) {
         $message = "<script>alert('data Obat berhasil di edit');
         window.location='../obat'</script>";
      } else {
         $message = "<script>alert('data Obat gagal di edit');
         window.location='../obat'</script>";
      }
   }
}
echo $message;
?>