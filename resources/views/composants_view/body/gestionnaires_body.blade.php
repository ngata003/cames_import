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
                                  <h4 class="card-title card-title-dash"> Espace Gestionnaires </h4>
                                  <p class="card-subtitle card-subtitle-dash"> management des employes </p>
                                </div>
                                <div>
                                  <button class="btn btn-primary btn-lg text-white mb-0 me-0" data-bs-toggle="modal" data-bs-target="#importModal" type="button" ><i class="mdi mdi-account-plus"></i>Ajouter un nouveau gestionnaire </button>
                                </div>
                            </div>
                            <div class="table-responsive mt-1">
                              <table class="table select-table">
                                <thead>
                                    <tr>
                                      <th> Nom </th>
                                      <th> Email </th>
                                      <th> Contact </th>
                                      <th> Residence </th>
                                      <th> connecté(e) ?</th>
                                      <th> actions </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($gestionnaires as $gestion )
                                    <tr>
                                        <td>
                                          <div class="d-flex ">
                                            <img src="assets/images/{{$gestion->profil}}" alt="">
                                            <div>
                                              <span>{{$gestion->name}}</span>
                                              <p>{{$gestion->role}}</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <span> {{$gestion->email}}</span>
                                        </td>
                                        <td>
                                          <div>
                                              <span> {{$gestion->contact}}</span>
                                          </div>
                                        </td>
                                        <td>
                                            <span> {{$gestion->residence}}</span>
                                        </td>
                                        <td>
                                            @if ($gestion->is_connected)
                                            <div class="badge badge-opacity-success"> connecté(e) </div>
                                            @else
                                            <div class="badge badge-opacity-danger"> Deconnecté(e) </div>
                                            @endif
                                        </td>
                                        <td>
                                          <button class="btn btn-secondary text-white" data-id="{{$gestion->id}}" data-nom="{{$gestion->name}}" data-email= "{{$gestion->email}}" data-contact="{{$gestion->contact}}" data-residence="{{$gestion->residence}}" data-image="{{$gestion->profil}}" data-role="{{$gestion->role}}" onclick="openEditModal(this)"   > <i class="fas fa-edit"></i> </button>
                                          <button class="btn btn-danger text-white" data-id="{{$gestion->id}}" onclick="openDeleteModal(this)" > <i class="fas fa-trash"></i> </button>
                                        </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                              <div class="mt-4 d-flex justify-content-center">
                                {{ $gestionnaires->links('vendor.pagination.bootstrap-5') }}
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
    </div>
    @include('footer')
</div>
</div>
</div>
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un gestionnaire   </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/add_gestionnaires" id="formulaire" enctype="multipart/form-data">
                @csrf
               <div class="mb-3">
                    <label for="centreName" class="form-label">Nom </label>
                    <input type="text" name="name" class="form-control" id="" placeholder="entrer un nom valide ">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> Email </label>
                    <input type="email" name="email" class="form-control" id="centreName" placeholder="entrer un email valide ">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> Contact </label>
                    <input type="tel" name="contact" class="form-control" id="" placeholder="entrer un contact valide">
                </div>
                <input type="hidden" name="type" value="gestionnaire" class="form-control" id="" placeholder="entrer un type">
                <div class="mb-3">
                    <label for="centreName" class="form-label"> role du gestionnaire </label>
                    <select name="role" class="form-control" id="">
                        <option> selectionnez un role </option>
                        <option value="importateur"> importateur </option>
                        <option value="secretaire"> secretaire </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> residence </label>
                    <input type="text" name="residence" class="form-control"  placeholder="entrer une localisation">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> profil </label>
                    <input type="file" name="profil" class="form-control" id="">
                </div>
                <div class="button-container">
                  <button type="submit" id="bouton" class="button btn btn-success" > enregistrer </button>
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
            <form method="POST" enctype="multipart/form-data"  action="" id="editForm" >
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="centreName" class="form-label">Nom </label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="entrer un nom valide ">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> Email </label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="entrer un email valide ">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> Contact </label>
                    <input type="tel" name="contact" class="form-control" id="contact" placeholder="entrer un contact valide">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> role du gestionnaire </label>
                    <select name="role" class="form-control" id="role">
                        <option> selectionnez un role </option>
                        <option value="importateur"> importateur </option>
                        <option value="secretaire"> secretaire </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> residence </label>
                    <input type="text" name="residence" id="residence" class="form-control"  placeholder="entrer une localisation">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> profil </label>
                    <input type="file" name="profil" class="form-control" id="">
                </div>
                <img src="" alt="" height="45px" width="45px" id="newImage">
                <div class="button-container">
                  <input type="submit" class="button btn btn-success" name="save" value="Enregistrer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="successModalLabel"> gestionnaire ajouté avec succès </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <i class="mdi mdi-check-circle-outline mdi-36px text-success"></i>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="deleteModalLabel">Supprimer le gestionnaire </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      Êtes-vous sûr de vouloir supprimer ce gestionnaire ?
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

<div class="modal fade" id="deleterModal" tabindex="-1" aria-labelledby="deleterModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleterModalLabel"> gestionnaire supprimé avec succès. </h5>
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
            <h5 class="modal-title" id="editeModalLabel"> gestionnaire modifié avec succès </h5>
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
