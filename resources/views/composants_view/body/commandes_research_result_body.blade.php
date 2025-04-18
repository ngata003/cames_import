<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
            <div class="tab-content tab-content-basic">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                <div class="row">
                  <div class="col-lg-12 d-flex flex-column">
                    <div class="row flex-grow">
                      <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                              <div>
                                <h4 class="card-title card-title-dash"> Espace Commandes </h4>
                                <p class="card-subtitle card-subtitle-dash"> Management des commandes  </p>
                              </div>
                            </div>
                            <div class="table-responsive mt-1">
                              <table class="table select-table">
                                <thead>
                                    <tr>
                                      <th> id </th>
                                      <th> Nom client </th>
                                      <th> Total commande  </th>
                                      <th> Montant paye </th>
                                      <th> Moyen paiement </th>
                                      <th> reste </th>
                                      <th> date paiament </th>
                                      <th>status</th>
                                      <th> actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commandes as $commande )
                                    <tr>
                                        <td>
                                          <div class="d-flex ">
                                              <h6>{{$commande->id}}</h6>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                              <span> {{$commande->nom_client}} </span>
                                          </div>
                                        </td>
                                        <td>
                                          <h6> {{$commande->total_achat}} </h6>
                                        </td>
                                        <td>
                                          <h6> {{$commande->montant_paye}} </h6>
                                        </td>
                                        <td>
                                          <h6> {{$commande->moyen_paiement}} </h6>
                                        </td>
                                        <td>
                                          <h6> {{$commande->reste}} </h6>
                                        </td>
                                        <td>
                                            <h6>{{$commande->created_at->format('y-m-d')}}</h6>
                                        </td>
                                        <td> non depose </td>
                                        <td>
                                          <button class="btn btn-success text-white" data-id="{{$commande->id}}" data-nom="{{$commande->nom_client}}" data-total_achat="{{$commande->total_achat}}" data-montant_paye="{{$commande->montant_paye}}" data-moyen_paiement="{{$commande->moyen_paiement}}" data-reste="{{$commande->reste}}" onclick="open"> <i class="fas fa-edit"></i> </button>
                                          <button class="btn btn-danger text-white" data-id="{{$commande->id}}" onclick="openDeleteModal(this)" > <i class="fas fa-trash"></i> </button>
                                          <a href="/imprimer_pdf/{{$commande->id}}" class="btn btn-primary text-white"> <i class="icon-printer"></i> </a>
                                          <a href="voir_commandes" class="btn btn-secondary text-white">  <i class="fas fa-eye"></i>  </a>
                                        </td>
                                      </tr>
                                    @endforeach
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

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="deleteModalLabel">Supprimer les commandes  </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      Êtes-vous sûr de vouloir supprimer ces commandes ?
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
      <form method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">Oui</button>
      </form>
    </div>
  </div>
</div>
</div>
