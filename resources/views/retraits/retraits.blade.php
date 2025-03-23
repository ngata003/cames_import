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

        <div class="main-panel">
            <div class="content-wrapper">
              <div class="row">
                <div class="col-sm-12">
                  <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                      <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                          <div class="col-lg-12 d-flex flex-column">
                            <div class="row flex-grow">
                              <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                  <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash"> Espace Retraits </h4>
                                            <p class="card-subtitle card-subtitle-dash"> management des retraits colis </p>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-1">
                                      <table class="table select-table">
                                        <thead>
                                            <tr>
                                              <th> Nom client </th>
                                              <th> Nom agence  </th>
                                              <th> status </th>
                                              <th> actions </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($donnees as $data )
                                            <tr>
                                                <td>
                                                  <div class="d-flex ">
                                                      <span> {{$data->nom_client}} </span>
                                                  </div>
                                                </td>
                                                <td>
                                                  <h6> {{$data->nom_agence}} </h6>
                                                </td>
                                                <td>
                                                    <span> {{$data->status}}</span>
                                                </td>
                                                <td>
                                                  <button class="btn btn-success" data-id="{{$data->id}}" onclick="openActiveModal(this)"> activer le retrait </button>
                                                  <button class="btn btn-danger" data-id="{{$data->id}}" onclick="openDeleteModal(this)"> supprimer le retrait </button>
                                                </td>
                                              </tr>
                                            @endforeach
                                          </tbody>
                                      </table>
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
            @include('footer')
        </div>
      </div>
    </div>

    <div class="modal fade" id="activeModal" tabindex="-1" aria-labelledby="activeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="activeModalLabel">valider le retrait  </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             a t-il réellement retiré son colis ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
              <form method="POST" id="ActiveForm">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">Oui</button>
              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Supprimer un retrait  </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Êtes-vous sûr de vouloir supprimer ce retrait  ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
              <form method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Oui</button>
              </form>
            </div>
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

    <script>
        function openDeleteModal(button) {
        var id = button.getAttribute('data-id');
        document.getElementById('deleteForm').action = '/agences_delete/' + id;

        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
        }
    </script>

    <script>
        function openDeleteModal(button) {
        var id = button.getAttribute('data-id');
        document.getElementById('ActiveForm').action = '/retraits_active/' + id;

        var activeModal = new bootstrap.Modal(document.getElementById('ActiveModal'));
        activeModal.show();
        }
    </script>

  </body>

</html>
