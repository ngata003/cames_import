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
