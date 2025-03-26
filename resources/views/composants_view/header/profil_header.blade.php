<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> CAMES IMPORT </title>
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
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
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
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
