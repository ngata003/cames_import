<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> CAMES IMPORT  </title>
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                  <form class="search-form" method="GET" action="/research_gestionnaires">
                    <i class="icon-search"></i>
                    <input type="search" id="nom_gestionnaire" name="nom_gestionnaire" class="form-control" placeholder=" nom ou un email" >
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

      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                @if (Auth::user()->role == "admin")
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
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon mdi mdi-airplane"></i>
                      <span class="menu-title">Agences</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="agences"> Manager les agences </a></li>
                        <li class="nav-item"> <a class="nav-link" href="depot_colis">Deposer colis</a></li>
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
                    <a class="nav-link" href="notifications" style="position: relative;">
                        <div style="position: relative; display: inline-block;">
                            <i class="menu-icon mdi mdi-bell" style="font-size: 24px;"></i>
                            @if(isset($nb_notifications_non_lues) && $nb_notifications_non_lues > 0)
                                <span class="badge badge-danger"
                                    style="
                                        position: absolute;
                                        top: -5px;  /* Monte le badge au-dessus */
                                        right: -5px; /* Ajuste pour qu'il soit bien placé */
                                        font-size: 12px;
                                        padding: 4px 6px;
                                        border-radius: 50%;
                                    ">
                                    {{ $nb_notifications_non_lues }}
                                </span>
                            @endif
                        </div>
                        <span class="menu-title"> Notifications </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil">
                        <i class="menu-icon mdi mdi-account-circle"></i>
                        <span class="menu-title"> profil  </span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role == "importateur")

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
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon mdi mdi-airplane"></i>
                      <span class="menu-title">Agences</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="agences"> Manager les agences </a></li>
                        <li class="nav-item"> <a class="nav-link" href="depot_colis">Deposer colis</a></li>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produits">
                        <i class="menu-icon mdi mdi-package-variant"></i>
                        <span class="menu-title"> produits  </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notifications" style="position: relative;">
                        <div style="position: relative; display: inline-block;">
                            <i class="menu-icon mdi mdi-bell" style="font-size: 24px;"></i>
                            @if(isset($nb_notifications_non_lues) && $nb_notifications_non_lues > 0)
                                <span class="badge badge-danger"
                                    style="
                                        position: absolute;
                                        top: -5px;  /* Monte le badge au-dessus */
                                        right: -5px; /* Ajuste pour qu'il soit bien placé */
                                        font-size: 12px;
                                        padding: 4px 6px;
                                        border-radius: 50%;
                                    ">
                                    {{ $nb_notifications_non_lues }}
                                </span>
                            @endif
                        </div>
                        <span class="menu-title"> Notifications </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil">
                        <i class="menu-icon mdi mdi-account-circle"></i>
                        <span class="menu-title"> profil  </span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role == "secretaire")

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
                    <a class="nav-link" href="notifications" style="position: relative;">
                        <div style="position: relative; display: inline-block;">
                            <i class="menu-icon mdi mdi-bell" style="font-size: 24px;"></i>
                            @if(isset($nb_notifications_non_lues) && $nb_notifications_non_lues > 0)
                                <span class="badge badge-danger"
                                    style="
                                        position: absolute;
                                        top: -5px;  /* Monte le badge au-dessus */
                                        right: -5px; /* Ajuste pour qu'il soit bien placé */
                                        font-size: 12px;
                                        padding: 4px 6px;
                                        border-radius: 50%;
                                    ">
                                    {{ $nb_notifications_non_lues }}
                                </span>
                            @endif
                        </div>
                        <span class="menu-title"> Notifications </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil">
                        <i class="menu-icon mdi mdi-account-circle"></i>
                        <span class="menu-title"> profil  </span>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
