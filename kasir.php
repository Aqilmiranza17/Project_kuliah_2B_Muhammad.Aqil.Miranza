<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * 
FROM tb_daftar_obat 
JOIN tb_golongan ON tb_golongan.id_golongan = tb_daftar_obat.golongan
JOIN tb_jenis_obat ON tb_jenis_obat.id_jenis = tb_daftar_obat.jenis
JOIN tb_kategori_obat ON tb_kategori_obat.id_kategori = tb_daftar_obat.kategori
LEFT JOIN tb_cart_item ON tb_cart_item.id_obat = tb_daftar_obat.id
ORDER BY nama_obat DESC
");

while ($record = mysqli_fetch_array($query)) {
   $result[] = $record;
}
?>


<div class="col-lg-10 m-auto mt-3 d-flex flex-column justify-content-center align-items-center">
   <div class="col-lg-8">
      <div class="card mb-3 border-0">
         <div class="card-body">


            <script>
               // Mendapatkan seluruh URL
               var url = window.location.href;

               // Mendapatkan parameter GET berdasarkan nama
               function getParameterByName(name, url) {
                  if (!url) {
                     url = window.location.href;
                  }
                  name = name.replace(/[\[\]]/g, "\\$&");
                  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                     results = regex.exec(url);
                  if (!results) return null;
                  if (!results[2]) return '';
                  return decodeURIComponent(results[2].replace(/\+/g, " "));
               }

               // Contoh penggunaan
               var kembalian = getParameterByName('kembalian');

               if (kembalian !== null) {
                  alert("Pembayaran berhasil \n kembalian Anda: " + kembalian);
               }
            </script>


            <h5 class="card-title">Kasir Apotek</h5>
            <?php
            if (empty($result)) {
               echo "Data Obat dan Product Kosong!!";
            } else {
               foreach ($result as $row) {
                  ?>
                  <!-- start Modal tambah obat kasir-->
                  <div class="modal fade" id="ModalTambah<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Obat</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <form class="needs-validation" novalidate action="proses/proses_input_list_item.php"
                                 method="POST">
                                 <input type="hidden" name="id_list_order" value="<?= $row['id'] ?>">
                                 <div class=" row">
                                    <div class="col-lg-6">
                                       <div class="form-floating mb-3">
                                          <input type="hidden" class="form-control" name="idobat" value="<?= $row['id'] ?>">
                                          <input type="text" class="form-control" id="floatingInput" placeholder="Your Name"
                                             name="list_obat" value="<?= $row['nama_obat'] ?>" disabled>
                                          <label for="floatingInput">Nama Obat</label>
                                          <div class="invalid-feedback">
                                             Masukkan Nama Obat
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-floating mb-3">
                                          <input type="number" class="form-control" id="floatingInput"
                                             placeholder="Jumlah Obat" name="jumlah" required>
                                          <label for="floatingInput">Jumlah</label>
                                          <div class="invalid-feedback">
                                             Masukkan Jumlah
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" name="input_list_item" value="12345">Save
                                 changes</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end Modal tambah obat kasir-->
                  <?php
               }
               ?>
               <div class="table-responsive mt-4">
                  <table class="table table-hover" id="kasir">
                     <thead>
                        <tr>
                           <th scope="col">Nama Obat</th>
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
                              <td>
                                 <?= $row['nama_obat'] ?>
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
                                    <button class="btn btn-success btn-sm me-1" data-bs-toggle="modal"
                                       data-bs-target="#ModalTambah<?= $row['id'] ?>"><i class="bi bi-folder-plus"></i>
                                       Tambah</button>
                                 </div>
                              </td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
               <?php
            }
            ?>
         </div>
      </div>
   </div>



   <!-- table kasir total -->
   <div class="col-lg-8">
      <div class="card mb-3 border-0">
         <div class="card-body">
            <h5 class="card-title">Kasir Total</h5>
            <div class="table-responsive mt-4">
               <table class="table table-hover" id="kasir">
                  <thead>
                     <tr>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $total = 0;
                     $kueri = mysqli_query($conn, "SELECT * FROM tb_cart_item");
                     while ($row = mysqli_fetch_array($kueri)) {
                        $id = $row['id_obat'];
                        $kueri2 = mysqli_query($conn, "SELECT * 
                        FROM tb_daftar_obat 
                        JOIN tb_golongan ON tb_golongan.id_golongan = tb_daftar_obat.golongan
                        JOIN tb_jenis_obat ON tb_jenis_obat.id_jenis = tb_daftar_obat.jenis
                        JOIN tb_kategori_obat ON tb_kategori_obat.id_kategori = tb_daftar_obat.kategori
                        LEFT JOIN tb_cart_item ON tb_cart_item.id_item = tb_daftar_obat.id WHERE id = $id");
                        while ($row2 = mysqli_fetch_array($kueri2)) {
                           ?>

                           <!-- modal delete -->
                           <div class="modal fade" id="ModalDelete<?php echo $row2['id_item'] ?>" tabindex="-1"
                              aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h1 class="modal-title fs-5" id="exampleModalLabel">Delete item kasir</h1>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       <form class="needs-validation" novalidate action="proses/proses_delete_list_item.php"
                                          method="POST">
                                          <input type="hidden" name="id_item" value="<?php echo $row['id_item'] ?>">
                                          <input type="hidden" name="id_obat" value="<?php echo $row['id_obat'] ?>">
                                          <div class="col-lg-12">
                                             Apakah anda ingin menghapus Item
                                             <b>
                                                <?= $row2['nama_obat'] ?>
                                             </b>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-danger" name="hapus_item_kasir"
                                          value="12345">Hapus</button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- modal delete -->

                           <tr>
                              <td>
                                 <?= $row2['nama_obat'] ?>
                              </td>
                              <td>
                                 <?= $row2['kategori_obat'] ?>
                              </td>
                              <td>
                                 <?= $row2['jenis_obat'] ?>
                              </td>
                              <td>
                                 <?= $row['jumlah'] ?>
                              </td>
                              <td>
                                 <?= number_format($row2['harga'] * $row['jumlah'], 0, ',', '.') ?>
                              </td>
                              <!-- end table -->

                              <!-- tombol aksi -->
                              <td>
                                 <div class="d-flex">
                                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                       data-bs-target="#ModalDelete<?php echo $row2['id_item'] ?>"><i
                                          class="bi bi-trash2"></i></button>
                                 </div>
                              </td>
                           </tr>
                           <?php
                           $total += $row2['harga'] * $row['jumlah'];
                        }
                     }
                     ?>
                     <tr>
                        <td colspan="4" class="fw-bold">
                           Total Harga
                        </td>
                        <td class="fw-bold">
                           <?= number_format($total, 0, ',', '.') ?>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <button class="btn btn-bayar mb-2" data-bs-toggle="modal" data-bs-target="#ModalBayar"><i
                     class="bi bi-cash-stack"></i>
                  Bayar Item</button>
            </div>
         </div>
      </div>
   </div>
   <!-- end table kasir total -->

   <!-- start Modal pembayaran-->
   <div class="modal fade" id="ModalBayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-fullscreen-md-down">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">pembayaran</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="col px-2">
                  <p>
                     <?php echo "Rp" . number_format($total, 0, ',', '.') ?>
                  </p>
               </div>
               <form action="proses/proses_pemesanan.php" method="GET">
                  <div class=" row">
                     <div class="col-lg-12">
                        <div class="form-floating mb-3">
                           <input type="number" min="<?php echo $total ?>" class="form-control" id="floatingInput"
                              placeholder="Nominal Uang " name="uang" required>
                           <label for="floatingInput">Nominal Uang</label>
                           <div class="invalid-feedback">
                              Masukkan Nominal Uang.
                           </div>
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="bayar_validate" value="12345">Bayar</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- end Modal pembayaran-->
</div>




<!-- js for data tables function -->
<script>
   $(document).ready(function () {
      $('#kasir').DataTable({
         lengthMenu: [
            [3, 25, 50, -1],
            [3, 25, 50, 'All']
         ]
      });
   });
</script>
<!-- js for data tables function -->