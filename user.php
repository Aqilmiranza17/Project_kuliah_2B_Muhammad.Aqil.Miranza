<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user");
while ($record = mysqli_fetch_array($query)) {
   $result[] = $record;
}
?>

<div class="col-lg-10 d-flex align-items-start justify-content-center mt-3">
   <div class="card w-75 mb-3 border-0">
      <div class="card-body">
         <h5 class="card-title">Halaman User</h5>
         <div class="row">
            <div class="col d-flex justify-content-start mt-3">
               <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah</div>
            </div>
         </div>

         <!-- modal tambah user baru-->
         <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-fill-add"></i> Tambah
                        User
                     </h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     ...
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end modal tambah user baru-->

         <!-- modal view profile-->
         <div class="modal fade" id="ModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-vcard-fill"></i> Data
                        User
                     </h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     ...
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end modal view profile--->

         <!-- modal edit profile-->
         <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="bi bi-person-fill-gear"></i> Edit
                        User</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     ...
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end modal edit profile--->

         <hr>
         <?php
         if (empty($result)) {
            echo "Data User Kosong";
         } else { ?>

         <div class="table-responsive">
            <table class="table table-hover">
               <thead>
                  <tr class="">
                     <th scope="col">No</th>
                     <th scope="col">Nama</th>
                     <th scope="col">Username</th>
                     <th scope="col">Level</th>
                     <th scope="col">No Hp</th>
                     <th scope="col">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 1;
                  foreach ($result as $row) {
                     ?>
                  <tr>
                     <th scope="row">
                        <?= $no++ ?>
                     </th>
                     <td>
                        <?= $row['nama'] ?>
                     </td>
                     <td>
                        <?= $row['username'] ?>
                     </td>
                     <td>
                        <?= $row['level'] ?>
                     </td>
                     <td>
                        <?= $row['nohp'] ?>
                     </td>
                     <td class="d-flex">
                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView"><i
                              class="bi bi-eyeglasses"></i></button>
                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                           data-bs-target="#ModalEdit"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-danger btn-sm me-1"><i class="bi bi-trash2"></i></button>
                     </td>
                  </tr>
                  <tr>
                     <?php } ?>
               </tbody>
            </table>
         </div>
         <?php } ?>
      </div>
   </div>
</div>