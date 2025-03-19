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
                <a class="nav-link" href="profil">
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
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Espace Commandes </h4>
                    <form class="form-sample" id="formulaireCommande" method="POST" action="/save_commandes">
                        @csrf
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
                                    <input type="text" id="nom_produit{{$index}}" name="nom_produit{{$index}}" value="{{$command->nom_produit}}" class="form-control" placeholder="Entrer un nom de produit" onkeyup="autoCompletion_produits(0)" />
                                    <div id="suggestions_{{$index}}" class="autocomplete-suggestions"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="quantite{{$index}}" name="qte_commandee{{$index}}" value="{{$command->qte_commandee}}" class="form-control" placeholder="entrer une quantite" oninput="calculTotal(0)" />
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
                            <input type="number" id="total_commandee" value="{{$factures->total_achat}}"  name="total_achat" class="form-control" placeholder=" total commande" oninput="calculerReste()"  />
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="montant_paye" value="{{$factures->montant_paye}}" name="montant_paye" class="form-control" placeholder="montant verse" oninput="calculerReste()" />
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="reste" name="reste" value="{{$factures->reste}}" class="form-control" placeholder="reste" readonly />
                        </div>
                        <input type="number" name="numRows" id="numRows">
                      </div>

                      <button type="submit" class="btn btn-success me-2"> Enregistrer </button>
                      <button class="btn btn-danger me-2" id="btnAnnuler" > recommencer la commande </button>
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
        document.addEventListener('DOMContentLoaded', () => {
    let index = document.querySelectorAll('[id^=nom_produit]').length;
    let numRows = document.getElementById('numRows');
    let boutonAjouter = document.getElementById('ajouterCommande');
    let divCommande = document.getElementById('commandesContainer');

    boutonAjouter.addEventListener('click', () => {
        let nouvelleCommande = document.createElement('div');
        nouvelleCommande.classList.add('row', 'align-items-center', 'g-3', 'mb-3');
        nouvelleCommande.id = `nouvelle_commande${index}`;

        nouvelleCommande.innerHTML = `
            <div class="col-md-3">
                <div class="autocomplete-container">
                    <input type="text" id="nom_produit${index}" name="nom_produit[${index}]" class="form-control" placeholder="Entrer un nom de produit" onkeyup="autoCompletionProduits(${index})" />
                    <div id="suggestions_${index}" class="autocomplete-suggestions"></div>
                </div>
            </div>
            <div class="col-md-3">
                <input type="number" id="quantite${index}" name="qte_commandee[${index}]" class="form-control" placeholder="Entrer une quantité" oninput="calculTotal(${index})" />
            </div>
            <div class="col-md-3">
                <input type="number" id="prix_unitaire${index}" name="prix_unitaire[${index}]" class="form-control" placeholder="Prix unitaire" readonly />
            </div>
            <div class="col-md-2">
                <input type="number" id="total${index}" name="total[${index}]" class="form-control" placeholder="Total" readonly />
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger px-3 py-1 rounded-pill shadow-sm" onclick="retirerCommande(${index}, this)">
                    <i class="fas fa-trash-alt"></i> Retirer
                </button>
            </div>
        `;

        divCommande.appendChild(nouvelleCommande);
        index++;
        numRows.value = index;
    });

    window.autoCompletionProduits = function(index) {
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
            .catch(error => console.error('Erreur:', error));
    };

    window.calculTotal = function(index) {
        let quantite = parseFloat(document.getElementById(`quantite${index}`).value) || 0;
        let prixUnitaire = parseFloat(document.getElementById(`prix_unitaire${index}`).value) || 0;
        document.getElementById(`total${index}`).value = (quantite * prixUnitaire).toFixed(2);
        calculerTotalGeneral();
    };

    function calculerTotalGeneral() {
        let totalGeneral = [...document.querySelectorAll('[id^=total]')].reduce((acc, input) => acc + (parseFloat(input.value) || 0), 0);
        document.getElementById('total_commandee').value = totalGeneral.toFixed(2);
        calculerReste();
    }

    function calculerReste() {
        let montant = parseFloat(document.getElementById('montant_paye').value) || 0;
        let totalCom = parseFloat(document.getElementById('total_commandee').value) || 0;
        document.getElementById('reste').value = montant >= totalCom ? (montant - totalCom).toFixed(2) : '';
    }

    document.getElementById('btnAnnuler').addEventListener('click', event => {
        event.preventDefault();
        document.getElementById('formulaireCommande').reset();
        document.getElementById('commandesContainer').innerHTML = "";
        index = 0;
        numRows.value = index;
    });

    window.retirerCommande = function(index, bouton) {
        event.preventDefault();
        let commande = document.getElementById(`nouvelle_commande${index}`);
        if (commande) {
            commande.remove();
            calculerTotalGeneral();
            }
        };
    });
    </script>
  </body>
</html>
