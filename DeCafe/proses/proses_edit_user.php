<?php
include "connect.php";
$id = (isset($_POST["id"])) ? htmlentities($_POST["id"]) : "";
$Nama = (isset($_POST["Nama"])) ? htmlentities($_POST["Nama"]) : "";
$username = (isset($_POST["username"])) ? htmlentities($_POST["username"]) : "";
$level = (isset($_POST["level"])) ? htmlentities($_POST["level"]) : "";
$NoHp = (isset($_POST["NoHp"])) ? htmlentities($_POST["NoHp"]) : "";
$alamat = (isset($_POST["alamat"])) ? htmlentities($_POST["alamat"]) : "";
$password = md5('password');

if (!empty($_POST['input_user_validate'])) {
   $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
   if (mysqli_num_rows($select) > 0) {
      $message = "<script>alert('username yang dimasukkan telah ada');
      window.location='../user'</script>";
   } else {
      $query = mysqli_query($conn, "UPDATE tb_user SET Nama='$Nama', username='$username', level='$level', NoHp='$NoHp', alamat='$alamat' WHERE id='$id'");
      if ($query) {
         $message = "<script>alert('data berhasil dimasukkan');
      window.location='../user'</script>";
      } else {
         $message = "<script>alert('data gagal dimasukkan');
      window.location='../user'</script>";
      }
   }
}
echo $message;
?>