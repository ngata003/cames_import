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
                              <h4 class="card-title card-title-dash"> Espace Agences </h4>
                              <p class="card-subtitle card-subtitle-dash"> management des agences de transport  </p>
                              </div>
                              <div>
                                  <button class="btn btn-primary btn-lg text-white mb-0 me-0"  data-bs-toggle="modal" data-bs-target="#importModal" type="button"><i class="mdi mdi-airplane"></i>Ajouter une nouvelle agence </button>
                              </div>
                          </div>
                          <div class="table-responsive mt-1">
                            <table class="table select-table">
                              <thead>
                                  <tr>
                                    <th> Nom Agence </th>
                                    <th> Email Agence  </th>
                                    <th> Contact Agence </th>
                                    <th> site web Agence</th>
                                    <th>localisation</th>
                                    <th> actions </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($agences as $agen )
                                  <tr>
                                      <td>
                                        <div>
                                        <h6> {{$agen->nom_agence}} </h6>
                                        </div>
                                      </td>
                                      <td>
                                        <div>
                                        <h6>{{$agen->email_agence}} </h6>
                                        </div>
                                      </td>
                                      <td>
                                        <div>
                                            <h6> {{$agen->contact_agence}}</h6>
                                        </div>
                                      </td>
                                      <td>
                                        <h6> {{$agen->site_web}} </h6>
                                      </td>
                                      <td>
                                        <div>
                                            <h6> {{$agen->localisation}} </h6>
                                        </div>
                                      </td>
                                      <td>
                                        <button class="btn btn-success text-white" data-id="{{$agen->id}}" data-nom="{{$agen->nom_agence}}" data-email="{{$agen->email_agence}}" data-contact="{{$agen->contact_agence}}" data-site_web="{{$agen->site_web}}" data-localisation="{{$agen->localisation}}" onclick="openEditModal(this)" > modifier </button>
                                        <button class="btn btn-danger text-white " data-id="{{$agen->id}}" onclick="openDeleteModal(this)"> supprimer </button>
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

    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une agence   </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add_agences" >
                        @csrf
                       <div class="mb-3">
                            <label for="centreName" class="form-label">Nom Agence </label>
                            <input type="text" name="nom_agence" class="form-control" id="" placeholder="entrer un nom d'agence valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Email Agence </label>
                            <input type="email" name="email_agence" class="form-control" id="" placeholder="entrer un email valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> site web Agence </label>
                            <input type="text" name="site_web" class="form-control" id="" placeholder="entrer un site web valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Contact Agence </label>
                            <input type="tel" name="contact_agence" class="form-control" id="" placeholder="entrer un contact valide">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> localisation </label>
                            <input type="text" name="localisation" class="form-control" id="" placeholder="entrer une residence">
                        </div>
                        <div class="button-container">
                          <input type="submit" class="button btn btn-success" name="save" value="Enregistrer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Ajouter une agence   </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST"  action="" id="editForm" >
                        @csrf
                        @method('PUT')
                       <div class="mb-3">
                            <label for="centreName" class="form-label">Nom Agence </label>
                            <input type="text" name="nom_agence" class="form-control" id="nom_agence" placeholder="entrer un nom d'agence valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Email Agence </label>
                            <input type="email" name="email_agence" class="form-control" id="email_agence" placeholder="entrer un email valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> site web Agence </label>
                            <input type="text" name="site_web" class="form-control" id="site_web" placeholder="entrer un site web valide ">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> Contact Agence </label>
                            <input type="tel" name="contact_agence" class="form-control" id="contact_agence" placeholder="entrer un contact valide">
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> localisation </label>
                            <input type="text" name="localisation" class="form-control" id="localisation" placeholder="entrer une residence">
                        </div>
                        <div class="button-container">
                          <input type="submit" class="button btn btn-success" name="save" value="Enregistrer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Supprimer une agence </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Êtes-vous sûr de vouloir supprimer cette agence  ?
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

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel"> agence d'importation ajoutée avec succès. </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="mdi mdi-check-circle-outline mdi-36px text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editeModal" tabindex="-1" aria-labelledby="editeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editeModalLabel"> agence d'importation modifiée avec succès. </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="mdi mdi-check-circle-outline mdi-36px text-success"></i>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleterModal" tabindex="-1" aria-labelledby="deleterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleterModalLabel"> agence d'importation supprimée avec succès. </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="mdi mdi-check-circle-outline mdi-36px text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel">Erreur d'insertion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="errorList">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
