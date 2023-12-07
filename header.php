<nav class=" navbar navbar-expand-lg bg-body-tertiary d-flex">
   <div class="container-fluid py-2">
      <a class="h4 navbar-brand mx-5" href="home"><i class="bi bi-prescription2"></i> Inventory Apotek</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
         <ul class="navbar-nav">
            <li class="nav-item dropdown mx-5">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <?= $hasil['username'] ?>
               </a>
               <ul class="dropdown-menu dropdown-menu-end mt-3">
                  <li><a class="dropdown-item rounded-1" href="#"><i class="bi bi-person-lines-fill"></i> Profile</a>
                  </li>
                  <li><a class="dropdown-item rounded-1" href="#"><i class="bi bi-key"></i> Password</a></li>
                  <li><a class="dropdown-item rounded-1" href="logout"><i class="bi bi-door-closed"></i> Log Out</a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>