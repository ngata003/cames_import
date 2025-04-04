<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> CAMES IMPORT</title>
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="../../assets/images/camesimport.svg" alt="logo">
                </div>
                <h4> Nouveau ici? </h4>
                <h6 class="fw-light"> Inscrivez-vous en remplissant progressivement les champs  </h6>
                <form class="pt-3" method="POST" action="/add_inscriptions" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="name" id="" placeholder="veuillez saisir votre nom ">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="" placeholder="veulllez remplir votre email">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="residence" id="" placeholder="veuillez saisir localisation">
                  </div>
                  <div class="form-group">
                    <input type="tel" class="form-control form-control-lg" name="contact" id="" placeholder="veuillez saisir votre contact">
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" value="admin" name="role" id="">
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" name="type" value="admin" id="">
                  </div>
                  <div class="form-group">
                    <input type="file" class="form-control form-control-lg" name="profil" id="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="" placeholder="Password">
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <input type="submit" value="s'inscrire" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" name="save">
                  </div>
                  <div class="text-center mt-4 fw-light"> Déjà connecté(e) à la plateforme ? <a href="connexion" class="text-primary"> connectez-vous </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/todolist.js"></script>
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
