<main class="col-12 col-sm-6 col-md-8 col-xl-9 custom-content">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 justify-content-center" id="listParty">

            <!--Template profil-->
            <?php foreach ($party as $datas) : ?>
            <div class="col custom-card-item" style="width: 300px" id="party-list">
                  <div class="card">
                        <img src="../../public/Assets/images/party1.jpg" class="card-img-top" alt="image game">
                        <div class="custom-card-body">
                              <h5 class="card-title fw-bold"><?php echo $datas['game']; ?></h5>
                              <p class="card-text fw-bold">Bet: <?php echo $datas['bet']; ?>€</p>
                              <p class="card-text fw-bold">Create by: <?php echo $datas['login']; ?></p>
                              <p class="card-text">Plateform : <?php echo $datas['platform']; ?></p>
                              <p class="card-text">Score : <?php echo $datas['score']; ?></p>
                              <p class="card-text"> Number of room : <?php echo $datas['idParty']; ?>
                              </p>
                              <p class="card-text">Statut : <?php echo $datas['statut']; ?></p>

                              <a class="btn btn-danger"
                                    href="<?= URL ?>roomParty&idParty=<?= $datas['idParty'] ?>">Join</a>
                        </div>
                  </div>

            </div>
            <?php endforeach ; ?>
      </div>

</main>