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
                                      <h4 class="card-title card-title-dash"> Espace Entreprise </h4>
                                      <p class="card-subtitle card-subtitle-dash"> modifier les informations de votre entreprise en toute sécurité. </p>
                                    </div>
                                    <div>

                                    </div>
                                  </div>
                                  <div class="table-responsive  mt-1">
                                    <table class="table select-table">
                                      <thead>
                                        <tr>
                                            <th> Nom Entreprise  </th>
                                            <th> Email Entreprise  </th>
                                            <th> Fax Entreprise  </th>
                                            <th> Site Web   </th>
                                            <th> Logo  </th>
                                            <th> Localisation  </th>
                                            <th> actions </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($infos as $inf  )
                                        <tr>
                                            <td>
                                              <div class="d-flex ">
                                                  <h6>{{$inf->nom_entreprise}}</h6>
                                              </div>
                                            </td>
                                            <td>
                                              <h6>{{$inf->email_entreprise}}</h6>
                                            </td>
                                            <td>
                                              <h6>{{$inf->fax_entreprise}}</h6>
                                            </td>
                                            <td>
                                              <h6>{{$inf->site_web}}</h6>
                                            </td>
                                            <td>
                                              <img src="assets/images/{{$inf->logo_entreprise}}" alt="">
                                            </td>
                                            <td>
                                              <h6>{{$inf->localisation}}</h6>
                                            </td>
                                            <td>
                                              <button class="btn btn-success" data-id="{{$inf->id}}" data-nom="{{$inf->nom_entreprise}}" data-email="{{$inf->email_entreprise}}" data-fax="{{$inf->fax_entreprise}}" data-site="{{$inf->site_web}}" data-localisation="{{$inf->localisation}}" data-image="{{$inf->logo_entreprise}}" onclick="openEditModal(this)"> modifier infos  </button>
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Ajouter une agence   </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST"  action="" id="editForm" >
                        @csrf
                        @method('PUT')
                       <div class="mb-3">
                            <label for="centreName" class="form-label">Nom Entreprise </label>
                            <input type="text" name="nom_entreprise" class="form-control" id="nom_entreprise" placeholder="entrer un nom d'agence valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Email Entreprise </label>
                            <input type="email" name="email_entreprise" class="form-control" id="email_entreprise" placeholder="entrer un email valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Fax Entreprise </label>
                            <input type="tel" name="fax_entreprise" class="form-control" id="fax_entreprise" placeholder="entrer un email valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> site web Entreprise </label>
                            <input type="url" name="site_web"  class="form-control" id="site_web" placeholder="entrer un site web valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> localisation </label>
                            <input type="text" name="localisation" class="form-control" id="localisation" placeholder="entrer une residence">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Logo Entreprise </label>
                            <input type="file" name="logo_entreprise" class="form-control" id="logo_entreprise">
                            <img src="" id="editImage" height="45px" width="45px">
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
        function openEditModal(button) {
            var id = button.getAttribute('data-id');
            var nom = button.getAttribute('data-nom');
            var localisation = button.getAttribute('data-localisation');
            var fax = button.getAttribute('data-fax');
            var email = button.getAttribute('data-email');
            var site_web = button.getAttribute('data-site');
            var logo = button.getAttribute('data-image');

            document.getElementById('editModalLabel').textContent = 'Modifier Votre Entreprise ';
            document.getElementById('editForm').action = '/entreprise_edit/' + id;
            document.getElementById('nom_entreprise').value = nom;
            document.getElementById('localisation').value = localisation;
            document.getElementById('email_entreprise').value = email;
            document.getElementById('fax_entreprise').value = fax;
            document.getElementById('site_web').value = site_web;
            document.getElementById('editImage').src="assets/images/"+ logo;

            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        }
    </script>
  </body>
</html>
