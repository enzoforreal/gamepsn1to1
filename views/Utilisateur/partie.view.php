<div class="container-fluid">

      <div class="row">

            <!--Zone dédié aux filtres-->
            <aside class="col-12 col-sm-6 col-md-4 col-xl-3 d-flex flex-column bg-light custom-content">

                  <!--Filtre Jeux-->
                  <div class="mb-4 d-block">
                        <a class="btn btn-danger w-100" data-bs-toggle="collapse" href="#collapseGames" role="button"
                              aria-expanded="false" aria-controls="collapseExample">
                              Games
                        </a>
                        <div class="collapse" id="collapseGames">
                              <div class="card card-body">
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Jeux 1</p>
                                    </a>
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Jeux 2</p>
                                    </a>
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Jeux 3</p>
                                    </a>
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Jeux 4</p>
                                    </a>
                              </div>
                        </div>
                  </div>

                  <!--Filtre Plateformes-->
                  <div class="mb-4 d-block">
                        <a class="btn btn-danger w-100" data-bs-toggle="collapse" href="#collapsePlateform"
                              role="button" aria-expanded="false" aria-controls="collapseExample">
                              Plateforms
                        </a>
                        <div class="collapse" id="collapsePlateform">
                              <div class="card card-body">
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Playstation 5</p>
                                    </a>
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Playstation 4</p>
                                    </a>
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Xbox Series X</p>
                                    </a>
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Xbox One</p>
                                    </a>
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Computer</p>
                                    </a>
                                    <a href="#">
                                          <p class="card-text fw-bold mb-2">Switch</p>
                                    </a>
                              </div>
                        </div>
                  </div>

                  <!--Filtre Mise minimale-->
                  <div class="mb-4 d-block">
                        <label for="rangeMiseMin" class="form-label mb-1">Mise minimum</label>
                        <input type="range" class="form-range w-100" id="rangeMiseMin">
                  </div>

                  <!--Filtre Mise maximale-->
                  <div class="mb-4 d-block">
                        <label for="rangeMiseMax" class="form-label mb-1">Mise maximum</label>
                        <input type="range" class="form-range" id="rangeMiseMax">
                  </div>

                  <!--Filtre Recherche Id partie-->
                  <form class="mb-4 d-block d-flex flex-row">
                        <input class="form-control me-2" type="search" placeholder="Party's ID" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                  </form>

            </aside>

            <!--Zone dédié aux parties-->
            <main class="col-12 col-sm-6 col-md-8 col-xl-9 custom-content">

                  <!--Insérer template carte-->
                  <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                        <div class="col">
                              <div class="card">
                                    <img src="../../public/Assets/images/fortnitepc.png" class="card-img-top" alt="...">
                                    <div class="card-body">

                                          <h5 class="card-title fw-bold">Jeux: Fortnite</h5>
                                          <p class="card-text fw-bold">Mise: 20$</p>
                                          <p class="card-text">Plateforme: PC</p>
                                          <p class="card-text">Statut partie: privée (entre ami)</p>
                                          <p class="card-text">Identifiant partie: #47013</p>

                                          <a href="party-room.html">
                                                <button class="btn btn-danger w-100">Join</button>
                                          </a>
                                    </div>
                              </div>
                        </div>
                  </div>

            </main>

      </div>
</div>