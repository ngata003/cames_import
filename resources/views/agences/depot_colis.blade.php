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
                        <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> importer des depots  sur excel</a>
                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> imprimer des depots sous PDF </a>
                        <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Exporter des depots sur Excel </a>
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
                                      <h4 class="card-title card-title-dash"> Espace Depot Colis  </h4>
                                      <p class="card-subtitle card-subtitle-dash"> management des depots de colis   </p>
                                    </div>
                                    <div>
                                      <button class="btn btn-primary btn-lg text-white mb-0 me-0" data-bs-toggle="modal" data-bs-target="#importModal" type="button"><i class="mdi mdi-cart"></i>ajouter  un depot </button>
                                    </div>
                                  </div>
                                  <div class="table-responsive  mt-1">
                                    <table class="table select-table">
                                      <thead>
                                        <tr>
                                          <th>  Nom client </th>
                                          <th>  Nom agence </th>
                                          <th>  Couleur colis </th>
                                          <th>  Image colis </th>
                                          <th>  Moyen transport</th>
                                          <th>  Date_depart </th>
                                          <th> progression </th>
                                          <th> status </th>
                                          <th> actions </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div>
                                            <span> name </span>
                                            </div>
                                          </td>
                                          <td>
                                            <div>
                                            <h6> jfi </h6>
                                            </div>
                                          </td>
                                          <td>
                                            <div>
                                                <span> jaune </span>
                                            </div>
                                          </td>
                                          <td>
                                            <div>
                                                <img src="" height="45px" width="45px" alt="">
                                            </div>
                                          </td>
                                          <td>
                                            <div>
                                                <span> transport par bateau</span>
                                            </div>
                                          </td>
                                          <td>
                                            <div>
                                                <span> 11-06-2002 </span>
                                            </div>
                                          </td>
                                          <td>
                                            <div>
                                              <div class="progress progress-md">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <div>
                                                <span> en route </span>
                                            </div>
                                          </td>
                                          <td>
                                            <button class="btn btn-success"> modifier </button>
                                            <button class="btn btn-danger"> supprimer </button>
                                          </td>
                                        </tr>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un depot    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add_agences" enctype="multipart/form-data">
                        @csrf
                       <div class="mb-3">
                            <label for="centreName" class="form-label"> Nom Client  </label>
                            <select name="nom_client" class="form-control" id="">
                                <option> selectionnez un client  </option>
                                @foreach ($clients  as $clt )
                                <option value="{{$clt->nom_client}}"> {{$clt->nom_client}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="centreName" class="form-label"> Nom de l'agence </label>
                            <select name="role" class="form-control" id="">
                                <option> selectionnez une agence  </option>
                                @foreach ($agences as $agence )
                                <option value="{{$agence->nom_agence}}"> {{$agence->nom_agence}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date_depart" class="form-label"> date depart  </label>
                            <input type="date" name="date_depart" class="form-control" id="" placeholder="entrer une date valide ">
                        </div>
                        <div class="mb-3">
                            <label for="couleur_colis" class="form-label"> couleur du colis (facultatif si image)  </label>
                            <input type="text" name="couleur_colis" class="form-control" id="" placeholder="entrez la couleur du paquet du colis">
                        </div>
                        <div class="mb-3">
                            <label for="imageColis" class="form-label">image du colis </label>
                            <input type="file" name="image_colis" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">moyen de transport </label>
                            <select name="moyen_transport" class="form-control" id="">
                                <option> selectionnez un moyen de transport  </option>
                                <option value="transport_aerien"> transport aerien </option>
                                <option value="transport_marin"> transport marin </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> durée du trajet </label>
                            <input type="number" name="duree_trajet" class="form-control" id="" placeholder="Ex: 30 j ">
                        </div>
                        <input type="hidden" name="status" value="deposé">
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
  </body>
</html>
