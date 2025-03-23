
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
