<!DOCTYPE html>
<html lang="en">
  <head>
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
  <style>
   .autocomplete-container {
    position: relative;
    width: 100%;
    }

    .autocomplete-suggestions {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: white;
        border: 1px solid #ddd;
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .suggestion-item {
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid #ddd;
    }

    .suggestion-item:hover {
        background: #f1f1f1;
    }

  </style>
  <body>
    <div class="container-scroller"><nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
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
              <form class="search-form" action="#">
                <i class="icon-search"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here">
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
                <img class="img-xs rounded-circle" src="{{asset('/assets/images/'.$user->profil)}}"  alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{asset('/assets/images/'.$user->profil)}}" height="55px" width="55px" alt="Profile image">
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
                  <a class="nav-link" href="{{ url('/entreprise_management') }}">
                    <i class="menu-icon mdi mdi-home"></i>
                    <span class="menu-title"> Entreprise   </span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/gestionnaires') }}">
                    <i class="menu-icon mdi mdi-account"></i>
                    <span class="menu-title"> Gestionnaires  </span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/profil') }}">
                  <i class="menu-icon mdi mdi-user-circle"></i>
                  <span class="menu-title"> Mon compte   </span>
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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/ajout_commandes') }}"> ajouter une commande </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/command_enregistrees')}}"> commandes enregistrées </a></li>
                  </ul>
                </div>
            </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                  <i class="menu-icon mdi mdi-airplane"></i>
                  <span class="menu-title"> Agences </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="charts">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/agences')}}">Manager les agences </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/depot_colis')}}"> Deposer colis </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/retraits')}}">
                    <i class="menu-icon mdi mdi-cart-check"></i>
                    <span class="menu-title"> retraits  </span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/produits')}}">
                    <i class="menu-icon mdi mdi-package-variant"></i>
                    <span class="menu-title"> produits  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/notifications')}}">
                    <i class="menu-icon mdi mdi-mail"></i>
                    <span class="menu-title"> notifications  </span>
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
                    <form class="form-sample" id="formulaireCommande" method="POST" action="/modifier_commandes/{{$factures->id}}">
                        @csrf
                        @method('PUT')
                      <p class="card-description"> Rentrer une commande  </p>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label"> Nom Client </label>
                            <div class="col-sm-8">
                              <input type="text" name="nom_client" value="{{$factures->nom_client}}" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label"> Email client </label>
                            <div class="col-sm-8">
                              <input type="email" value="{{$factures->email_client}}" name="email_client" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label"> Contact client </label>
                            <div class="col-sm-8">
                              <input type="tel" value="{{$factures->numero_client}}" name="numero_client" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div id="commandesContainer">
                        <div class="row align-items-center g-3 mb-3">
                            @foreach ($commandes as $index => $command )
                            <div class="col-md-3">
                                <div class="autocomplete-container">
                                    <input type="text" id="nom_produit{{$index}}" name="nom_produit{{$index}}" value="{{$command->nom_produit}}" class="form-control" placeholder="Entrer un nom de produit" onkeyup="autoCompletion_produits({{$index}})" />
                                    <div id="suggestions_{{$index}}" class="autocomplete-suggestions"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="quantite{{$index}}" name="qte_commandee{{$index}}" value="{{$command->qte_commandee}}" class="form-control" placeholder="entrer une quantite" oninput="calculTotal({{$index}})" />
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="prix_unitaire{{$index}}" name="prix_unitaire{{$index}}" class="form-control" value="{{$command->prix_unitaire}}" placeholder="entrer un prix de produit" readonly />
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="total{{$index}}" value="{{$command->total}}" name="total{{$index}}" class="form-control" placeholder="ici est le total" readonly />
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="row align-items-center g-3 mb-3">
                        <div class="col-md-3">
                            <select class="form-select form-select-sm" name="moyen_paiement" id="exampleFormControlSelect3">
                                <option value="{{$factures->moyen_paiement}}" selected> {{$factures->moyen_paiement}} </option>
                                <option value="orange_money"> orange money</option>
                                <option value="mobile_money"> mobile money </option>
                                <option value="cash"> cash </option>
                                <option value="paiement_bancaire"> paiement bancaire</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="total_commandee" value="{{$factures->total_achat}}"   name="total_achat" class="form-control" placeholder=" total commande" oninput="calculerReste()"  />
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="montant_paye"  name="montant_paye" class="form-control" placeholder="montant verse" oninput="calculerReste()" />
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="reste" name="reste"  class="form-control" placeholder="reste" readonly />
                        </div>
                        <input type="hidden" name="numRows" value="{{$nbre_lignes}}" id="numRows">
                      </div>

                      <button type="submit" class="btn btn-success me-2"> Enregistrer </button>
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
     document.addEventListener("DOMContentLoaded", function () {
        let index = document.querySelectorAll(".row.align-items-center.g-3.mb-3").length;
        let numRows = document.getElementById("numRows");
        let bouton_ajouter = document.getElementById("ajouterCommande");
        let divCommande = document.getElementById("commandesContainer");

        // Ajouter une nouvelle commande
        bouton_ajouter.addEventListener("click", () => {
            let nouvelleCommande = document.createElement("div");
            nouvelleCommande.classList.add("row", "align-items-center", "g-3", "mb-3");
            nouvelleCommande.id = `commande_${index}`;

            nouvelleCommande.innerHTML = `
                <div class="col-md-3">
                    <div class="autocomplete-container">
                        <input type="text" id="nom_produit${index}" name="nom_produit${index}" class="form-control" placeholder="Entrer un nom de produit" onkeyup="autoCompletion_produits(${index})" />
                        <div id="suggestions_${index}" class="autocomplete-suggestions"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="number" id="quantite${index}" name="qte_commandee${index}" class="form-control" placeholder="Quantité" oninput="calculTotal(${index})" />
                </div>
                <div class="col-md-3">
                    <input type="number" id="prix_unitaire${index}" name="prix_unitaire${index}" class="form-control" placeholder="Prix unitaire" readonly />
                </div>
                <div class="col-md-2">
                    <input type="number" id="total${index}" name="total${index}" class="form-control" placeholder="Total" readonly />
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger px-3 py-1 rounded-pill shadow-sm" onclick="retirerCommande(${index})">
                        <i class="fas fa-trash-alt"></i> Retirer
                    </button>
                </div>
            `;

            divCommande.appendChild(nouvelleCommande);
            index++;
            numRows.value = index;
        });

        // Fonction d'autocomplétion des produits
        window.autoCompletion_produits = function (index) {
            let input = document.getElementById(`nom_produit${index}`);
            let suggestionsContainer = document.getElementById(`suggestions_${index}`);
            let prixUnitaire = document.getElementById(`prix_unitaire${index}`);

            let query = input.value.trim();
            if (query.length < 2) {
                suggestionsContainer.innerHTML = "";
                return;
            }

            fetch(`/autocompletion_produits?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    suggestionsContainer.innerHTML = "";
                    data.forEach(produit => {
                        let suggestion = document.createElement("div");
                        suggestion.textContent = produit.nom_produit;
                        suggestion.classList.add("suggestion-item");
                        suggestion.addEventListener("click", () => {
                            input.value = produit.nom_produit;
                            prixUnitaire.value = produit.prix_unitaire;
                            suggestionsContainer.innerHTML = "";
                            calculTotal(index);
                        });
                        suggestionsContainer.appendChild(suggestion);
                    });
                })
                .catch(error => console.error("Erreur:", error));
        };

        // Calcul du total pour chaque produit
        window.calculTotal = function (index) {
            let quantite = parseFloat(document.getElementById(`quantite${index}`).value) || 0;
            let prix_unitaire = parseFloat(document.getElementById(`prix_unitaire${index}`).value) || 0;
            let totalInput = document.getElementById(`total${index}`);

            let total = quantite * prix_unitaire;
            totalInput.value = total.toFixed(2);
            calculerTotalGeneral();
        };

        // Calcul du total général
        function calculerTotalGeneral() {
            let totalGeneral = 0;
            for (let i = 0; i < index; i++) {
                let totalInput = document.getElementById(`total${i}`);
                if (totalInput) {
                    totalGeneral += parseFloat(totalInput.value) || 0;
                }
            }
            document.getElementById("total_commandee").value = totalGeneral.toFixed(2);
            calculerReste();
        }

        // Calcul du reste à payer
        function calculerReste() {
            let montantPaye = parseFloat(document.getElementById("montant_paye").value) || 0;
            let totalCommande = parseFloat(document.getElementById("total_commandee").value) || 0;
            let reste = document.getElementById("reste");

            let resteAPayer = montantPaye >= totalCommande ? (montantPaye - totalCommande).toFixed(2) : "";
            reste.value = resteAPayer;
        }

        // Supprimer une ligne de commande
        window.retirerCommande = function (index) {
            let commande = document.getElementById(`commande_${index}`);
            if (commande) {
                commande.remove();
                calculerTotalGeneral();
            }
        };
        // Écouteurs pour recalculer les montants
        document.getElementById("montant_paye").addEventListener("input", calculerReste);
        document.getElementById("total_commandee").addEventListener("input", calculerReste);
    });

    </script>
  </body>
</html>
