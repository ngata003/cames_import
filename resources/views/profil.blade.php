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
                  <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Profil Utilisateur</h4>
                        <div class="d-flex align-items-center">
                            @if (Auth::check())
                            <?php $user =Auth::user(); ?>
                            <div class="me-4">
                                <img src="assets/images/{{$user->profil}}" alt="Photo de profil" id="user_image"
                                  class="rounded-circle" style="width: 200px; height: 200px; border: 3px solid #ddd;">
                              </div>
                              <div class="flex-grow-1">
                                <h5 class="mb-2" id="user_name"> {{$user->name}}</h5>
                                <p><strong>Email :</strong> <span id="user_email">{{$user->email}}</span></p>
                                <p><strong>Contact :</strong> <span id="user_contact">{{$user->contact}}</span></p>
                                <p><strong>residence :</strong> <span id="user_address"> {{$user->residence}} </span></p>
                                <p><strong>role :</strong> <span id=""> {{$user->role}} </span></p>
                            @endif
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Modifier mes informations </button>
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
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier vos informations en toute securité </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/profil_update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       <div class="mb-3">
                            <label for="" class="form-label">Nom </label>
                            <input type="text" name="name" class="form-control" id="" value="{{$user->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email </label>
                            <input type="text" name="email" class="form-control" id="" value="{{$user->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"> Contact </label>
                            <input type="tel" name="contact" class="form-control" id="" value="{{$user->contact}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"> Residence </label>
                            <input type="text" name="residence" class="form-control" id="" value="{{$user->residence}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"> mot de passe </label>
                            <input type="password" name="password" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"> confirmer mot de passe  </label>
                            <input type="password" name="password_confirmation" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"> image </label>
                            <input type="file" name="image_changee" class="form-control" >
                            <img src="assets/images/{{$user->profil}}" height="45px" width="45px" alt="">
                        </div>
                        <input type="hidden" name="identifiant" value="{{$user->id}}">
                        <div class="button-container">
                          <input type="submit" class="button btn btn-success" name="save" value="Enregistrer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
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

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <script>
        $(document).ready(function () {
            @if ($errors->any())
                $("#errorModal").modal("show");
            @endif
        });
    </script>
  </body>
</html>
