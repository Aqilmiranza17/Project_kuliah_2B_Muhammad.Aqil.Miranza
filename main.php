<?php
// session_start();
if (empty($_SESSION['username_user'])) {
   header('location:login');
}

include 'proses/connect.php';
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_user]'");
$hasil = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/css/style.css">
   <title>Document</title>

   <!-- js untuk active pada sidebar -->
   <script>
      $(document).ready(function () {
         $(document).on('click', '.nav-link', function () {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
         });
      });
   </script>
   <!-- js end -->

   <!-- icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
   <!-- header -->
   <?php include "header.php"; ?>
   <!-- end header -->

   <div class="container-fluid">
      <div class="row">
         <!-- sidebar -->
         <?php include "sidebar.php"; ?>
         <!-- end sidebar -->

         <!-- content -->
         <?php
         include $page;
         ?>
         <!-- end content -->
      </div>
   </div>

   <!-- js from bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>

   <!-- feather icon -->
   <script>
      feather.replace();
   </script>
</body>

</html>