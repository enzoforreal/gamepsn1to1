<div id="gm-partie-v-container" class="col custom-card-container" gm-data-url="<?=URL?>">
      <div class="row">

            <!--Zone dédié aux filtres-->
            <aside class="col-12 col-sm-6 col-md-4 col-xl-3 d-flex flex-column bg-light custom-content">
                  <form method="GET" action="">
                        <!--Filtre Jeux-->
                        <div class="mb-4 d-block">
                              <a class="btn btn-danger w-100" data-bs-toggle="collapse" href="#collapseGames"
                                    role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Games
                              </a>
                              <div class="collapse" id="collapseGames">
                                    <div class="card card-body">
                                          <select id="gameFilter" onInput='getPartyList(this)' name="game">
                                                <option value="fifa22" selected>FIFA 22</option>
                                                <option value="call_of_duty">CALL OF DUTY</option>
                                                <option value="warzone">WARZONE</option>
                                                <option value="nba2k22">NBA2K22</option>
                                                <option value="gran_turismo_7">GRAN TURISMO 7</option>
                                                <option value="forza_horizon">FORZA HORIZON</option>
                                                <option value="wwe_2k22">WWE 2K22</option>
                                                <option value="moto_gp_22">MOTO GP 22</option>
                                                <option value="FAR_CRY_6">FAR CRY 6</option>
                                                <option value="SPLATOON_2">SPLATOON 2</option>
                                                <option value="E-FOOTBALL_2022">E-FOOTBALL 2022</option>
                                                <option value="Fall guys">Fall guys</option>
                                                <option value="Battlefield_V">Battlefield V</option>
                                                <option value="Borderlands">Borderlands</option>
                                                <option value="Fortnite"> Fortnite</option>
                                                <option value="Destiny_2">Destiny 2</option>
                                                <option value="Rimbow_six_siège">Rimbow six siège</option>
                                                <option value="Tom_Clancy_Ghost_Recon">Tom Clancy Ghost Recon</option>
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
                                                <option value="xbox">Xbox Series X</option>
                                                <option value="pc">Computer</option>
                                                <option value="switch">Switch</option>
                                          </select>
                                    </div>
                              </div>
                        </div>
                        <!--Filtre Recherche Id partie-->
                        <div class="mb-4 d-block d-flex flex-row">


                        </div>

                  </form>

                  <a href="<?= URL; ?>creerPartie" class="d-block">
                        <button class="btn btn-danger w-100">Create a party</button>
                  </a>


                  <!-- <div class="col-12 col-md-5 p-5">
                        <img src="../../public/Assets/images/" alt="" class="w-100 h-100" style=" object-fit: cover;">
                  </div> -->
            </aside>

            <!--Zone dédié aux parties-->
            <main class="col-12 col-sm-6 col-md-8 col-xl-9 custom-content">

                  <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 justify-content-center" id="listParty">

                        <!--Template profil-->
                        <?php foreach ($party as $datas) : ?>
                        <div class="col custom-card-item" style="width: 300px" id="party-list">
                              <div class="card">
                                    <img src="../../public/Assets/images/party1.jpg" class="card-img-top"
                                          alt="image game">
                                    <div class="custom-card-body">
                                          <h5 class="card-title fw-bold"><?php echo $datas['game']; ?></h5>
                                          <p class="card-text fw-bold">Bet: <?php echo $datas['bet']; ?>€</p>
                                          <p class="card-text fw-bold">Create by: <?php echo $datas['login']; ?></p>
                                          <p class="card-text">Plateform : <?php echo $datas['platform']; ?></p>
                                          <p class="card-text">Score : <?php echo $datas['score']; ?></p>
                                          <p class="card-text"> ROOM Id : <?php echo $datas['idParty']; ?>
                                          </p>
                                          <p class="card-text" id="gm-statut-v-row"
                                                gm-data-statut="<?php echo (int)$datas['statut'] === 0 ? "player-waiting" : "game in progress" ?>">
                                                Statut :
                                                <?php echo (int)$datas['statut'] === 0 ? "player-waiting" : "game in progress" ?>
                                          </p>

                                          <a class="btn btn-danger"
                                                href="<?= URL ?>roomParty&idParty=<?= $datas['idParty'] ?>">Join</a>
                                    </div>
                              </div>

                        </div>
                        <?php endforeach ; ?>
                  </div>

            </main>
      </div>


</div>