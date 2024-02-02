<?php
session_start();
include "connect.php";
$nama = (isset($_POST["nama"])) ? htmlentities($_POST["nama"]) : "";
$username = (isset($_POST["username"])) ? htmlentities($_POST["username"]) : "";
$password = (isset($_POST["password"])) ? md5(htmlentities($_POST["password"])) : "";

echo $username;
echo $password;
if (!empty($_POST["submit_validate"])) {
   $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password' || nama = '$nama' && password = '$password'");
   $hasil = mysqli_fetch_array($query);
   if ($hasil) {
      $_SESSION['iduser'] = $hasil['id'];
      $_SESSION['nama_user'] = $nama;
      $_SESSION['username_user'] = $username;
      $_SESSION['level_user'] = $hasil['level'];
      // $_SESSION['id_user'] = $hasil['id'];
      header("location:../home");
   } else { ?>
      <script>
         alert("username atau password yang anda masukkan salah");
         window.location = '../login';
      </script>
      <?php
   }
}

?>