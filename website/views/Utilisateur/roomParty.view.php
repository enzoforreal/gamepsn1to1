<div class="row">
      <!--Chat privée-->
      <aside class="chat-container">
            <h2 class="chat-title">CHAT PRIVATE</h2>

            <div class="d-flex flex-column">
                  <div class="speech-bubble speech-other">
                        <div class="d-flex flex-row">
                              <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                              <div class="d-flex flex-column">
                                    <p class="chat-nickname">ZharksLeGrand #7593</p>
                                    <p class="chat-date">11:22</p>
                              </div>
                        </div>
                        <p class="chat-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate
                              voluptatibus laboriosam ex
                              officia excepturi magni, explicabo magnam. Similique odit maxime exercitationem aliquid
                              reiciendis
                              atque, consequatur aut ipsa possimus suscipit eaque!</p>
                  </div>

                  <div class="speech-bubble speech-user">
                        <div class="d-flex flex-row">
                              <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                              <div class="d-flex flex-column">
                                    <p class="chat-nickname">ZharksLeGrand #7593</p>
                                    <p class="chat-date">11:22</p>
                              </div>
                        </div>
                        <p class="chat-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate
                              voluptatibus laboriosam ex
                              officia excepturi magni, explicabo magnam. Similique odit maxime exercitationem aliquid
                              reiciendis
                              atque, consequatur aut ipsa possimus suscipit eaque!</p>
                  </div>
            </div>

            <form class="d-flex flex-row chat-input-container">
                  <input class="input-field-left" type="text" placeholder="Your message">
                  <button class="button-right-red">Send</button>
            </form>
      </aside>
      <?php

    ?>

      <main class="col">
            <div class="row">

                  <!--Liste des joueurs-->
                  <div class="d-flex flex-column custom-playerList-container">
                        <div class="d-flex flex-row custom-playerList-item">
                              <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                              <div class="d-flex flex-column">
                                    <p class="chat-nickname-black"><?= $party["login"] ?></p>
                                    <p class="chat-date-black">Ready</p>
                              </div>
                              <form method="POST" action="userReadyFromParty">
                                    <div class="ms-auto">
                                          <input name="idParty" type="hidden" value="<?= $party['idParty'] ?>"><br>
                                          <input name="login_1" type="hidden" value="<?= $party['login_1'] ?>"><br>
                                          <input name="statut" type="hidden" value="<?= $party['statut'] ?>"><br>
                                          <button type="submit" class="button-red">Ready</button>
                                    </div>
                              </form>
                        </div>

                        <div class="d-flex flex-row custom-playerList-item">
                              <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                              <div class="d-flex flex-column">
                                    <p class="chat-nickname-black"><?= $party["login_1"] ?></p>
                                    <p class="chat-date-black">
                                          <?= (int)$party['statut'] === 0 ? "Not ready" : "Ready" ?></p>

                              </div>
                              <form method="POST" action="userJoin">
                                    <div class="ms-auto">
                                          <input id="login_1" name="login_1" type="hidden"
                                                value="<?= $utilisateur['login'] ?>"><br>
                                          <input name="idParty" type="hidden" value="<?= $party['idParty'] ?>"><br>
                                          <button type="submit" class="button-outline-red">join</button>
                                    </div>
                              </form>
                        </div>

                  </div>


                  <!--Informations de la partie-->
                  <div class="custom-infoList-container">
                        <hr class="w-100 custom-infoList-item">
                        <h2 class="custom-infoList-title">Informations</h2>
                        <h4 class="custom-infoList-item">game: <?= $party['game'] ?></h4>
                        <h4 class="custom-infoList-item">bet : <?= $party['bet'] ?>€</h4>
                        <h4 class="custom-infoList-item">platform : <?= $party['platform'] ?></h4>
                        <h4 class="custom-infoList-item">status :
                              <?= (int)$party['statut'] === 0 ? "player-waiting" : "game in progress" ?></h4>
                        <h4 class="custom-infoList-item"> Room Id : #<?= $party['idParty'] ?></h4>
                  </div>


                  <!--Score-->
                  <form class="row">
                        <div class="col-12 col-lg-4">
                              <label for="" class="label"></label>
                              <input class="input-field" type="text" placeholder="score of <?= $party['login'] ?>">
                        </div>

                        <div class="col-12 col-lg-4">
                              <label for="" class="label"></label>
                              <input class="input-field" type="text" placeholder="score of <?= $party['login_1'] ?>">
                        </div>

                        <div class="col-12 col-lg-4">
                              <label for="" class="label">Proof of the score</label>
                              <input class="form-control" type="file">
                        </div>

                        <div class="text-center">
                              <button class="button-red">Publish score</button>
                        </div>
                  </form>

            </div>
      </main>
</div>