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
                                    <h4 class="card-title card-title-dash"> Espace notifications </h4>
                                    <p class="card-subtitle card-subtitle-dash"> management des notifications </p>
                                </div>
                                <div>
                                </div>
                            </div>
                            <div class="table-responsive mt-1">
                              <table class="table select-table">
                                <thead>
                                    <tr>
                                      <th> description </th>
                                      <th> date d'envoi </th>
                                      <th> status </th>
                                      <th> actions </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($notifications as $notification )
                                    <tr>
                                        <td>
                                          <span>
                                            {{$notification->description}}
                                          </span>
                                        </td>
                                        <td>
                                          <h6> {{$notification->created_at}}</h6>
                                        </td>
                                        <td>
                                            <span> {{$notification->status}} </span>
                                        </td>
                                        <td>
                                          <button class="btn btn-success" data-id="{{$notification->id}}" data-description="{{$notification->description}}" onclick="openReadModal(this)"><i class="fas fa-eye text-white"></i> </button>
                                          <button class="btn btn-danger" data-id="{{$notification->id}}" onclick="openDeleteModal(this)"><i class="fas fa-trash text-white"></i></button>
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
          <h5 class="modal-title" id="activeModalLabel"> Notification </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="modalDescription">Chargement...</p>
        </div>
        <div class="modal-footer">
          <form method="POST" id="ActiveForm">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success">Marquer comme lu</button>
          </form>
        </div>
      </div>
    </div>
  </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Supprimer la notification  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Êtes-vous sûr de vouloir supprimer cette notification  ?
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

