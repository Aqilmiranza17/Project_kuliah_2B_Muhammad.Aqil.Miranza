<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kategori_obat LEFT JOIN tb_jenis_obat ON tb_jenis_obat.id_jenis = tb_kategori_obat.jenis");
while ($record = mysqli_fetch_array($query)) {
   $result[] = $record;
}

$select_jenis_obat = mysqli_query($conn,
   "SELECT id_jenis, jenis_obat
FROM tb_jenis_obat
");
?>

<div class="col-lg-10 d-flex align-items-start justify-content-center mt-3 rounded-4">
   <div class="card w-75 mb-3 rounded-4">
      <div class="card-body">
         <h5 class="card-title">Kategori Obat/produk</h5>
         <div class="row">
            <div class="col d-flex justify-content-start mt-3">
               <div class="btn btn-user" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"><i
                     class="bi bi-prescription"></i> Tambah Kategori Obat
               </div>
            </div>
         </div>

         <!-- modal tambah jenis obat-->
         <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori obat</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form class="needs-validation" novalidate action="proses/proses_input_jenis_obat.php"
                        method="POST">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-floating mb-3">
                                 <select class="form-select" aria-label="Default select example" name="jenis_obat"
                                    required>
                                    <option selected hidden value="">Jenis Obat </option>
                                    <option value="">Jenis Obat</option>
                                    <?php
                                    foreach ($select_jenis_obat as $value) {
                                       echo "<option value=" . $value['id_jenis'] . "> $value[jenis_obat] </option>";
                                    }
                                    ?>
                                 </select>
                                 <label for="floatingInput">Jenis Obat</label>
                                 <div class="invalid-feedback">
                                    Masukkan Jenis Obat
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Obat"
                                    name="kategori_obat" required>
                                 <label for="floatingInput">Kategori Obat</label>
                                 <div class="invalid-feedback">
                                    Masukkan Kategori Obat
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="input_jenis_validate" value="12345">Save
                        changes</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- end modal tambah jenis obat-->

         <?php foreach ($result as $row) { ?>
            <!-- modal edit obat-->
            <div class="modal fade" id="ModalEdit<?php echo $row['id_kategori'] ?>" tabindex="-1"
               aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kategori Obat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_edit_jenis_obat.php" method="POST">
                           <input type="hidden" name="id_kategori" value="<?= $row['id_kategori'] ?>">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="jenis_obat" id=""
                                       required>
                                       <?php
                                       $data = array("Obat cair", "Tablet", "Kapsul", "Obat oles", "Obat tetes", "Obat suntik", "Obat tempel", "Produk");
                                       foreach ($data as $key => $value) {
                                          if ($row['id_jenis'] == $key + 1) {
                                             echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                          } else {
                                             echo "<option value=" . ($key + 1) . ">$value</option>";
                                          }
                                       }
                                       ?>
                                    </select>
                                    <label for="floatingInput">Jenis Menu</label>
                                    <div class="invalid-feedback">
                                       Masukkan Jenis Menu
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Obat"
                                       name="kategori_obat" required value="<?= $row['kategori_obat'] ?>">
                                    <label for="floatingInput">Kategori Menu</label>
                                    <div class="invalid-feedback">
                                       Masukkan Kategori Menu
                                    </div>
                                 </div>
                              </div>
                           </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_jenis_validate" value="12345">Save
                           changes</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end modal edit obat--->

         <!-- modal hapus Kategori -->
            <div class="modal fade" id="ModalDelete<?php echo $row['id_kategori'] ?>" tabindex="-1"
               aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-md modal-fullscreen-md-down">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete data Kategori Obat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_delete_jenis_obat.php"
                           method="POST">
                           <input type="hidden" value="<?php echo $row['id_kategori'] ?>" name="id_kategori">
                           <div class="col-lg-12">
                              Apakah anda ingin menghapus Kategori<b>
                                 <?= $row['kategori_obat'] ?>
                              </b>
                           </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="hapus_kategori_validate"
                           value="12345">Hapus</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end modal hapus Kategori--->
         <?php
         }
         ?>

         <hr>
         <?php
         if (empty($result)) {
            echo "Data Kategori Kosong";
         } else { ?>

         <div class="table-responsive">
            <table class="table table-hover">
               <thead>
                  <tr class="">
                     <th scope="col">No</th>
                     <th scope="col">Jenis Obat/produk</th>
                     <th scope="col">Kategori Obat</th>
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
                        <?= $row['jenis_obat'] ?>
                     </td>
                     <td>
                        <?= $row['kategori_obat'] ?>
                     </td>
                     <td class="d-flex">
                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                           data-bs-target="#ModalEdit<?php echo $row['id_kategori'] ?>">
                           <i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                           data-bs-target="#ModalDelete<?php echo $row['id_kategori'] ?>"><i
                              class="bi bi-trash"></i></button>
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