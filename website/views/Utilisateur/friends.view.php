<h1 class="text-center">My Friends</h1>
<div class="row">
      <!--Profil-->
      <div class="col custom-card-container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 justify-content-center ">

                  <!--Template profil-->
                  <?php foreach($followers as $follower): ?>
                  <div class="col custom-card-item" style="width: 300px">
                        <div class="card border-dark mb-3">
                              <img class="card-avatar" src="<?= URL; ?>public/Assets/images/<?= $follower['image'] ?>"
                                    alt="image game">
                              <div class="custom-card-body">
                                    <h5 class="custom-card-title text-center"><?= $follower["login"] ?></h5>
                                    <hr>
                                    <p class="custom-card-subtitle">Pseudo platform: <?= $follower["pseudoPlatform"] ?>
                                    </p>
                                    <hr>
                                    <p class="custom-card-text">level: <?= $follower["rank"] ?></p>
                                    <hr>
                                    <div class="row">
                                          <a class="col-12 col-sm-6" href="">
                                                <button class="card-button">Message</button>
                                          </a>
                                    </div>

                              </div>
                        </div>
                  </div>
                  <?php endforeach; ?>

            </div>
      </div>

</div>