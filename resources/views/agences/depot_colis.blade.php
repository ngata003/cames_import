<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> CAMES IMPORT  </title>
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
     @include('header')
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" href="entreprise_management">
                    <i class="menu-icon mdi mdi-home"></i>
                    <span class="menu-title"> Entreprise   </span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="gestionnaires">
                    <i class="menu-icon mdi mdi-account"></i>
                    <span class="menu-title"> Gestionnaires  </span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                  <i class="menu-icon mdi mdi-cart"></i>
                  <span class="menu-title"> Commandes </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="ajout_commandes"> ajouter une commande </a></li>
                    <li class="nav-item"><a class="nav-link" href="command_enregistrees"> commandes enregistrées </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                  <i class="menu-icon mdi mdi-airplane"></i>
                  <span class="menu-title"> Agence </span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="charts">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="agences">Manager les agences </a></li>
                    <li class="nav-item"> <a class="nav-link" href="depot_colis"> Deposer colis </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="retraits">
                    <i class="menu-icon mdi mdi-cart-check"></i>
                    <span class="menu-title"> retraits  </span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="produits">
                    <i class="menu-icon mdi mdi-package-variant"></i>
                    <span class="menu-title"> produits  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="notifications">
                    <i class="menu-icon mdi mdi-mail"></i>
                    <span class="menu-title"> notifications  </span>
                </a>
              </li>
            </ul>
        </nav>

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
                                            <h4 class="card-title card-title-dash"> Espace Depot Colis  </h4>
                                            <p class="card-subtitle card-subtitle-dash"> management des depots de colis   </p>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary btn-lg text-white mb-0 me-0" data-bs-toggle="modal" data-bs-target="#importModal" type="button"><i class="mdi mdi-cart"></i>ajouter  un depot </button>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-1">
                                      <table class="table select-table">
                                        <thead>
                                            <tr>
                                              <th>  Nom client </th>
                                              <th>  Nom agence </th>
                                              <th>  Couleur colis </th>
                                              <th>  Image colis </th>
                                              <th>  Moyen transport</th>
                                              <th>  Date_depart </th>
                                              <th> progression </th>
                                              <th> status </th>
                                              <th> actions </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($depot  as $dpt )
                                            <tr>
                                                <td>
                                                  <div>
                                                  <span> {{$dpt->nom_client}} </span>
                                                  </div>
                                                </td>
                                                <td>
                                                  <div>
                                                  <h6> {{$dpt->nom_agence}} </h6>
                                                  </div>
                                                </td>
                                                <td>
                                                  <div>
                                                      <span> {{$dpt->couleur_colis}} </span>
                                                  </div>
                                                </td>
                                                <td>
                                                  <div>
                                                      <img src="assets/images/{{$dpt->image_colis}}" height="45px" width="45px" alt="">
                                                  </div>
                                                </td>
                                                <td>
                                                  <div>
                                                      <span>{{$dpt->moyen_transport}}</span>
                                                  </div>
                                                </td>
                                                <td>
                                                  <div>
                                                      <span> {{$dpt->date_depart}} </span>
                                                  </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: {{ $dpt->progression > 0 ? min(100, $dpt->progression) : 0 }}%;"
                                                                aria-valuenow="{{ $dpt->progression }}" aria-valuemin="0" aria-valuemax="100">
                                                                {{ round($dpt->progression, 2) }}%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                  <div>
                                                      <span>{{$dpt->status}}</span>
                                                  </div>
                                                </td>
                                                <td>
                                                 <button class="btn btn-secondary text-white" data-id="{{$dpt->id}}" data-nom="{{$dpt->nom_client}}" data-nom_agence="{{$dpt->nom_agence}}" data-duree_trajet="{{$dpt->duree_trajet}}" data-moyen_transport="{{$dpt->moyen_transport}}" data-couleur_colis="{{$dpt->couleur_colis}}" data-image_colis="{{$dpt->image_colis}}" data-date_depart="{{$dpt->date_depart}}" onclick="openEditModal(this)"> <i class="fas fa-edit"></i> </button>                                                
                                                  <button class="btn btn-danger" data-id="{{$dpt->id}}" onclick="openDeleteModal(this)"> <i class="fas fa-trash text-white"></i> </button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un depot    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/save_depot_colis" enctype="multipart/form-data">
                        @csrf
                       <div class="mb-3">
                            <label for="centreName" class="form-label"> Nom Client  </label>
                            <select name="nom_client" class="form-control" id="nom_agence">
                                <option> selectionnez un client  </option>
                                @foreach ($clients  as $clt )
                                <option value="{{$clt->nom_client}}"> {{$clt->nom_client}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="centreName" class="form-label"> Nom de l'agence </label>
                            <select name="nom_agence" class="form-control" id="nom_agence">
                                <option> selectionnez une agence  </option>
                                @foreach ($agences as $agence )
                                <option value="{{$agence->nom_agence}}"> {{$agence->nom_agence}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date_depart" class="form-label"> date depart  </label>
                            <input type="date" name="date_depart" class="form-control" id="date_depart" placeholder="entrer une date valide ">
                        </div>
                        <div class="mb-3">
                            <label for="couleur_colis" class="form-label"> couleur du colis (facultatif si image)  </label>
                            <input type="text"  name="couleur_colis" class="form-control" id="couleur_colis" placeholder="entrez la couleur du paquet du colis">
                        </div>
                        <div class="mb-3">
                            <label for="imageColis" class="form-label">image du colis </label>
                            <input type="file" name="image_colis" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">moyen de transport </label>
                            <select name="moyen_transport" class="form-control" id="moyen_transport">
                                <option> selectionnez un moyen de transport  </option>
                                <option value="transport_aerien"> transport aerien </option>
                                <option value="transport_marin"> transport marin </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> durée du trajet </label>
                            <input type="number" name="duree_trajet" class="form-control" id="duree_trajet" placeholder="Ex: 30 j ">
                        </div>
                        <input type="hidden" name="status" value="deposé">
                        <div class="button-container">
                          <input type="submit" class="button btn btn-success" name="save" value="Enregistrer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
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

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Supprimer le depot </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Êtes-vous sûr de vouloir supprimer ce depot ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
              <form method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Oui</button>
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
                            <label for="centreName" class="form-label"> Nom Client  </label>
                            <select name="nom_client" class="form-control" id="client">
                                <option> selectionnez un client  </option>
                                @foreach ($clients  as $clt )
                                <option value="{{$clt->nom_client}}"> {{$clt->nom_client}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="centreName" class="form-label"> Nom de l'agence </label>
                            <select name="nom_agence" class="form-control" id="agence">
                                <option> selectionnez une agence  </option>
                                @foreach ($agences as $agence )
                                <option value="{{$agence->nom_agence}}"> {{$agence->nom_agence}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date_depart" class="form-label"> date depart  </label>
                            <input type="date" name="date_depart" class="form-control" id="depart" placeholder="entrer une date valide ">
                        </div>
                        <div class="mb-3">
                            <label for="couleur_colis" class="form-label"> couleur du colis (facultatif si image)  </label>
                            <input type="text"  name="couleur_colis" class="form-control" id="couleur" placeholder="entrez la couleur du paquet du colis">
                        </div>
                        <div class="mb-3">
                            <label for="imageColis" class="form-label">image du colis </label>
                            <input type="file" name="image_colis" class="form-control" id="">
                            <img src="" id="newImage" height="45px" width="45px" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">moyen de transport </label>
                            <select name="moyen_transport" class="form-control" id="Mtransport">
                                <option> selectionnez un moyen de transport  </option>
                                <option value="transport_aerien"> transport aerien </option>
                                <option value="transport_marin"> transport marin </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="centreName" class="form-label"> durée du trajet </label>
                            <input type="number" name="duree_trajet" class="form-control" id="duree" placeholder="Ex: 30 j ">
                        </div>
                        <div class="button-container">
                          <input type="submit" class="button btn btn-success" name="save" value="modifier">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        @if(session('status_save'))
            var succesModal = new bootstrap.Modal(document.getElementById('succesModal'));
            succesModal.show();
        @endif
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        @if(session('updated_status'))
            var editerModal = new bootstrap.Modal(document.getElementById('editerModal'));
            editerModal.show();
        @endif
        });
    </script>

    <script>
        function openDeleteModal(button) {
        var id = button.getAttribute('data-id');
        document.getElementById('deleteForm').action = '/delete_colis/' + id;

        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
        }
    </script>

    <div class="modal fade" id="editerModal" tabindex="-1" aria-labelledby="editerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dediterModalLabel"> depot modifié avec succès. </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="mdi mdi-check-circle-outline mdi-36px text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(button) {
            var id = button.getAttribute('data-id');
            var nom_client = button.getAttribute('data-nom');
            var nom_agence = button.getAttribute('data-nom_agence');
            var duree_trajet = button.getAttribute('data-duree_trajet');
            var couleur_colis = button.getAttribute('data-couleur_colis');
            var moyen_transport = button.getAttribute('data-moyen_transport');
            var date_depart  = button.getAttribute('data-date_depart');
            var image_colis = button.getAttribute('data-image_colis');

            document.getElementById('editModalLabel').textContent = 'Editer un depot  ';
            document.getElementById('editForm').action = '/edit_depots/' + id;
            document.getElementById('client').value = nom_client;
            document.getElementById('agence').value = nom_agence;
            document.getElementById('depart').value = date_depart;
            document.getElementById('couleur').value = couleur_colis;
            document.getElementById('Mtransport').value = moyen_transport;
            document.getElementById('duree').value = duree_trajet;
            document.getElementById('newImage').src = "assets/images/" + image_colis;

            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        }
    </script>
  </body>
</html>
