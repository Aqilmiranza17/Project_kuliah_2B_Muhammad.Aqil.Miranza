<?php
session_start();
include "connect.php";
$Nama = (isset($_POST["Nama"])) ? htmlentities($_POST["Nama"]) : "";
$NoHp = (isset($_POST["NoHp"])) ? htmlentities($_POST["NoHp"]) : "";
$alamat = (isset($_POST["alamat"])) ? htmlentities($_POST["alamat"]) : "";

if (!empty($_POST["ubah_profile_validate"])) {
   $query = mysqli_query($conn, "UPDATE tb_user SET Nama='$Nama', Nohp='$NoHp', alamat='$alamat' WHERE username = '$_SESSION[username_Decafe]'");
   if ($query) {
      $message = "<script>alert('Data Profile berhasil diupdate')
      window.history.back()</script>";
   } else {
      $message = "<script>alert('Data Profile berhasil diupdate')
      window.history.back()</script>";
   }
} else {
   $message = "<script>alert('Terjadi Kesalahan')
      window.history.back()</script>";
}
echo $message;
?>