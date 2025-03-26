
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Profil Utilisateur</h4>
                <div class="d-flex align-items-center">
                    @if (Auth::check())
                    <?php $user =Auth::user(); ?>
                    <div class="me-4">
                        <img src="assets/images/{{$user->profil}}" alt="Photo de profil" id="user_image"
                          class="rounded-circle" style="width: 200px; height: 200px; border: 3px solid #ddd;">
                      </div>
                      <div class="flex-grow-1">
                        <h5 class="mb-2" id="user_name"> {{$user->name}}</h5>
                        <p><strong>Email :</strong> <span id="user_email">{{$user->email}}</span></p>
                        <p><strong>Contact :</strong> <span id="user_contact">{{$user->contact}}</span></p>
                        <p><strong>residence :</strong> <span id="user_address"> {{$user->residence}} </span></p>
                        <p><strong>role :</strong> <span id=""> {{$user->role}} </span></p>
                    @endif
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Modifier mes informations </button>
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
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modifier vos informations en toute securité </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/profil_update" enctype="multipart/form-data">
                @csrf
                @method('PUT')
               <div class="mb-3">
                    <label for="" class="form-label">Nom </label>
                    <input type="text" name="name" class="form-control" id="" value="{{$user->name}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email </label>
                    <input type="text" name="email" class="form-control" id="" value="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"> Contact </label>
                    <input type="tel" name="contact" class="form-control" id="" value="{{$user->contact}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"> Residence </label>
                    <input type="text" name="residence" class="form-control" id="" value="{{$user->residence}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"> mot de passe </label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"> confirmer mot de passe  </label>
                    <input type="password" name="password_confirmation" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"> image </label>
                    <input type="file" name="image_changee" class="form-control" >
                    <img src="assets/images/{{$user->profil}}" height="45px" width="45px" alt="">
                </div>
                <input type="hidden" name="identifiant" value="{{$user->id}}">
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
