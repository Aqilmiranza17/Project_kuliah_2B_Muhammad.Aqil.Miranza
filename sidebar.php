<!-- <div class="col-lg-2 px-0">
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
         <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel" style="width: 230px;">
            <div class="offcanvas-body justify-content-center">
               <ul class="navbar navbar-nav align-items-start flex-column flex-grow-2 pe-3 fs-6 ">
                  <li class="nav-item my-2">
                     <a class="nav-link" href="home"><i data-feather="home"></i> Home</a>
                  </li>
                  <li class="nav-item my-2">
                     <a class="nav-link" href="obat"><i data-feather="list"></i> Daftar Obat</a>
                  </li>
                  <li class="nav-item my-2">
                     <a class="nav-link" href="#"><i data-feather="bookmark"></i> Kategori Obat</a>
                  </li>
                  <li class="nav-item my-2">
                     <a class="nav-link" href="user"><i data-feather="users"></i> User</a>
                  </li>
                  <li class="nav-item my-2">
                     <a class="nav-link" href="kasir"><i data-feather="shopping-cart"></i> Kasir</a>
                  </li>
                  <li class="nav-item my-2">
                     <a class="nav-link" href="report"><i data-feather="file-text"></i> Report</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
</div> -->

<div class="col-lg-2 px-0">
   <div class="container-fluid px-0 sidebar">
      <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas"
         data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">Toggle offcanvas</button>

      <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="offcanvasResponsive"
         aria-labelledby="offcanvasResponsiveLabel">
         <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasResponsiveLabel"><i class="bi bi-menu-button-wide"></i> Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive"
               aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
            <div class="d-flex flex-column flex-shrink-0 px-3 bg-body-tertiary" style="width: 280px; height: 90.5vh;">
               <ul class="nav nav-pills flex-column mb-auto fs-6 ">
                  <li>
                     <a href="home"
                        class="nav-link <?= ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active' : 'link-dark'; ?> link-body-emphasis">
                        <i class="bi bi-house" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"
                           aria-hidden="true"></i>
                        Home
                     </a>

                  </li>
                  <li>
                     <a href="obat"
                        class="nav-link <?= ((isset($_GET['x']) && $_GET['x'] == 'obat') || !isset($_GET['x'])) ? 'active' : 'link-dark'; ?> link-body-emphasis">
                        <i class="bi bi-capsule"></i>
                        Daftar Obat
                     </a>
                  </li>
                  <li>
                     <a href="#"
                        class="nav-link <?= ((isset($_GET['x']) && $_GET['x'] == '') || !isset($_GET['x'])) ? 'active' : 'link-dark'; ?> link-body-emphasis">
                        <i class="bi bi-file-medical"></i>
                        Kategori Obat
                     </a>
                  </li>
                  <li>
                     <a href="kasir"
                        class="nav-link <?= ((isset($_GET['x']) && $_GET['x'] == 'kasir') || !isset($_GET['x'])) ? 'active' : 'link-dark'; ?> link-body-emphasis">
                        <i class="bi bi-wallet2"></i>
                        Kasir
                     </a>
                  </li>
                  <?php if ($hasil['level'] == 1) { ?>
                     <li>
                        <a href="user"
                           class="nav-link <?= ((isset($_GET['x']) && $_GET['x'] == 'user') || !isset($_GET['x'])) ? 'active' : 'link-dark'; ?> link-body-emphasis">
                           <i class="bi bi-people"></i>
                           User
                        </a>
                     </li>
                     <li>
                        <a href="report"
                           class="nav-link <?= ((isset($_GET['x']) && $_GET['x'] == 'report') || !isset($_GET['x'])) ? 'active' : 'link-dark'; ?> link-body-emphasis">
                           <i class="bi bi-bar-chart"></i>
                           Report
                        </a>
                     </li>
                  <?php } ?>
               </ul>

            </div>
         </div>
      </div>
   </div>
</div>