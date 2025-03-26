<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        @if (Session()->has('entreprise_active'))
            <a class="navbar-brand brand-logo" href="#">
            <img src="../../assets/images/{{Session('entreprise_active')->logo_entreprise}}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="accueil">
            <img src="../../assets/images/{{Session('entreprise_active')->logo_entreprise}}" alt="logo" />
            </a>
        @endif
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item d-none d-lg-block">
          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
            <span class="input-group-addon input-group-prepend border-right">
              <span class="icon-calendar input-group-text calendar-icon"></span>
            </span>
            <input type="text" class="form-control">
          </div>
        </li>
        <li class="nav-item">
          <form class="search-form" action="#">
            <i class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
          </form>
        </li>

        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            @if (Auth::check())
            <?php $user = Auth::user(); ?>
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="assets/images/{{$user->profil}}"  alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="assets/images/{{$user->profil}}" height="55px" width="55px" alt="Profile image">
              <p class="mb-1 mt-3 fw-semibold">{{$user->name}}</p>
              <p class="fw-light text-muted mb-0">{{$user->email}}</p>
            </div>
            @endif
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Mon profil </a>
            @if (Session()->has('entreprise_active'))
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-home-outline text-primary me-2"></i> {{Session('entreprise_active')->nom_entreprise}} </a>
            @endif
            <a class="dropdown-item" href="deconnexion"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> deconnectez-vous </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
