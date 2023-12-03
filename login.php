<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/login.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <title>Document</title>

   <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

   <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap');

      html,
      body {
         height: 100%;
         font-family: 'Poppins', sans-serif;
      }
   </style>
</head>

<body class="d-flex align-items-center py-4" style="background-color: #FFFBF5;">
   <main class="form-signin w-100 m-auto rounded-5 border" style="background-color: #F7EFE5;">
      <form action="proses/proses_login.php" method="POST" class="needs-validation" novalidate>
         <h1 class="h4 text-center mb-4 fw-normal">Sign in</h1>

         <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username"
               required>
            <label for="floatingInput">Email address</label>
            <div class="invalid-feedback">
               Masukkan Username
            </div>
         </div>

         <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
               required>
            <label for="floatingPassword">Password</label>
            <div class="invalid-feedback">
               Masukkan Password
            </div>
         </div>

         <button class="btn btn-light w-100 py-2 mt-1" type="submit" name="submit_validate" value="submit"
            style="background-color: #C3ACD0;">Sign in</button>
         <p class="mt-3 mb-3 text-body-secondary text-center">
            <?= date("Y") ?>
         </p>
      </form>
   </main>

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

   <!-- feather icon -->
   <script>
      feather.replace();
   </script>
</body>

</html>