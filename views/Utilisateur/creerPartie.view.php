<div class="container-fluid">
      <div class="row">

            <div class="col-12 col-md-5 p-5">
                  <img src="../../public/Assets/images/img-createParty.svg" alt="" class="w-100 h-100"
                        style=" object-fit: cover;">
            </div>


            <div class="col-12 col-md-7 p-5 row">

                  <div class="col-12 text-center mb-5">
                        <p class="fw-bold">CODE SALLE: XXXXX</p>
                  </div>

                  <div class="col-12 col-md-6 mb-5">
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

                  <div class="col-12 col-md-6 mb-5">
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

                  <div class="col-12 col-md-6 mb-5">
                        <label for="rangeMiseMin" class="form-label mb-1">Mise minimum</label>
                        <input type="range" class="form-range w-100" id="rangeMiseMin">
                  </div>

                  <div class="col-12 col-md-6 mb-5">
                        <label for="rangeMiseMax" class="form-label mb-1">Mise maximum</label>
                        <input type="range" class="form-range" id="rangeMiseMax">
                  </div>
                  <form method="POST" action="ValidationCreerParty">
                        <input id="login" name="login" type="hidden" value="<?= $utilisateur['login'] ?>">
                        <div class="col-12 text-center">
                              <button type="submit" class="btn btn-danger">Create</button>
                        </div>
                  </form>


            </div>


      </div>
</div>