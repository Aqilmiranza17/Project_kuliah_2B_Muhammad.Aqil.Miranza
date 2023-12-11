<?php
// Set the time zone to Jakarta
date_default_timezone_set('Asia/Jakarta');

// Get the current date and time in Jakarta's time zone
$currenttimes = date("H:i:s");
$currentyears = date("Y-m-d");

?>


<div class="col-lg-10 d-flex align-items-start justify-content-center mt-3">
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
</div>