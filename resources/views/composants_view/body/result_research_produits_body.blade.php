<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
              <div>
                <div class="btn-wrapper">
                  <a href="/imprimer_pdf" class="btn btn-otline-dark"><i class="icon-printer"></i> sortir le rapport en pdf </a>
                  <a href="/export_produits" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Exporter des produits sur excel </a>
                </div>
              </div>
            </div>
            <div class="tab-content tab-content-basic">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                <div class="row">
                  <div class="col-lg-8 d-flex flex-column">
                    <div class="row flex-grow">
                      <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                              <div>
                                <h4 class="card-title card-title-dash"> Espace produits </h4>
                                <p class="card-subtitle card-subtitle-dash"> management des produits </p>
                              </div>
                              <div>
                                <button class="btn btn-primary btn-lg text-white mb-0 me-0" data-bs-toggle="modal" data-bs-target="#importModal" type="button" ><i class="mdi mdi-account-plus"></i>Ajouter un nouveau produit </button>
                              </div>
                            </div>
                            <div class="table-responsive  mt-1">
                              <table class="table select-table">
                                <thead>
                                  <tr>
                                    <th> Image Produit  </th>
                                    <th> Nom Produit </th>
                                    <th> prix Unitaire </th>
                                    <th> actions </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($produits as $prod )
                                  <tr>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="assets/images/{{$prod->image_produit}}" alt="">
                                        </div>
                                      </td>
                                      <td>
                                        <span> {{$prod->nom_produit}}</span>
                                      </td>
                                      <td>
                                        <div>
                                            <span> {{$prod->prix_unitaire}}</span>
                                        </div>
                                      </td>
                                      <td>
                                        <button class="btn btn-secondary text-white" data-id="{{$prod->id}}" data-nom="{{$prod->nom_produit}}" data-prix= "{{$prod->prix_unitaire}}" data-image="{{$prod->image_produit}}" onclick="openEditModal(this)"   > modifier </button>
                                        <button class="btn btn-danger text-white" data-id="{{$prod->id}}" onclick="openDeleteModal(this)" > supprimer </button>
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
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="POST" action="/add_produits" enctype="multipart/form-data">
                  @csrf
                 <div class="mb-3">
                      <label for="centreName" class="form-label">Nom Produit</label>
                      <input type="text" name="nom_produit" class="form-control" id="" placeholder="entrer un nom valide ">
                  </div>
                  <div class="mb-3">
                      <label for="centreName" class="form-label"> Prix Produit </label>
                      <input type="number" name="prix_unitaire" class="form-control" id="centreName" placeholder="entrer un email valide ">
                  </div>
                  <div class="mb-3">
                      <label for="" class="form-label">Image Produit</label>
                      <input type="file" name="image_produit" class="form-control">
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
              <h5 class="modal-title" id="editModalLabel"> modifier les informations du produit  </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="POST" enctype="multipart/form-data"  action="" id="editForm" >
                  @csrf
                  @method('PUT')

                  <div class="mb-3">
                      <label for="centreName" class="form-label"> Nom produit </label>
                      <input type="text" name="nom_produit" id="nom_produit" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="centreName" class="form-label"> prix unitaire  </label>
                      <input type="number" name="prix_unitaire" id="prix_unitaire" class="form-control" >
                  </div>
                  <div class="mb-3">
                      <label for="centreName" class="form-label"> image produit </label>
                      <input type="file" name="image_produit" class="form-control">
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
              <h5 class="modal-title" id="successModalLabel"> produit ajouté avec succès </h5>
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
        <h5 class="modal-title" id="deleteModalLabel">Supprimer le produit </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer ce produit ?
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
              <h5 class="modal-title" id="deleterModalLabel"> produit supprimé avec succès. </h5>
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
              <h5 class="modal-title" id="editeModalLabel"> produit modifié avec succès </h5>
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
