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
              <a class="nav-link" href="index.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">UI Elements</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="menu-icon mdi mdi-layers-outline"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/icons/font-awesome.html">Font Awesome</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title"> Commandes </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href=""> </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="docs/documentation.html">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
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
                        <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> importer des gestionnaires sur excel</a>
                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> imprimer des gestionnaires </a>
                        <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Exporter des gestionnaires </a>
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
                                      <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Ajouter un nouveau gestionnaire </button>
                                    </div>
                                  </div>
                                  <div class="table-responsive  mt-1">
                                    <table class="table select-table">
                                      <thead>
                                        <tr>
                                          <th> Nom </th>
                                          <th> Email </th>
                                          <th> Contact </th>
                                          <th> localisation </th>
                                          <th> connecté(e) ?</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <div class="d-flex ">
                                              <img src="assets/images/faces/face1.jpg" alt="">
                                              <div>
                                                <h6>Brandon Washington</h6>
                                                <p>Head admin</p>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <h6>Company name 1</h6>
                                          </td>
                                          <td>
                                            <div>
                                                <h6> 65788997766</h6>
                                            </div>
                                          </td>
                                          <td>
                                            <h6> Douala pk15 </h6>
                                          </td>
                                          <td>
                                            <div class="badge badge-opacity-warning">In progress</div>
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
