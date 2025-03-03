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

                <li class="nav-item dropdown">
                  <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="icon-bell"></i>
                    <span class="count"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                    <a class="dropdown-item py-3 border-bottom">
                      <p class="mb-0 fw-medium float-start">You have 4 new notifications </p>
                      <span class="badge badge-pill badge-primary float-end">View all</span>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                      <div class="preview-thumbnail">
                        <i class="mdi mdi-alert m-auto text-primary"></i>
                      </div>
                      <div class="preview-item-content">
                        <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                        <p class="fw-light small-text mb-0"> Just now </p>
                      </div>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                      <div class="preview-thumbnail">
                        <i class="mdi mdi-lock-outline m-auto text-primary"></i>
                      </div>
                      <div class="preview-item-content">
                        <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                        <p class="fw-light small-text mb-0"> Private message </p>
                      </div>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                      <div class="preview-thumbnail">
                        <i class="mdi mdi-airballoon m-auto text-primary"></i>
                      </div>
                      <div class="preview-item-content">
                        <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                        <p class="fw-light small-text mb-0"> 2 days ago </p>
                      </div>
                    </a>
                  </div>
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
                        <a href="/gestionnaires_pdf" class="btn btn-otline-dark"><i class="icon-printer"></i> imprimer des gestionnaires </a>
                        <a href="/export_users" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Exporter des gestionnaires </a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="d-sm-flex justify-content-between align-items-start">
                                    <div>
                                      <h4 class="card-title card-title-dash"> Espace Gestionnaires </h4>
                                      <p class="card-subtitle card-subtitle-dash"> management des employes </p>
                                    </div>
                                    <div>
                                      <button class="btn btn-primary btn-lg text-white mb-0 me-0" data-bs-toggle="modal" data-bs-target="#importModal" type="button" ><i class="mdi mdi-account-plus"></i>Ajouter un nouveau gestionnaire </button>
                                    </div>
                                  </div>
                                  <div class="table-responsive  mt-1">
                                    <table class="table select-table">
                                      <thead>
                                        <tr>
                                          <th> Nom </th>
                                          <th> Email </th>
                                          <th> Contact </th>
                                          <th> Residence </th>
                                          <th> connecté(e) ?</th>
                                          <th> actions </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($gestionnaires as $gestion )
                                        <tr>
                                            <td>
                                              <div class="d-flex ">
                                                <img src="assets/images/{{$gestion->profil}}" alt="">
                                                <div>
                                                  <span>{{$gestion->name}}</span>
                                                  <p>{{$gestion->role}}</p>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <span> {{$gestion->email}}</span>
                                            </td>
                                            <td>
                                              <div>
                                                  <span> {{$gestion->contact}}</span>
                                              </div>
                                            </td>
                                            <td>
                                                <span> {{$gestion->residence}}</span>
                                            </td>
                                            <td>
                                                @if ($gestion->is_connected)
                                                <div class="badge badge-opacity-success"> connecté(e) </div>
                                                @else
                                                <div class="badge badge-opacity-danger"> Deconnecté(e) </div>
                                                @endif
                                            </td>
                                            <td>
                                              <button class="btn btn-secondary text-white" data-id="{{$gestion->id}}" data-nom="{{$gestion->name}}" data-email= "{{$gestion->email}}" data-contact="{{$gestion->contact}}" data-residence="{{$gestion->residence}}" data-image="{{$gestion->profil}}" data-role="{{$gestion->role}}" onclick="openEditModal(this)"   > modifier </button>
                                              <button class="btn btn-danger text-white" data-id="{{$gestion->id}}" onclick="openDeleteModal(this)" > supprimer </button>
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
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un gestionnaire   </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add_gestionnaires" enctype="multipart/form-data">
                        @csrf
                       <div class="mb-3">
                            <label for="centreName" class="form-label">Nom </label>
                            <input type="text" name="name" class="form-control" id="" placeholder="entrer un nom valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Email </label>
                            <input type="email" name="email" class="form-control" id="centreName" placeholder="entrer un email valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Contact </label>
                            <input type="tel" name="contact" class="form-control" id="" placeholder="entrer un contact valide">
                        </div>
                        <input type="hidden" name="type" value="gestionnaire" class="form-control" id="" placeholder="entrer un type">
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> role du gestionnaire </label>
                            <select name="role" class="form-control" id="">
                                <option> selectionnez un role </option>
                                <option value="importateur"> importateur </option>
                                <option value="secretaire"> secretaire </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> residence </label>
                            <input type="text" name="residence" class="form-control"  placeholder="entrer une localisation">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> profil </label>
                            <input type="file" name="profil" class="form-control" id="">
                        </div>
                        <div class="button-container">
                          <input type="submit" class="button btn btn-success" name="save" value="Enregistrer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Ajouter une agence   </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data"  action="" id="editForm" >
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="centreName" class="form-label">Nom </label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="entrer un nom valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Email </label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="entrer un email valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Contact </label>
                            <input type="tel" name="contact" class="form-control" id="contact" placeholder="entrer un contact valide">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> role du gestionnaire </label>
                            <select name="role" class="form-control" id="role">
                                <option> selectionnez un role </option>
                                <option value="importateur"> importateur </option>
                                <option value="secretaire"> secretaire </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> residence </label>
                            <input type="text" name="residence" id="residence" class="form-control"  placeholder="entrer une localisation">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> profil </label>
                            <input type="file" name="profil" class="form-control" id="">
                        </div>
                        <img src="" alt="" height="45px" width="45px" id="newImage">
                        <div class="button-container">
                          <input type="submit" class="button btn btn-success" name="save" value="Enregistrer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel"> gestionnaire ajouté avec succès </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="mdi mdi-check-circle-outline mdi-36px text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Supprimer le gestionnaire </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Êtes-vous sûr de vouloir supprimer ce gestionnaire ?
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
    <div class="modal fade" id="deleterModal" tabindex="-1" aria-labelledby="deleterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleterModalLabel"> gestionnaire supprimé avec succès. </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="mdi mdi-check-circle-outline mdi-36px text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editeModal" tabindex="-1" aria-labelledby="editeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editeModalLabel"> gestionnaire modifié avec succès </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="mdi mdi-check-circle-outline mdi-36px text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel">Erreur d'insertion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="errorList">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function openEditModal(button) {
            var id = button.getAttribute('data-id');
            var nom = button.getAttribute('data-nom');
            var residence = button.getAttribute('data-residence');
            var contact = button.getAttribute('data-contact');
            var email = button.getAttribute('data-email');
            var role = button.getAttribute('data-role');
            var image = button.getAttribute('data-image');

            document.getElementById('editModalLabel').textContent = 'Editer une agence ';
            document.getElementById('editForm').action = '/gestionnaires_edit/' + id;
            document.getElementById('name').value = nom;
            document.getElementById('email').value = email;
            document.getElementById('residence').value = residence;
            document.getElementById('role').value = role;
            document.getElementById('contact').value = contact;
            document.getElementById('newImage').src = "assets/images/" + image;

            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

        @if(session('gestionnaire_updated'))
            var editeModal = new bootstrap.Modal(document.getElementById('editeModal'));
            editeModal.show();
        @endif
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

        @if(session(''))
            var deleterModal = new bootstrap.Modal(document.getElementById('deleterModal'));
            deleterModal.show();
        @endif
        });
    </script>
    <script>
        function openDeleteModal(button) {
        var id = button.getAttribute('data-id');
        document.getElementById('deleteForm').action = '/gestionnaires_delete/' + id;

        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

        @if(session('gestionnaires_deleted'))
            var deleterModal = new bootstrap.Modal(document.getElementById('deleterModal'));
            deleterModal.show();
        @endif
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

        @if(session('gestionnaire_added'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        @endif
        });
    </script>
    <script>
        $(document).ready(function () {
            @if ($errors->any())
                $("#errorModal").modal("show");
            @endif
        });
    </script>
  </body>
</html>
