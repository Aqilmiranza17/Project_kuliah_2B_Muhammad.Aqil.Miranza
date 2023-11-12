<?php
include("proses/connect.php");
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu");
while ($row = mysqli_fetch_array($query)) {
  $result[] = $row;
}

$query_chart = mysqli_query($conn, "SELECT nama_menu, tb_daftar_menu.id, SUM(tb_list_order.jumlah) AS total_jumlah FROM tb_daftar_menu
  LEFT JOIN tb_list_order ON tb_daftar_menu.id = tb_list_order.menu
  GROUP BY tb_daftar_menu.id
  ORDER BY tb_daftar_menu.id ASC");

// $result_chart = array();
while ($record_chart = mysqli_fetch_array($query_chart)) {
  $result_chart[] = $record_chart;
}

$array_menu = array_column($result_chart, "nama_menu");
$array_menu_qoute = array_map(function ($menu) {
  return "'" . $menu . "'";
}, $array_menu);
$string_menu = implode(",", $array_menu_qoute);

// echo $string_menu . "<br>";

$array_jumlah_pesanan = array_column($result_chart, "total_jumlah");
$string_jumlah_pesanan = implode(",", $array_jumlah_pesanan);
// echo $string_jumlah_pesanan . "\n";

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="col-lg-9  mt-2">
  <!-- carousel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?php
      $slide = 0;
      $firstslidebutton = true;
      foreach ($result as $datatombol) {
        ($firstslidebutton) ? $aktiv = "active" : $aktiv = "";
        $firstslidebutton = false;
        ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $slide ?>"
          class="<?= $aktiv ?>" aria-current="true" aria-label="Slide <?= $slide + 1 ?>"></button>
        <?php
        $slide++;
      } ?>
    </div>
    <div class="carousel-inner rounded">
      <?php
      $firstslide = true;
      foreach ($result as $data) {
        ($firstslide) ? $aktiv = "active" : $aktiv = "";
        $firstslide = false;
        ?>
        <div class="carousel-item <?= $aktiv ?>">
          <img src="assets/image/<?= $data["foto"] ?>" class="img-fluid" alt="..."
            style="height: 250px; width: 1000px; object-fit:cover;">
          <div class="carousel-caption d-none d-md-block">
            <h5>
              <?= $data['nama_menu'] ?>
            </h5>
            <p>
              <?= $data['keterangan'] ?>
            </p>
          </div>
        </div>
      <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- end carousel -->

  <!-- judul -->
  <div class="card mt-4 border-0 bg-light rounded">
    <div class="card-body text-center">
      <h5 class="card-title">DECAFE - APLIKASI PEMESANAN MAKANAN DAN MINUMAN CAFE</h5>
      <p class="card-text">Aplikasi pemesanan makanan dan minuman yang mudah dan praktis. Nikmati makanan dan minuman
        favorit anda dengan hanya klik. Pesan, bayar dan lacak pesanan anda dengan mantap melalui aplikasi ini
      </p>
      <a href="order" class="btn btn-primary">Buat Orderan Pertama anda</a>
    </div>
  </div>
  <!-- judul end -->

  <!-- chart -->
  <div class="card mt-4 border-0 bg-light rounded">
    <div class="card-body text-center">
      <div>
        <canvas id="myChart"></canvas>
      </div>

      <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: [<?= $string_menu ?>],
            datasets: [{
              label: 'Jumlah Porsi Terjual',
              data: [<?= $string_jumlah_pesanan ?>],
              borderWidth: 1,
              backgroundColor: [
                'rgba(245, 39, 102, 0.45)',
                'rgba(49, 87, 201, 0.44)',
                'rgba(209, 230, 24, 0.44)',
                'rgba(16, 243, 80, 0.55)',
                'rgba(90, 17, 222, 0.55)',
                'rgba(226, 131, 18, 0.8)'
              ]
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    </div>
  </div>
  <!-- end chart -->
</div>