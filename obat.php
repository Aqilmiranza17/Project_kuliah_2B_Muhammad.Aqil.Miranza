<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * 
FROM tb_daftar_obat 
JOIN tb_golongan ON tb_golongan.id_golongan = tb_daftar_obat.golongan
JOIN tb_jenis_obat ON tb_jenis_obat.id_jenis = tb_daftar_obat.jenis
JOIN tb_kategori_obat ON tb_kategori_obat.id_kategori = tb_daftar_obat.kategori
");
while ($record = mysqli_fetch_array($query)) {
   $result[] = $record;
}

$select_golongan = mysqli_query($conn,
   "SELECT id_golongan, golongan_obat 
FROM tb_golongan
");

$select_jenis_obat = mysqli_query($conn,
   "SELECT id_jenis, jenis_obat
FROM tb_jenis_obat");

$select_kat_obat = mysqli_query($conn,
   "SELECT id_kategori, kategori_obat
FROM tb_kategori_obat");
?>

<div class="col-lg-10 d-flex align-items-start justify-content-center mt-3 rounded-4">
   <div class="card w-75 mb-3 rounded-4">
      <div class="card-body">
         <h5 class="card-title">Daftar Obat</h5>
         <div class="row">
            <div class="col d-flex justify-content-start mt-3">
               <div class="btn btn-obat" data-bs-toggle="modal" data-bs-target="#ModalTambahObat"><i
                     class="bi bi-prescription2"></i> Tambah Obat
               </div>
            </div>
            <!-- <div class="col d-flex justify-content-end mt-3">
               <form class="d-flex" role="search" action="proses/cari_obat.php" method="GET">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Cari</button>
               </form>
            </div> -->
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
                           <div class="col-lg-12">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="floatingInput" placeholder="Your Name"
                                    name="nama_obat" required>
                                 <label for="floatingInput">Nama Obat</label>
                                 <div class="invalid-feedback">
                                    Masukkan Nama Obat
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-floating mb-3">
                                 <select class="form-select" aria-label="Default select example" name="golongan_obat">
                                    <option selected hidden value="">Golongan</option>
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
                           <div class="col-lg-4">
                              <div class="form-floating mb-3">
                                 <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="jenis_obat"
                                       required>
                                       <option selected hidden value="">Jenis Obat </option>
                                       <option value="" selected hidden>Jenis Obat</option>
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
                           </div>
                           <div class="col-lg-4">
                              <div class="form-floating mb-3">
                                 <select class="form-select" aria-label="Default select example" name="kategori_obat"
                                    required>
                                    <option value="" selected hidden>Pilih Kategori Obat</option>
                                    <?php
                                    foreach ($select_kat_obat as $value) {
                                       echo "<option value=" . $value['id_kategori'] . "> $value[kategori_obat] </option>";
                                    }
                                    ?>
                                 </select>
                                 <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                 <div class="invalid-feedback">
                                    Pilih Kategori Makanan atau Minuman
                                 </div>
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
                  <div class="modal-dialog modal-md modal-fullscreen-md-down">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-prescription2"></i> Detail Obat
                           </h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <div class="table-responsive">
                              <table class="table table-info table-striped text-nowrap">
                                 <tr>
                                    <td class="col-3">Nama Obat</td>
                                    <td>:</td>
                                    <td class="col-9">
                                       <?= $row['nama_obat'] ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="col-3">Jenis</td>
                                    <td>:</td>
                                    <td class="col-9">
                                       <?= $row['jenis_obat'] ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="col-3">Golongan Obat</td>
                                    <td>:</td>
                                    <td class="col-9">
                                       <?= $row['golongan_obat'] ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="col-3">Kategori</td>
                                    <td>:</td>
                                    <td class="col-9">
                                       <?= $row['kategori_obat'] ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="col-3">Harga</td>
                                    <td>:</td>
                                    <td class="col-9">
                                       Rp.
                                       <?= number_format($row['harga'], 0, ',', '.') ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="col-3">Stok</td>
                                    <td>:</td>
                                    <td class="col-9">
                                       <?= $row['stok'] ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="col-3">Keterangan</td>
                                    <td>:</td>
                                    <td class="col-9">
                                       <?= $row['keterangan'] ?>
                                    </td>
                                 </tr>
                              </table>
                           </div>
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
                              <input type="hidden" name="id" value="<?= $row['id'] ?>">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" id="floatingInput" placeholder="Your Name"
                                          name="nama_obat" value="<?= $row['nama_obat'] ?>">
                                       <label for="floatingInput">Nama Obat</label>
                                       <div class="invalid-feedback">
                                          Masukkan Nama Obat
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                       <select class="form-select" aria-label="Default select example" name="golongan_obat">
                                          <option selected hidden value="">Golongan</option>
                                          <?php
                                          foreach ($select_golongan as $value) {
                                             if ($row['golongan'] == $value['id_golongan']) {
                                                echo "<option selected value=" . $value['id_golongan'] . "> {$value['golongan_obat']} 
                                                </option>";
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
                                 <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                       <select class="form-select" aria-label="Default select example" name="jenis_obat"
                                          id="">
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
                                       <label for="floatingInput"> Pilih Jenis</label>
                                       <div class="invalid-feedback">
                                          Pilih Jenis
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                       <select class="form-select" aria-label="Default select example" name="kategori_obat">
                                          <option selected hidden value="">Kategori</option>
                                          <?php
                                          foreach ($select_kat_obat as $value) {
                                             if ($row['kategori'] == $value['id_kategori']) {
                                                echo "<option selected value=" . $value['id_kategori'] . "> {$value['kategori_obat']} 
                                                </option>";
                                             } else {
                                                echo "<option value=" . $value['id_kategori'] . "> {$value['kategori_obat']} </option>";
                                             }
                                          }
                                          ?>
                                       </select>
                                       <label for="floatingInput"> Pilih Kategori</label>
                                       <div class="invalid-feedback">
                                          Pilih Kategori
                                       </div>
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
                     <th scope=" col">No</th>
                     <th scope="col">Nama Obat</th>
                     <th scope="col">Golongan</th>
                     <th scope="col">Kategori</th>
                     <th scope="col">Jenis</th>
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
                        <?= $row['kategori_obat'] ?>
                     </td>
                     <td>
                        <?= $row['jenis_obat'] ?>
                     </td>
                     <td>
                        Rp.
                        <?= number_format($row['harga'], 0, ',', '.') ?>
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