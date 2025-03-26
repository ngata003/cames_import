<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
              <div>
                <div class="btn-wrapper">
                  <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> telecharger le rapport en pdf </a>
                  <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> exporter les données sous Excel </a>
                </div>
              </div>
            </div>
            <div class="tab-content tab-content-basic">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="statistics-details d-flex align-items-center justify-content-between">
                      <div>
                        <p class="statistics-title"> Chiffre d'affaires (CA) </p>
                        <h3 class="rate-percentage">{{$totalAnnee}}</h3>
                      </div>
                      <div>
                        <p class="statistics-title"> nbre total de commandes de l'année  </p>
                        <h3 class="rate-percentage">{{$nbre_commandes_annee}}</h3>
                      </div>
                      <div class="d-none d-md-block">
                        <p class="statistics-title"> Nbre commandes mensuel  </p>
                        <h3 class="rate-percentage"> {{$nbre_commandes_mois}}</h3>
                      </div>
                      <div class="d-none d-md-block">
                        <p class="statistics-title"> Chiffre d'affaire mensuel </p>
                        <h3 class="rate-percentage">{{$totalMois}}</h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 d-flex flex-column">
                      <div class="row flex-grow">
                        <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">Statistique annuelle en fonction des mois</h4>
                                  <h5 class="card-subtitle card-subtitle-dash">Voici la courbe qui montre l'évolution du business</h5>
                                </div>
                                <div id="performanceLine-legend"></div>
                              </div>
                              <div class="chartjs-wrapper mt-4">
                                  <canvas id="performanceArea"></canvas>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="col-lg-4 d-flex flex-column">
                    <div class="row flex-grow">

                      <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                  <div>
                                      <p class="text-small mb-2"> Top Clients </p>
                                      @foreach($clientsTop as $client)
                                          @php
                                              $progress = ($client->total_achats / $maxTotal) * 100;
                                          @endphp
                                          <div class="mb-2">
                                              <p class="mb-1 fw-bold">{{ $client->nom_client }} - {{ number_format($client->total_achats, 0, ',', ' ') }} XAF</p>
                                              <div class="progress" style="height: 8px;">
                                                  <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                          </div>
                                      @endforeach
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <p class="text-small mb-2">Top Produits </p>
                                    @foreach($TopProduits as $produit)
                                          @php
                                              $progress = ($produit->totaux / $maxProduit) * 100;
                                          @endphp
                                          <div class="mb-2">
                                              <span class="mb-1 fw-bold">{{ $produit->nom_produit }} - {{ number_format($produit->totaux, 0, ',', ' ') }} XAF</span>
                                              <div class="progress" style="height: 8px;">
                                                  <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                              </div>
                                          </div>
                                      @endforeach
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
      </div>
    </div>
    @include('footer');
  </div>
</div>
</div>
