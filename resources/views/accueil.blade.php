<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> CAMES IMPORT </title>
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            @if (Session()->has('entreprise_active'))
            <a class="navbar-brand brand-logo" href="accueil">
                <img src="assets/images/{{Session('entreprise_active')->logo_entreprise}}" alt="logo" />
              </a>
              <a class="navbar-brand brand-logo-mini" href="accueil">
                <img src="assets/images/{{Session('entreprise_active')->logo_entreprise}}" alt="logo" />
            </a>
            @endif

          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                @if (Auth::check())
                <?php $user =Auth::user() ;?>
                <h1 class="welcome-text">Hey , <span class="text-black fw-bold">{{$user->name}}</span></h1>
                @endif
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item d-none d-lg-block">
              <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
                </span>
                <input type="text" class="form-control">
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="icon-mail icon-lg"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 fw-medium float-start">You have 7 unread mails </p>
                  <span class="badge badge-pill badge-primary float-end">View all</span>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                @if (Auth::check())
                <?php $user = Auth::user(); ?>
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle"  src="assets/images/{{$user->profil}}" height="45px" width="45px" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/{{$user->profil}}" height="45px" width="45px"  alt="Profile image">
                  <p class="mb-1 mt-3 fw-semibold">{{$user->name}}</p>
                  <p class="fw-light text-muted mb-0">{{$user->email}}</p>
                </div>
                @endif
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Mon profil </a>
                @if (Session()->has('entreprise_active'))
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-home-outline text-primary me-2"></i> {{Session('entreprise_active')->nom_entreprise }}</a>
                @endif
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> deconnectez-vous </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>

      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="entreprise_management">
                  <i class="menu-icon mdi mdi-home"></i>
                  <span class="menu-title"> Entreprise   </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gestionnaires">
                  <i class="menu-icon mdi mdi-account"></i>
                  <span class="menu-title"> Gestionnaires  </span>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-cart"></i>
                <span class="menu-title"> Commandes </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="ajout_commandes"> ajouter une commande </a></li>
                  <li class="nav-item"><a class="nav-link" href="command_enregistrees"> commandes enregistrées </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="menu-icon mdi mdi-airplane"></i>
                <span class="menu-title"> Agence </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="agences">Manager les agences </a></li>
                  <li class="nav-item"> <a class="nav-link" href="depot_colis"> Deposer colis </a></li>
                  <li class="nav-item"> <a class="nav-link" href="colis_deposes"> colis deposés </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="retraits">
                  <i class="menu-icon mdi mdi-cart-check"></i>
                  <span class="menu-title"> retraits  </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="produits">
                    <i class="menu-icon mdi mdi-package-variant"></i>
                    <span class="menu-title"> produits  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="notifications">
                    <i class="menu-icon mdi mdi-mail"></i>
                    <span class="menu-title"> notifications  </span>
                </a>
              </li>
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                      <div class="btn-wrapper">
                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> telecharger le rapport en pdf </a>
                        <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> exporter les données sous Excel </a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title"> Chiffre d'affaires (CA) </p>
                              <h3 class="rate-percentage">33000000</h3>
                            </div>
                            <div>
                              <p class="statistics-title"> nbre total de commandes de l'année  </p>
                              <h3 class="rate-percentage">7682</h3>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title"> Nbre commandes mensuel  </p>
                              <h3 class="rate-percentage"> 1234</h3>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title"> Chiffre d'affaire mensuel </p>
                              <h3 class="rate-percentage">2m:35s</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                      <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                                      <h5 class="card-subtitle card-subtitle-dash">Lorem Ipsum is simply dummy text of the printing</h5>
                                    </div>
                                    <div id="performanceLine-legend"></div>
                                  </div>
                                  <div class="chartjs-wrapper mt-4">
                                    <canvas id="performanceLine" width=""></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card bg-primary card-rounded">
                                <div class="card-body pb-0">
                                  <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <p class="status-summary-ight-white mb-1">Closed Value</p>
                                      <h2 class="text-info">357</h2>
                                    </div>
                                    <div class="col-sm-8">
                                      <div class="status-summary-chart-wrapper pb-4">
                                        <canvas id="status-summary"></canvas>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                        <div class="circle-progress-width">
                                          <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                        </div>
                                        <div>
                                          <p class="text-small mb-2">Total Visitors</p>
                                          <h4 class="mb-0 fw-bold">26.80%</h4>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <div class="circle-progress-width">
                                          <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                        </div>
                                        <div>
                                          <p class="text-small mb-2">Visits per day</p>
                                          <h4 class="mb-0 fw-bold">9065</h4>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @include('footer');
        </div>
      </div>
    </div>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
  </body>
</html>
