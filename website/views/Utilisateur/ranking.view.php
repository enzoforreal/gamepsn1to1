<div class="row">
      <!--Profil-->
      <div class="col custom-card-container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 justify-content-center ">

                  <!--Template profil-->
                  <?php foreach ($utilisateurs as $utilisateur) : ?>
                  <div class="col custom-card-item" style="width: 300px">
                        <div class="card border-dark mb-3">
                              <img style="height: 380px; width:300px;" class="border border-5" class="card-avatar"
                                    src="<?= URL; ?>public/Assets/images/<?= $utilisateur['image'] ?>" alt="image game">
                              <div class="custom-card-body">
                                    <h5 class="custom-card-title text-center">Pseudo:
                                          <?= $utilisateur["login"] ?></h5>
                                    <hr>
                                    <p class="custom-card-subtitle">Pseudo platform:
                                          <?= $utilisateur["pseudoPlatform"] ?></p>
                                    <hr>
                                    <p class="custom-card-text">level:N° <?= $utilisateur["rank"] ?></p>
                                    <hr>
                                    <div class="row">
                                          <a class="col-12 col-sm-6" href="">
                                                <button class="card-button">Message</button>
                                          </a>
                                          <a class="col-12 col-sm-6" href="">
                                                <?php if($utilisateur["login"] === $_SESSION['profil']["login"]): ?>
                                                <button style="background: grey;" disabled
                                                      loginOwnLogin="<?= $utilisateur["login"]; ?>"
                                                      class="card-button follow-button-class-event">Follow</button>
                                                <?php else: ?>
                                                <button loginOwnLogin="<?= $utilisateur["login"]; ?>"
                                                      class="card-button follow-button-class-event">Follow</button>
                                                <?php endif; ?>
                                          </a>
                                    </div>

                              </div>
                        </div>
                  </div>
                  <?php endforeach ; ?>

            </div>
      </div>

</div>