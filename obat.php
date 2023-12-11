<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * 
FROM tb_daftar_obat 
LEFT JOIN tb_golongan ON tb_golongan.id_golongan = tb_daftar_obat.golongan
");
while ($record = mysqli_fetch_array($query)) {
   $result[] = $record;
}
?>

<div class="col-lg-10 d-flex align-items-start justify-content-center mt-3 rounded-4">
   <div class="card w-75 mb-3 rounded-4">
      <div class="card-body">
         <h5 class="card-title">Halaman Obat</h5>
         <div class="row">
            <div class="col d-flex justify-content-start mt-3">
               <div class="btn btn-obat" data-bs-toggle="modal" data-bs-target="#ModalTambahObat"><i
                     class="bi bi-prescription2"></i> Tambah Obat
               </div>
            </div>
         </div>

         <!-- modal tambah obat-->
         <div class="modal fade" id="ModalTambahObat" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-prescription2"></i> Tambah Obat
                     </h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form class="needs-validation" novalidate action="proses/proses_input_obat.php" method="POST">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="floatingInput" placeholder="Your Name"
                                    name="nama_obat" required>
                                 <label for="floatingInput">Nama Obat</label>
                                 <div class="invalid-feedback">
                                    Masukkan Nama Obat
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="floatingInput" placeholder=""
                                    name="kategori" required>
                                 <label for="floatingInput">Kategori</label>
                                 <div class="invalid-feedback">
                                    Masukkan Kategori
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-floating mb-3">
                                 <select class="form-select" aria-label="Default select example" name="golongan"
                                    required>
                                    <option selected hidden value="Golongan">Golongan </option>
                                    <option value="1">Obat Bebas</option>
                                    <option value="2">Obat Bebas Terbatas</option>
                                    <option value="1">Obat Resep</option>
                                    <option value="2">Obat Narkotika</option>
                                    <option value="2">Obat Generic</option>
                                    <option value="1">Obat Non-generic</option>
                                    <option value="2">Obat Herbal</option>
                                 </select>
                                 <label for="floatingInput"></label>
                                 <div class="invalid-feedback">
                                    Pilih Golongan
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-8">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="floatingInput" placeholder="" name="jenis">
                                 <label for="floatingInput">Jenis</label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="floatingInput" placeholder="harga"
                                    name="harga">
                                 <label for="floatingPassword">Harga</label>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="floatingInput" placeholder="Stok"
                                    name="stok">
                                 <label for="floatingPassword">Stok</label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan"
                                    name="keterangan" />
                                 <label for="floatingPassword">Keterangan</label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12"></div>
                        </div>

                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="input_obat" value="12345">Save
                        changes</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- end modal obat-->

         <?php foreach ($result as $row) { ?>
            <!-- modal view profile-->
            <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1"
               aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-vcard-fill"></i> Data
                           User
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="floatingInput"
                                       placeholder="Your Name" name="nama" value="<?php echo $row['nama'] ?>">
                                    <label for="floatingInput">Nama</label>
                                    <div class="invalid-feedback">
                                       Masukkan Password
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-floating mb-3">
                                    <input disabled type="email" class="form-control" id="floatingInput"
                                       placeholder="name@example.com" name="username"
                                       value="<?php echo $row['username'] ?>">
                                    <label for="floatingInput">Username</label>
                                    <div class="invalid-feedback">
                                       Masukkan Username
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-4">
                                 <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="level" id=""
                                       disabled>
                                       <?php
                                       $data = array("Owner/admin", "Karyawan");
                                       foreach ($data as $key => $value) {
                                          if ($row['level'] == $key + 1) {
                                             echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                          } else {
                                             echo "<option value=" . ($key + 1) . ">$value</option>";
                                          }
                                       }
                                       ?>
                                    </select>
                                    <label for="floatingInput">Level User</label>
                                    <div class="invalid-feedback">
                                       Pilih Level User
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-8">
                                 <div class="form-floating mb-3">
                                    <input disabled type="number" class="form-control" id="floatingInput"
                                       placeholder="08xxxxx" name="nohp" value="<?= $row['nohp']; ?>">
                                    <label for="floatingInput">No Hp</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-floating mb-3">
                                    <input disabled type="password" class="form-control" id="floatingInput"
                                       placeholder="Password" value="12345" name="password" disabled>
                                    <label for="floatingPassword">Password</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-floating">
                              <textarea disabled class="form-control" id="" style="height:100px"
                                 name="alamat"><?php echo $row['alamat'] ?></textarea>
                              <label for="floatingInput">Alamat</label>
                           </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end modal view profile--->

         <!-- modal edit profile-->
            <div class="modal fade" id="ModalEdit<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="bi bi-person-fill-gear"></i> Edit
                           User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
                           <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Your Name"
                                       name="nama" required value="<?php echo $row['nama'] ?>">
                                    <label for="floatingInput">Nama</label>
                                    <div class="invalid-feedback">
                                       Masukkan Password
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-floating mb-3">
                                    <input <?php echo ($row['username'] == $_SESSION['username_user']) ? 'disabled' : ''; ?>
                                       type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                       name="username" value="<?php echo $row['username'] ?>" required>
                                    <label for="floatingInput">Username</label>
                                    <div class="invalid-feedback">
                                       Masukkan Username
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-4">
                                 <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="level" id=""
                                       required>
                                       <?php
                                       $data = array("Owner/admin", "Karyawan");
                                       foreach ($data as $key => $value) {
                                          if ($row['level'] == $key + 1) {
                                             echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                          } else {
                                             echo "<option value=" . ($key + 1) . ">$value</option>";
                                          }
                                       }
                                       ?>
                                    </select>
                                    <label for="floatingInput">Level User</label>
                                    <div class="invalid-feedback">
                                       Pilih Level User
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-8">
                                 <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxx"
                                       name="nohp" value="<?php echo $row['nohp'] ?>">
                                    <label for="floatingInput">No Hp</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInput" placeholder="Password"
                                       value="12345" name="password" required>
                                    <label for="floatingPassword">Password</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-floating">
                              <textarea class="form-control" id="" style="height:100px"
                                 name="alamat"><?php echo $row['alamat'] ?></textarea>
                              <label for="floatingInput">Alamat</label>
                           </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save
                           changes</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end modal edit profile--->

         <!-- modal reset password -->
            <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1"
               aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> <i class="bi bi-person-fill-x"></i> Hapus User
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_delete_user.php" method="POST">
                           <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                           <div class="col-lg-12">
                              <?php
                              if ($row['username'] == $_SESSION['username_user']) {
                                 echo "<div class='alert alert-danger'>anda tidak dapat menghapus akun sendiri</div>";
                              } else {
                                 echo "Apakah anda ingin menghapus <b>$row[username]</b>";
                              }
                              ?>
                           </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_user']) ? 'disabled' : ''; ?>> Hapus</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end modal hapus profile--->
         <?php
         }
         ?>
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
                     <th scope="col">Nama Obat</th>
                     <th scope="col">Golongan</th>
                     <th scope="col">Kategori</th>
                     <th scope="col">Jenis Obat</th>
                     <th scope="col">Harga</th>
                     <th scope="col">Stok</th>
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
                        <?= $row['nama_obat'] ?>
                     </td>
                     <td>
                        <?= $row['golongan'] ?>
                     </td>
                     <td>
                        <?= $row['kategori'] ?>
                     </td>
                     <td>
                        <?= $row['jenis'] ?>
                     </td>
                     <td>
                        <?= $row['harga'] ?>
                     </td>
                     <td>
                        <?= $row['stok'] ?>
                     </td>
                     <td>
                        <div class="d-flex">
                           <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                              data-bs-target="#ModalView<?php echo $row['id'] ?>"><i
                                 class="bi bi-eyeglasses"></i></button>
                           <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                              data-bs-target="#ModalEdit<?= $row['id'] ?>"><i class="bi bi-pencil"></i></button>
                           <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                              data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash2"></i>
                        </div>
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