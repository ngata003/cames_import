
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
                                    <h4 class="card-title card-title-dash"> Espace Entreprise </h4>
                                    <p class="card-subtitle card-subtitle-dash"> modifier les informations de votre entreprise en toute sécurité. </p>
                                  </div>
                                  <div>

                                  </div>
                            </div>
                            <div class="table-responsive mt-1">
                              <table class="table select-table">
                                <thead>
                                    <tr>
                                        <th> Nom Entreprise  </th>
                                        <th> Email Entreprise  </th>
                                        <th> Fax Entreprise  </th>
                                        <th> Site Web   </th>
                                        <th> Logo  </th>
                                        <th> Localisation  </th>
                                        <th> actions </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($infos as $inf  )
                                    <tr>
                                        <td>
                                          <div class="d-flex ">
                                              <h6>{{$inf->nom_entreprise}}</h6>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{$inf->email_entreprise}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{$inf->fax_entreprise}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{$inf->site_web}}</h6>
                                        </td>
                                        <td>
                                          <img src="assets/images/{{$inf->logo_entreprise}}" alt="">
                                        </td>
                                        <td>
                                          <h6>{{$inf->localisation}}</h6>
                                        </td>
                                        <td>
                                          <button class="btn btn-success" data-id="{{$inf->id}}" data-nom="{{$inf->nom_entreprise}}" data-email="{{$inf->email_entreprise}}" data-fax="{{$inf->fax_entreprise}}" data-site="{{$inf->site_web}}" data-localisation="{{$inf->localisation}}" data-image="{{$inf->logo_entreprise}}" onclick="openEditModal(this)"> modifier infos  </button>
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

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel"> Modifier votre entreprise    </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST"  action="" enctype="multipart/form-data" id="editForm" >
                @csrf
                @method('PUT')
               <div class="mb-3">
                    <label for="centreName" class="form-label">Nom Entreprise </label>
                    <input type="text" name="nom_entreprise" class="form-control" id="nom_entreprise" placeholder="entrer un nom d'agence valide ">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> Email Entreprise </label>
                    <input type="email" name="email_entreprise" class="form-control" id="email_entreprise" placeholder="entrer un email valide ">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> Fax Entreprise </label>
                    <input type="tel" name="fax_entreprise" class="form-control" id="fax_entreprise" placeholder="entrer un email valide ">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> site web Entreprise </label>
                    <input type="url" name="site_web"  class="form-control" id="site_web" placeholder="entrer un site web valide ">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> localisation </label>
                    <input type="text" name="localisation" class="form-control" id="localisation" placeholder="entrer une residence">
                </div>
                <div class="mb-3">
                    <label for="centreName" class="form-label"> Logo Entreprise </label>
                    <input type="file" name="logo_entreprise" class="form-control" id="logo_entreprise">
                    <img src="" id="editImage" height="45px" width="45px">
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

<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="errorModalLabel">Erreur d'inscription</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul id="errorList">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>
</div>
