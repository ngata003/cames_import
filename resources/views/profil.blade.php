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
                                <p><strong>Adresse :</strong> <span id="user_address"> {{$user->residence}} </span></p>
                            @endif
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProfileModal">Modifier</button>
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
        let index = 0; // Index initial

        function calculerTotal(row) {
            const rowIndex = row.dataset.index;
            const quantiteInput = document.querySelector(`[name="quantite${rowIndex}"]`);
            const prixInput = document.querySelector(`[name="prix_produit${rowIndex}"]`);
            const totalInput = document.querySelector(`[name="total${rowIndex}"]`);

            if (quantiteInput && prixInput && totalInput) {
                let quantite = parseFloat(quantiteInput.value) || 0;
                let prix = parseFloat(prixInput.value) || 0;
                totalInput.value = (quantite * prix).toFixed(2); // Calcul du total
            }
        }

        function ajouterCommande() {
            index++; // Incrémenter l'index pour la nouvelle ligne
            const commandesContainer = document.getElementById('commandesContainer');

            const newRow = document.createElement('div');
            newRow.setAttribute('class', 'row align-items-center g-3 mb-3');
            newRow.setAttribute('data-index', index);

            newRow.innerHTML = `
                <div class="col-md-3">
                    <input type="text" name="nom_produit${index}" class="form-control" placeholder="Nom du produit">
                </div>
                <div class="col-md-3">
                    <input type="number" name="quantite${index}" class="form-control" placeholder="Quantité" min="1">
                </div>
                <div class="col-md-3">
                    <input type="number" name="prix_produit${index}" class="form-control" placeholder="Prix unitaire" step="0.01">
                </div>
                <div class="col-md-2">
                    <input type="number" name="total${index}" class="form-control" placeholder="Total" readonly>
                </div>
                <div class="col-md-1 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm remove-row">supprimer </button>
                </div>
            `;

            commandesContainer.appendChild(newRow);

            // Ajouter les événements pour recalculer le total lors de l'ajout d'une nouvelle ligne
            document.querySelector(`[name="quantite${index}"]`).addEventListener('input', () => calculerTotal(newRow));
            document.querySelector(`[name="prix_produit${index}"]`).addEventListener('input', () => calculerTotal(newRow));
        }

        document.getElementById('ajouterCommande').addEventListener('click', ajouterCommande);

        document.getElementById('commandesContainer').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-row') || event.target.closest('.remove-row')) {
                event.target.closest('.row').remove();
            }
        });

        // Initialisation des événements sur la première ligne au chargement
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[name^="quantite"], [name^="prix_produit"]').forEach(input => {
                input.addEventListener('input', function () {
                    calculerTotal(this.closest('.row'));
                });
            });
        });
    </script>


  </body>
</html>
