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
                              <input type="tel" name="numero_client" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div id="commandesContainer">
                        <div class="row align-items-center g-3 mb-3">
                            <div class="col-md-3">
                                <input type="text" id="nom_produit0" name="nom_produit0" class="form-control" placeholder="entrer un nom de produit" />
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="quantite0" name="qte_commandee0" class="form-control" placeholder="entrer une quantite" oninput="calculTotal(0)" />
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="prix_unitaire0" name="prix_unitaire0" class="form-control" placeholder="entrer un prix de produit" oninput="calculTotal(0)" />
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="total0" name="total0" class="form-control" placeholder="ici est le total" readonly />
                            </div>
                        </div>
                      </div>

                      <div class="row align-items-center g-3 mb-3">
                        <div class="col-md-3">
                            <select class="form-select form-select-sm" name="moyen_paiement" id="exampleFormControlSelect3">
                                <option selected> moyen paiement </option>
                                <option value="orange_money"> orange money</option>
                                <option value="mobile_money"> mobile money </option>
                                <option value="cash"> cash </option>
                                <option value="paiement_bancaire"> paiement bancaire</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="total_commandee"  name="total_achat" class="form-control" placeholder=" total commande" oninput="calculerReste()"  />
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="montant_paye" name="montant_paye" class="form-control" placeholder="montant verse" oninput="calculerReste()" />
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="reste" name="reste" class="form-control" placeholder="reste" readonly />
                        </div>
                        <input type="hidden" name="numRows" id="numRows">
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
        let index = 1;
        let numRows = document.getElementById('numRows');
        let bouton_ajouter = document.getElementById('ajouterCommande');
        let divCommande = document.getElementById('commandesContainer');
        bouton_ajouter.addEventListener('click', ()=>{
            let nouvelleCommande = document.createElement('div');
            nouvelleCommande.classList.add('row' ,'align-items-center' ,'g-3' ,'mb-3', 'test');
            nouvelleCommande.id =`nouvelle_commande${index}`;

            nouvelleCommande.innerHTML = `

             <div class="col-md-3">
                <input type="text" id="nom_produit${index}" name="nom_produit${index}" class="form-control" placeholder="entrer un nom de produit" />
            </div>
            <div class="col-md-3">
                <input type="number" id="quantite${index}" name="qte_commandee${index}" class="form-control" placeholder="entrer une quantite" oninput="calculTotal(${index})" />
            </div>
            <div class="col-md-3">
                <input type="number" id="prix_unitaire${index}" name="prix_unitaire${index}" class="form-control" placeholder="entrer un prix de produit" oninput="calculTotal(${index})" />
            </div>
            <div class="col-md-2">
                <input type="number" id="total${index}" name="total${index}" class="form-control" placeholder="ici est le total" readonly />
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger px-3 py-1 rounded-pill shadow-sm" onclick="retirerCommande(${index}, this)"><i class="fas fa-trash-alt"></i> Retirer</button>
            </div>
           `;

           divCommande.appendChild(nouvelleCommande);
           index++;

           numRows.value = index;
        });

        function calculTotal(index){
            const quantiteInput = document.getElementById(`quantite${index}`);
            const prix_unitaireInput = document.getElementById(`prix_unitaire${index}`);
            const totalInput = document.getElementById(`total${index}`);

            const quantite = parseFloat(quantiteInput.value)||0;
            const prix_unitaire = parseFloat(prix_unitaireInput.value)||0;

            const total = quantite*prix_unitaire;
            totalInput.value =total.toFixed(2);

            calculerTotalGeneral();
        }


        // fonction pour calculer le grand total
        function calculerTotalGeneral(){
            let totalGeneral = 0;

            for (let i = 0; i < index; i++) {
                let totalComInput = document.getElementById(`total${i}`);

                if (totalComInput) {
                    totalGeneral += parseFloat(totalComInput.value);
                }

                document.getElementById('total_commandee').value = totalGeneral.toFixed(2);
            }

            calculerReste();
        }

        // fonction pour calculer le reste
        function calculerReste(){

            let montantInput = document.getElementById('montant_paye');
            let reste = document.getElementById('reste');
            let total_commandeeInput = document.getElementById('total_commandee');

            montant = parseFloat(montantInput.value);
            total_com = parseFloat(total_commandeeInput.value);

            if ( montant >= total_com){
                let restes = montant - total_com;

                reste.value = restes.toFixed(2);
            }

            else{
                reste.value = '';
            }
        }

        // fonction pour réinitialiser le formulaire
        function resetForm(){
            bouton = document.getElementById('btnAnnuler');
            bouton.addEventListener('click', function(event){
                event.preventDefault();
                document.getElementById('formulaireCommande').reset();

                document.getElementById('total_commandee').value='';
                document.getElementById('reste').value = '';
                document.getElementById('commandesContainer').innerHTML =`
                 <div class="row align-items-center g-3 mb-3">
                    <div class="col-md-3">
                        <input type="text" id="nom_produit0" name="nom_produit0" class="form-control" placeholder="entrer un nom de produit" />
                    </div>
                    <div class="col-md-3">
                        <input type="number" id="quantite0" name="quantite0" class="form-control" placeholder="entrer une quantite" oninput="calculTotal(0)" />
                    </div>
                    <div class="col-md-3">
                        <input type="number" id="prix_unitaire0" name="prix_unitaire0" class="form-control" placeholder="entrer un prix de produit" oninput="calculTotal(0)" />
                    </div>
                    <div class="col-md-3">
                        <input type="number" id="total0" name="total0" class="form-control" placeholder="ici est le total" readonly />
                    </div>
                </div>
                `

                index = 1;
                numRows.value = index;
            })
        }

        resetForm();

        //fonction pour retirer les commandes.

        function retirerCommande(index, bouton){
            event.preventDefault();
            let commande = document.getElementById(`nouvelle_commande${index}`);
            let totalInput = document.getElementById(`total${index}`);
            let totalComInput = document.getElementById('total_commandee');

            if (commande && totalInput) {

                let totalCommande = parseFloat(totalInput.value);


                let totalGeneral = parseFloat(totalComInput.value);
                totalGeneral -= totalCommande;

                totalComInput.value = totalGeneral.toFixed(2);

                commande.remove();
            }

            else{
                console.log("Erreur : element non trouve");
            }
        }

    </script>
  </body>
</html>
