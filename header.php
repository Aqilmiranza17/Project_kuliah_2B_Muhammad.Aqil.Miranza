<?php
include("proses/connect.php");
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$_SESSION[username_user]'");
$records = mysqli_fetch_array($query);
?>

<header class="sticky-lg-top">
   <nav class=" navbar navbar-expand-lg bg-body-tertiary d-flex">
      <div class="container-fluid py-2">
         <a class="h4 navbar-brand mx-5 headerbutton" href="home">
            <div class="d-flex align-items-center justify-content-center">
               <i class="bi bi-prescription2 m-2"></i>
               <div class="row">
                  <div class="col-12">Inventory</div>
                  <div class="col-12">Apotek</div>
               </div>
            </div>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item dropdown mx-5">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                     aria-expanded="false">
                     <?= $hasil['nama'] ?>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end mt-3">
                     <li><a class="dropdown-item rounded-1" href="#" data-bs-toggle="modal"
                           data-bs-target="#ModalUbahProfile"><i class="bi bi-person-lines-fill"></i> Profile</a>
                     </li>
                     <li><a class="dropdown-item rounded-1" href="#" data-bs-toggle="modal"
                           data-bs-target="#ModalUbahPassword"><i class="bi bi-key"></i> Password</a></li>
                     <li><a class="dropdown-item rounded-1" href="logout"><i class="bi bi-door-closed"></i> Log Out</a>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- Modal ubah password-->
   <div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-fullscreen-md-down">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-key-fill"></i> Ubah Password</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-floating mb-3">
                           <input disabled type="email" class="form-control" id="floatingInput"
                              placeholder="name@example.com" name="username"
                              value="<?php echo $_SESSION['username_user'] ?>" required>
                           <label for="floatingInput">Username</label>
                           <div class="invalid-feedback">
                              Masukkan Username
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-floating mb-3">
                           <input type="password" class="form-control" id="floatingPassword" name="passwordlama"
                              required>
                           <label for="floatingInput">Password Lama</label>
                           <div class="invalid-feedback">
                              Masukkan Password Lama
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-floating mb-3">
                           <input type="password" class="form-control" id="floatingInput" name="passwordbaru" required>
                           <label for="floatingInput">Password Baru</label>
                           <div class="invalid-feedback">
                              Masukkan Password Baru
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-floating mb-3">
                           <input type="password" class="form-control" id="floatingPassword" name="repasswordbaru"
                              required>
                           <label for="floatingInput">Ulangin password baru</label>
                           <div class="invalid-feedback">
                              Masukkan Ulangin password baru
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="12345">Save
                  changes</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- end ubah password-->

   <!-- Modal ubah Profile-->
   <div class="modal fade" id="ModalUbahProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-fullscreen-md-down">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-lines-fill"></i> Ubah Profile
               </h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form class="needs-validation" novalidate action="proses/proses_ubah_profile.php" method="POST">
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="form-floating mb-3">
                           <input disabled type="email" class="form-control" id="floatingInput"
                              placeholder="name@example.com" name="username"
                              value="<?php echo $_SESSION['username_user'] ?>" required>
                           <label for="floatingInput">Username</label>
                           <div class="invalid-feedback">
                              Masukkan Username
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-floating mb-3">
                           <input type="text" class="form-control" id="floatingnama" name="nama" required
                              value="<?php echo $records['nama'] ?>">
                           <label for="floatingInput">Nama</label>
                           <div class="invalid-feedback">
                              Masukkan Nama Anda
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-floating mb-3">
                           <input type="number" class="form-control" id="floatingInput" name="nohp" required
                              value="<?php echo $records['nohp'] ?>">
                           <label for="floatingInput">Nomor HP</label>
                           <div class="invalid-feedback">
                              Masukkan Nomor Hp anda
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-floating mb-3">
                           <textarea class="form-control" id="" style="height:100px"
                              name="alamat"><?php echo $records['alamat'] ?></textarea>
                           <label for="floatingInput">Masukkan Alamat Anda</label>
                           <div class="invalid-feedback">
                              Masukkan Alamat Anda
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary" name="ubah_profile_validate" value="12345">Save
                  changes</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- end modal ubah Profile-->