<?php
include "connect.php";
$id = (isset($_POST["id"])) ? htmlentities($_POST["id"]) : "";
$foto = (isset($_POST["foto"])) ? htmlentities($_POST["foto"]) : "";


if (!empty($_POST['input_user_validate'])) {
   echo "Nilai level: " . $level;
   $query = mysqli_query($conn, "DELETE FROM tb_daftar_menu WHERE id='$id'");
   if ($query) {
      unlink("../assets/image/$foto");
      $message = "<script>alert('data berhasil dihapus');
      window.location='../menu'</script>";
   } else {
      $message = "<script>alert('data gagal dihapus');
      window.location='../menu'</script>";
   }
}
echo $message;
?>