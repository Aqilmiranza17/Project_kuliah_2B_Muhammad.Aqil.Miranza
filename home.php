<?php
include "proses/connect.php";
?>

<div class="col-lg-10 d-flex align-items-start justify-content-center mt-3 home">
   <div class="row d-flex flex-wrap align-items-start justify-content-center text-center">
      <div class="col-lg-3">
         <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
               <h5 class="card-title mx-4">Obat tersedia</h5>
               <div class="col py-4">
                  <?php
                  $results = mysqli_query($conn, "SELECT SUM(stok) AS jumlahStok FROM tb_daftar_obat");
                  while ($row = mysqli_fetch_assoc($results)) {
                     ?>
                     <div class="count">
                        <?php
                        echo $row['jumlahStok'];
                        ?>
                     </div>
                     <?php
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-3">
         <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
               <h5 class="card-title">Obat Masuk</h5>
               <div class="col py-4">
                  <div class="count">
                     0
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-3">
         <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
               <h5 class="card-title">Obat Keluar</h5>
               <div class="col py-4">
                  <?php
                  $results = mysqli_query($conn, "SELECT SUM(jumlah) AS jumlahKeluar FROM tb_order_item");
                  while ($row = mysqli_fetch_assoc($results)) {
                     ?>
                     <div class="count">
                        <?php
                        echo $row['jumlahKeluar'];
                        ?>
                     </div>
                     <?php
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-3">
         <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
               <h5 class="card-title">Karyawan</h5>
               <div class="col py-4">
                  <?php
                  $results = mysqli_query($conn, "SELECT COUNT(id) AS user FROM tb_user");
                  while ($row = mysqli_fetch_assoc($results)) {
                     ?>
                     <div class="count">
                        <?php
                        echo $row['user'];
                        ?>
                     </div>
                     <?php
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>