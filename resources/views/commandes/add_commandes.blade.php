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
              <li class="nav-item">
                  <a class="nav-link" href="entreprise">
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
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Espace Commandes </h4>
                    <form class="form-sample">
                      <p class="card-description"> Rentrer une commande  </p>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label"> Nom Client </label>
                            <div class="col-sm-8">
                              <input type="text" name="nom_client" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label"> Email client </label>
                            <div class="col-sm-8">
                              <input type="email" name="email_client" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label"> Contact client </label>
                            <div class="col-sm-8">
                              <input type="tel" name="contact_client" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div id="commandesContainer">
                        <div class="row align-items-center g-3 mb-3">
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Contact client" />
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Date of Birth (dd/mm/yyyy)" />
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Autre champ" />
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Autre champ" />
                            </div>

                          </div>
                      </div>

                      <button type="submit" class="btn btn-success me-2"> Enregistrer </button>
                      <button class="btn btn-light me-2"> annuler </button>
                      <button type="button" id="ajouterCommande" class="btn btn-primary me-2"> Ajouter une nouvelle commande </button>
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
        document.getElementById('ajouterCommande').addEventListener('click', function() {
            // Sélectionner le conteneur principal
            const commandesContainer = document.getElementById('commandesContainer');

            // Créer un nouveau div avec la même structure que l'original
            const newRow = document.createElement('div');
            newRow.setAttribute('class', 'row align-items-center g-3 mb-3');

            // Remplir le div avec les champs de formulaire
            newRow.innerHTML = `
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Contact client">
                </div>
                <div class="col-md-3">
                    <input type="text"  class="form-control" placeholder="Date of Birth (dd/mm/yyyy)">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Autre champ">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="Autre champ">
                </div>
                <div class="col-md-1 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm remove-row">
                        <i class="bi bi-x-lg"></i> Supprimer
                    </button>
                </div>
            `;

            commandesContainer.appendChild(newRow);
        });
    </script>
  </body>
</html>
