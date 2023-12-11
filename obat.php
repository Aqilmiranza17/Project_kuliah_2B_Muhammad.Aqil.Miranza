<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * 
FROM tb_daftar_obat 
LEFT JOIN tb_golongan ON tb_golongan.id_golongan = tb_daftar_obat.golongan
");
while ($record = mysqli_fetch_array($query)) {
   $result[] = $record;
}

$select_golongan = mysqli_query($conn,
   "SELECT id_golongan, golongan_obat 
FROM tb_golongan
");
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
                                 <select class="form-select" aria-label="Default select example" name="golongan_obat"
                                    required>
                                    <option selected hidden value="">Golongan </option>
                                    <option value="">Golongan Obat</option>
                                    <?php
                                    foreach ($select_golongan as $value) {
                                       echo "<option value=" . $value['id_golongan'] . "> $value[golongan_obat] </option>";
                                    }
                                    ?>
                                 </select>
                                 <label for="floatingInput"> Pilih Golongan</label>
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

         <?php
         if (empty($result)) {
            echo "Data Obat dan Product Kosong!!";
         } else {
            foreach ($result as $row) {
               ?>
               <!-- modal view obat-->
               <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                          name="nama_obat" value="<?= $row['nama_obat'] ?>" disabled>
                                       <label for="floatingInput">Nama Obat</label>
                                       <div class="invalid-feedback">
                                          Masukkan Nama Obat
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder=""
                                          name="kategori" value="<?= $row['kategori'] ?>" disabled>
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
                                          disabled>
                                          <option selected hidden value="">Pilih Golongan </option>
                                          <?php
                                          foreach ($select_golongan as $value) {
                                             if ($row['golongan'] == $value['id_golongan']) {
                                                echo "<option selected value=" . $value['id_golongan'] . "> {$value['golongan_obat']} </option>";
                                             } else {
                                                echo "<option value=" . $value['id_golongan'] . "> {$value['golongan_obat']} </option>";
                                             }
                                          }
                                          ?>

                                       </select>
                                       <label for="floatingInput">Golongan</label>
                                       <div class="invalid-feedback">
                                          Pilih Golongan
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-8">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="" name="jenis"
                                          value="<?= $row['jenis'] ?>" disabled>
                                       <label for="floatingInput">Jenis</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="harga"
                                          name="harga" value="<?= $row['harga'] ?>" disabled>
                                       <label for="floatingPassword">Harga</label>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="Stok"
                                          name="stok" value="<?= $row['stok'] ?>" disabled>
                                       <label for="floatingPassword">Stok</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan"
                                          name="keterangan" value="<?= $row['keterangan'] ?>" disabled />
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
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end modal view profile--->

         <!-- modal edit obat-->
               <div class="modal fade" id="ModalEdit<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-prescription2"></i> Edit Obat
                           </h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form class="needs-validation" novalidate action="proses/proses_edit_obat.php" method="POST">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="Your Name"
                                          name="nama_obat" required value="<?= $row['nama_obat'] ?>">
                                       <label for="floatingInput">Nama Obat</label>
                                       <div class="invalid-feedback">
                                          Masukkan Nama Obat
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder=""
                                          name="kategori" value="<?= $row['kategori'] ?>" required>
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
                                       <select class="form-select" aria-label="Default select example" name="golongan_obat"
                                          required>
                                          <option selected hidden value="">Golongan </option>
                                          <option selected hidden value="">Pilih Golongan </option>
                                          <?php
                                          foreach ($select_golongan as $value) {
                                             if ($row['golongan'] == $value['id_golongan']) {
                                                echo "<option selected value=" . $value['id_golongan'] . "> {$value['golongan_obat']} </option>";
                                             } else {
                                                echo "<option value=" . $value['id_golongan'] . "> {$value['golongan_obat']} </option>";
                                             }
                                          }
                                          ?>
                                       </select>
                                       <label for="floatingInput"> Pilih Golongan</label>
                                       <div class="invalid-feedback">
                                          Pilih Golongan
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-8">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="" name="jenis"
                                          value="<?= $row['jenis'] ?>">
                                       <label for="floatingInput">Jenis</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="harga"
                                          name="harga" value="<?= $row['harga'] ?>">
                                       <label for="floatingPassword">Harga</label>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="Stok"
                                          name="stok" value="<?= $row['stok'] ?>">
                                       <label for="floatingPassword">Stok</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan"
                                          name="keterangan" value="<?= $row['keterangan'] ?>" />
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
                           <button type="submit" class="btn btn-primary" name="edit_obat" value="12345">Save
                              changes</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end modal edit obat--->

         <!-- modal hapus obat -->
               <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-md modal-fullscreen-md-down">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h1 class="modal-title fs-5" id="exampleModalLabel">Delete data Obat</h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form class="needs-validation" novalidate action="proses/proses_delete_obat.php" method="POST">
                              <input type="hidden" value="<?php echo $row['nama_obat'] ?>" name="nama_obat">
                              <input type="hidden" value="<?php echo $row['kategori'] ?>" name="kategori">
                              <div class="col-lg-12">
                                 Apakah anda ingin menghapus Obat
                                 <b>
                                    <?= $row['nama_obat'] ?>
                                 </b>
                              </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-danger" name="hapus_obat" value="12345">Hapus</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end hapus obat--->
         <?php
            }
            ?>
         <hr>
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
                        <?= $row['golongan_obat'] ?>
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