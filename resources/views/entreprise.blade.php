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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin">
                @if (Auth::check())
                <?php $user =Auth::user(); ?>
                @endif
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Enregistrer Une entreprise </h4>
                    <form class="form-sample" method="POST" action="/add_entreprise" enctype="multipart/form-data">
                        @csrf
                        <p class="card-description"> veuillez remplir les informations de votre entreprise </p>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label" > Nom Entreprise: </label>
                              <div class="col-sm-9">
                                <input type="text" name="nom_entreprise" class="form-control" placeholder="exemple: cames SHop " />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Email Entreprise: </label>
                              <div class="col-sm-9">
                                <input type="email" name="email_entreprise" class="form-control" placeholder="entrer un email d'entreprise valide " />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Fax Entreprise:  </label>
                              <div class="col-sm-9">
                                <input class="form-control" name="fax_entreprise" placeholder="veuillez entrer le contat de votre entreprise" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"> Site Web:  </label>
                              <div class="col-sm-9">
                                <input class="form-control" name="site_web" placeholder="entrer le lien du site sous la forme yyy.com ou https://waerte.com" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label"> Localisation :  </label>
                                  <div class="col-sm-9">
                                    <input class="form-control" type="text" name="localisation" placeholder="entrer votre ville de residence" />
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label"> Logo Entreprise :  </label>
                                  <div class="col-sm-9">
                                    <input class="form-control" type="file" name="logo_entreprise" placeholder="" />
                                  </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary me-2" name="save" value="enregistrer les informations de l'entreprise ">
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @include('footer')
        </div>
      </div>
    </div>
     <!-- Modal Bootstrap pour les erreurs -->
     <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel">Erreur d'inscription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="errorList">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }} </li>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            @if ($errors->any())
                $("#errorModal").modal("show");
            @endif
        });
    </script>
 </body>
</html>
