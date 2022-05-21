<div class="container-fluid">
      <div class="row">

            <div class="col-12 col-md-5 p-5">
                  <img src="../../public/Assets/images/img-createParty.svg" alt="" class="w-100 h-100"
                        style=" object-fit: cover;">
            </div>


            <div class="col-12 col-md-7 p-5 row">

                  <div class="col-12 text-center mb-5">
                        <p class="fw-bold">Click your options then validate the creation of your part</p>
                  </div>

                  <div class="col-12 col-md-6 mb-5">
                        <a class="btn btn-danger w-100" data-bs-toggle="collapse" href="#collapseGames" role="button"
                              aria-expanded="false" aria-controls="collapseExample">
                              Games
                        </a>
                        <form method="POST" action="ValidationCreerParty">
                              <div class="collapse" id="collapseGames">
                                    <div class="card card-body">
                                          <select name="game">
                                                <option value="FIFA 22" selected>FIFA 22</option>
                                                <option value="CALL OF DUTY">CALL OF DUTY</option>
                                                <option value="WARZONE">WARZONE</option>
                                                <option value="NBA2K">NBA2K</option>
                                                <option value="GRAN TURISMO 7">GRAN TURISMO 7</option>
                                                <option value="FORZA HORIZON">FORZA HORIZON</option>
                                                <option value="WWE 2K22">WWE 2K22</option>
                                                <option value="MOTO GP 22">MOTO GP 22</option>
                                                <option value="FAR CRY 6">FAR CRY 6</option>
                                                <option value="SPLATOON 2">SPLATOON 2</option>
                                                <option value="E-FOOTBALL 2022">E-FOOTBALL 2022</option>
                                                <option value="LEAGUE OF LEGENDS">LEAGUE OF LEGENDS</option>
                                          </select>
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
                                    <select name="platform">
                                          <option value="ps5" selected>Playstation 5</option>
                                          <option value="ps4">Playstation 4</option>
                                          <option value="xbox_series_x">Xbox Series X</option>
                                          <option value="xbox_one">Xbox One</option>
                                          <option value="pc">Computer</option>
                                          <option value="switch">Switch</option>
                                    </select>
                              </div>
                        </div>
                  </div>

                  <div style="position:relative; margin:auto; width:90%">
                        <span style="position:absolute; color:#D92344; border:1px; min-width:100px;">
                              <span id="myValue"></span>
                        </span>
                        <input type="range" id="myRange" name="bet" min="5" max="100" style="width:90%">
                  </div>
                  <input id="login" name="login" type="hidden" value="<?= $utilisateur['login'] ?>"><br>
                  <div class="col-12 text-center">
                        <button type="submit" class="btn btn-danger">Create</button>
                  </div>
                  </form>


            </div>


      </div>
</div>