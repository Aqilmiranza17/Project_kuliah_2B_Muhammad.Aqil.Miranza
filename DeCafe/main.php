<?php
// session_start();
if (empty($_SESSION['username_Decafe'])) {
  header('location:login');
}

include 'proses/connect.php';
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_Decafe]'");
$hasil = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DeCafe - Aplikasi pemesanan Cafe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="height: 3000px;">

  <!-- header -->
  <?php include "header.php"; ?>
  <!-- end header -->

  <div class="container-lg">
    <div class="row mb-5">

      <!-- sidebar -->
      <?php include "Sidebar.php"; ?>
      <!-- end sidebar -->

      <!-- content -->
      <?php
      include "$page";
      ?>
      <!-- end content -->
    </div>

    <div class="fixed-bottom text-center bg-light py-2">
      Copyright markaz virtual 2023 By Muhammad Aqil Miranza
    </div>
  </div>
  <!-- ini adalah js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- script js -->
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Script end -->
</body>

</html>