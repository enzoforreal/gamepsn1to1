<div class="col custom-card-container">
      <div class="row">
    
            <!--Zone dédié aux filtres-->
            <aside class="col-12 col-sm-6 col-md-4 col-xl-3 d-flex flex-column bg-light custom-content">
                  <form method="GET"  action=""> 
                  <!--Filtre Jeux-->
                  <div class="mb-4 d-block">
                        <a class="btn btn-danger w-100" data-bs-toggle="collapse" href="#collapseGames" role="button"
                              aria-expanded="false" aria-controls="collapseExample">
                              Games
                        </a>
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
                  <!--Filtre Plateformes-->
                  <div class="mb-4 d-block">
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
                  <!--Filtre Recherche Id partie-->
                  <div class="mb-4 d-block d-flex flex-row">
                        <button class="btn btn-outline-danger" type="submit" onclick="getPartyList()">Search</button>

                  </div> 
                        
                  </form>

                  <a href="<?= URL; ?>creerPartie" class="d-block">
                        <button class="btn btn-danger w-100">Create a party</button>
                  </a>
            </aside>

            <!--Zone dédié aux parties-->
            <main class="col-12 col-sm-6 col-md-8 col-xl-9 custom-content">

                  <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 justify-content-center ">
                  
                        <!--Template profil-->
                        <?php foreach ($party as $datas) : ?>
                        <div class="col custom-card-item" style="width: 300px" id="party-list">
                              <div class="card" >
                                    <img src="../../public/Assets/images/party1.jpg" class="card-img-top"  alt="image game">
                                    <div class="custom-card-body">
                                          <h5 class="card-title fw-bold"><?php echo $datas['game']; ?></h5>
                                          <p class="card-text fw-bold">Bet: 20$</p>
                                          <p class="card-text">Plateform : <?php echo $datas['platform']; ?></p>
                                          <p class="card-text">Score : <?php echo $datas['score']; ?></p>
                                          <p class="card-text"> Number of room : <?php echo $datas['idParty']; ?>
                                          </p>
                                          <p class="card-text">Statut : <?php echo $datas['statut']; ?></p>

                                          <a href="<?= URL ?>roomParty">
                                                <button class="btn btn-danger w-100">Join</button>
                                          </a>
                                    </div>
                              </div>

                        </div>
                        <?php endforeach ; ?>
                  </div>
                  
                  </main>
            </div>
            

      </div>
