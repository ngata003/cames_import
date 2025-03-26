
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
                                    <h4 class="card-title card-title-dash"> Espace Retraits </h4>
                                    <p class="card-subtitle card-subtitle-dash"> management des retraits colis </p>
                                </div>
                                <div>
                                </div>
                            </div>
                            <div class="table-responsive mt-1">
                              <table class="table select-table">
                                <thead>
                                    <tr>
                                      <th> Nom client </th>
                                      <th> Nom agence  </th>
                                      <th> status </th>
                                      <th> actions </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($donnees as $data )
                                    <tr>
                                        <td>
                                          <div class="d-flex ">
                                              <span> {{$data->nom_client}} </span>
                                          </div>
                                        </td>
                                        <td>
                                          <h6> {{$data->nom_agence}} </h6>
                                        </td>
                                        <td>
                                            <span> {{$data->status}}</span>
                                        </td>
                                        <td>
                                          <button class="btn btn-success" data-id="{{$data->id}}" onclick="openActiveModal(this)"> activer le retrait </button>
                                          <button class="btn btn-danger" data-id="{{$data->id}}" onclick="openDeleteModal(this)"> supprimer le retrait </button>
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

<div class="modal fade" id="activeModal" tabindex="-1" aria-labelledby="activeModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="activeModalLabel">valider le retrait  </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     a t-il réellement retiré son colis ?
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
      <form method="POST" id="ActiveForm">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-success">Oui</button>
      </form>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="deleteModalLabel">Supprimer un retrait  </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      Êtes-vous sûr de vouloir supprimer ce retrait  ?
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
