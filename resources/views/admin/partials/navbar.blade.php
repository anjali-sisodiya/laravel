<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row mt-3" style="padding-top:unset!important">
   <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
   </div>
   <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
      </button>
      <div class="search-field d-none d-md-block">
         <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
               <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
               </div>
               <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
         </form>
      </div>
      <ul class="navbar-nav navbar-nav-right">
         <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
               <div class="nav-profile-img">
                  <img src="images/user4.jpg" alt="image">
                  <span class="availability-status online"></span>
               </div>
               <div class="nav-profile-text">
                  <p class="mb-1 text-black">Admin</p>
               </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
               <div class="dropdown-divider"></div>
               <a class="text-decoration-none" href="/infinite_logout">
               <i class="mdi mdi-logout ms-2 text-primary"></i> Signout </a>
            </div>
         </li>
      </ul>
   </div>
</nav>