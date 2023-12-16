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
                     <a href="jenis"
                        class="nav-link <?= ((isset($_GET['x']) && $_GET['x'] == 'jenis') || !isset($_GET['x'])) ? 'active' : 'link-dark'; ?> link-body-emphasis">
                        <i class="bi bi-file-medical"></i>
                        Kategori Obat
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