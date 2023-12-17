<?php
// Set the time zone to Jakarta
date_default_timezone_set('Asia/Jakarta');

// Get the current date and time in Jakarta's time zone
$currenttimes = date("H:i:s");
$currentyears = date("Y-m-d");

?>


<div class="col-lg-10 d-flex align-items-start justify-content-center mt-3">
   <div class="row d-flex justify-content-center">
      <div class="card w-75 mb-3 border-0">
         <div class="card-body">
            <h1 class="text-center">
               <?= $currentyears ?>
            </h1>
            <h1 class="text-center">
               <?= $currenttimes ?>
            </h1>
         </div>
      </div>
      <div class="row d-flex">
         <div class="col-lg-4">
            <div class="card mb-3" style="width: 18rem;">
               <div class="card-body">
                  <h5 class="card-title">Obat Keluar</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, et aut nemo autem ipsum
                     consectetur.</p>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="card mb-3" style="width: 18rem;">
               <div class="card-body">
                  <h5 class="card-title">Obat Masuk</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, et aut nemo autem ipsum
                     consectetur.</p>
               </div>
            </div>
         </div>

         <div class="col-lg-4">
            <div class="card mb-3" style="width: 18rem;">
               <div class="card-body">
                  <h5 class="card-title">Obat tersedia</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, et aut nemo autem ipsum
                     consectetur.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>