<?php
include "connect.php";
$Nama = (isset($_POST["Nama"])) ? htmlentities($_POST["Nama"]) : "";
$username = (isset($_POST["username"])) ? htmlentities($_POST["username"]) : "";
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : "";
$level = (isset($_POST["level"])) ? htmlentities($_POST["level"]) : "";
$Nohp = (isset($_POST["Nohp"])) ? htmlentities($_POST["Nohp"]) : "";
$alamat = (isset($_POST["alamat"])) ? htmlentities($_POST["alamat"]) : "";
$password = md5('password');

if (!empty($_POST['input_user_validate'])) {
   $query = mysqli_query($conn, "INSERT INTO tb_user (Nama, username, level, Nohp, alamat, password) values ('$Nama', '$username', '$level', '$Nohp', '$alamat', '$password')");
   if ($query) {
      $message = "<script>alert('data berhasil diupdate');
      window.location='../user'</script>";
   } else {
      $message = "<script>alert('data gagal diupdate');</script>";
   }
}
echo $message;
?>