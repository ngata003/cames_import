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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
     @include('header')
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
                    <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="form-elements">
                      <i class="menu-icon mdi mdi-airplane"></i>
                      <span class="menu-title"> agences </span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="agences"> Manager les agences </a></li>
                        <li class="nav-item"> <a class="nav-link" href="depot_colis"> Deposer colis </a></li>
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
                    <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="form-elements">
                      <i class="menu-icon mdi mdi-airplane"></i>
                      <span class="menu-title"> agences </span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="agences"> Manager les agences </a></li>
                        <li class="nav-item"> <a class="nav-link" href="depot_colis"> Deposer colis </a></li>
                      </ul>
                    </div>
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
                    <a class="nav-link" href="notifications">
                        <i class="menu-icon mdi mdi-mail"></i>
                        <span class="menu-title"> notifications  </span>
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
