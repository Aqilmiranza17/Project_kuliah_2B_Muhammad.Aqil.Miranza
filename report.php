<div class="col-lg-10 d-flex align-items-start justify-content-center mt-3">
   <div class="card w-75 mb-3 border-0">
      <div class="card-body" style="">
         <h5 class="card-title">Report</h5>
         <table class="table table-responsive" id="report">
            <thead>
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Order</th>
                  <th scope="col">Waktu Order</th>
                  <th scope="col">Total Bayar</th>
                  <th scope="col">Total Harga</th>
                  <th scope="col">Pelayan</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $i = 1;
               $kueri = mysqli_query($conn, "SELECT * FROM tb_order");
               while ($row = mysqli_fetch_array($kueri)) {
                  ?>
                  <tr>
                     <td>
                        <?php echo $i++; ?>
                     </td>
                     <td>
                        <?php echo $row['id_order'] ?>
                     </td>
                     <td>
                        <?php echo $row['waktu_order'] ?>
                     </td>
                     <td>
                        <?php echo number_format($row["nominal_uang"], 0, ',', '.') ?>
                     </td>
                     <td>
                        <?php echo number_format($row["total"], 0, ',', '.') ?>
                     </td>
                     <td>
                        <?php echo $row['id_user'] ?>
                     </td>
                     <td>
                        <div class="d-flex">
                           <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                              data-bs-target="#item<?php echo $row['id_order'] ?>"><i
                                 class="bi bi-eyeglasses"></i></button>
                        </div>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>


         <?php $kueri1 = mysqli_query($conn, "SELECT * FROM tb_order");
         while ($row2 = mysqli_fetch_array($kueri1)) {
            ?>
            <!-- modal view item -->
            <div class="modal fade" id="item<?php echo $row2['id_order'] ?>" tabindex="-1"
               aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Report</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th scope="col">Nama Obat</th>
                                 <th scope="col">Jumlah</th>
                                 <th scope="col">Total Harga</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $id_order = $row2['id_order'];
                              $kueri3 = mysqli_query($conn, "SELECT * FROM tb_order_item WHERE id_order='$id_order'");
                              while ($row3 = mysqli_fetch_array($kueri3)) {
                                 ?>
                                 <?php
                                 $id_obat = $row3['id_obat'];
                                 $kueri4 = mysqli_query($conn, "SELECT * FROM tb_daftar_obat WHERE id='$id_obat'");
                                 $row4 = mysqli_fetch_array($kueri4);
                                 $total_harga = $row4['harga'] * $row3['jumlah'];
                                 ?>
                                 <tr>
                                    <td>
                                       <?php echo $row4['nama_obat'] ?>
                                    </td>
                                    <td>
                                       <?php echo $row3['jumlah'] ?>
                                    </td>
                                    <td>
                                       <?php echo "Rp" . number_format($total_harga, 0, ',', '.') ?>
                                    </td>
                                 </tr>
                                 <?php
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end modal view item -->
         <?php } ?>
      </div>
   </div>
</div>

<!-- js for data tables function -->
<script>
   $(document).ready(function () {
      $('#report').DataTable({
         searching: false
         lengthMenu: [
            [5, 10, 30, -1],
            [5, 10, 30, 'All']
         ]
      });
   });
</script>
<!-- js for data tables function -->