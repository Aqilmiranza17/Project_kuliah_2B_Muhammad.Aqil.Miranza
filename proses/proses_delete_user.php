<?php
include "connect.php";
$id = (isset($_POST["id"])) ? htmlentities($_POST["id"]) : "";


if (!empty($_POST['input_user_validate'])) {
   echo "Nilai level: " . $level;
   $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id='$id'");
   if ($query) {
      $message = "<script>alert('data berhasil dihapus');
      window.location='../user'</script>";
   } else {
      $message = "<script>alert('data gagal dihapus');
      window.location='../user'</script>";
   }
}
echo $message;
?>