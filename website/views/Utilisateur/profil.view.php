 <div class="row custom-container-fluid-grey">
       <aside class="profil-sidebar-container d-flex flex-column">
             <div class="border border-5">
                   <h5 class="custom-counter-title text-center">Balance</h5>

                   <p class="custom-counter-title text-center"><span
                               class="badge  bg-dark"><?= $utilisateur['balance'] ?> €</span></p>
             </div>
             <div>
                   <ul class="profil-sidebar-list-group">
                         <li><a class="profil-sidebar-list-item" href="<?= URL; ?>compte/pageTransfer">Deposit money</a>
                         </li>
                         <li><a class="profil-sidebar-list-item" href="<?= URL; ?>compte/withdrawal">Withdrawal</a>
                         </li>
                         <li><a class="profil-sidebar-list-item" href="<?= URL; ?>compte/profilFriends">Friends</a></li>
                   </ul>
             </div>
       </aside>
       <main class="col">
             <div class="d-flex flex-column align-items-center mx-auto" style="margin: 100px; max-width: 700px">
                   <span class="border border-danger">
                         <div class="rounded-0">
                               <div class="text-center">
                                     <img style="height: 350px; width:250px;" class="border border-5"
                                           src="<?= URL; ?>public/Assets/images/<?= $utilisateur['image'] ?>"
                                           alt="Avatar">

                                     <p class="profil-nickname"><?= $utilisateur['pseudoPlatform'] ?></p>
                               </div>

                         </div>
                   </span>
                   <div class="w-100 mb-3">
                         <div class="mb-3">
                               <form method="POST" action="<?= URL ?>compte/validation_modificationImage"
                                     enctype="multipart/form-data">
                                     <label for="image" class="label">Edit my profile photo</label><br />
                                     <input accept=".jpg,.jpeg" type="file" class="form-control" id="image" name="image"
                                           onchange="submit();" />
                               </form>
                         </div>
                         <hr class="mb-3">
                         <h3 class="mb-3">Performances</h3>

                         <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 justify-content-center ">

                               <!--Template compteur-->
                               <div class="col custom-counter-item">
                                     <div class="custom-counter">

                                           <div class="custom-counter-body">
                                                 <h5 class="custom-counter-subtitle text-center">WINS</h5>
                                                 <p class="custom-counter-title text-center">
                                                       <?= $utilisateur['numberOfWins'] ?></p>
                                           </div>
                                     </div>
                               </div>

                               <div class="col custom-counter-item">
                                     <div class="custom-counter">

                                           <div class="custom-counter-body">
                                                 <h5 class="custom-counter-subtitle text-center">DEFEATS</h5>
                                                 <p class="custom-counter-title text-center">
                                                       <?= $utilisateur['numberOfDefeats'] ?></p>
                                           </div>
                                     </div>
                               </div>

                               <div class="col custom-counter-item">
                                     <div class="custom-counter">

                                           <div class="custom-counter-body">
                                                 <h5 class="custom-counter-subtitle text-center">DRAWS</h5>
                                                 <p class="custom-counter-title text-center">
                                                       <?= $utilisateur['numberOfDraws'] ?></p>
                                           </div>
                                     </div>
                               </div>

                               <!--Rajouter colonne ratio dans la BDD ou calculer directement avec php-->
                               <div class="col custom-counter-item">
                                     <div class="custom-counter">
                                           <div class="custom-counter-body">
                                                 <h5 class="custom-counter-subtitle text-center">RATIO</h5>
                                                 <p class="custom-counter-title text-center">1.28</p>
                                           </div>
                                     </div>

                               </div>

                               <!--Rajouter colonne rang dans la BDD-->
                               <div class="col custom-counter-item">
                                     <div class="custom-counter">

                                           <div class="custom-counter-body">
                                                 <h5 class="custom-counter-subtitle text-center">RANK</h5>
                                                 <p class="custom-counter-title text-center">592</p>
                                           </div>
                                     </div>
                               </div>

                               <div class="col custom-counter-item">
                                     <div class="custom-counter">

                                           <div class="custom-counter-body">
                                                 <h5 class="custom-counter-subtitle text-center">POINTS</h5>
                                                 <p class="custom-counter-title text-center">
                                                       <?= $utilisateur['totalPoints'] ?></p>
                                           </div>
                                     </div>
                               </div>

                         </div>

                   </div>

                   <!--RENAUD doit mettre l'action du formulaire-->


                   <div class="w-100 mb-4">
                         <hr class="mb-3">
                         <h3 class="mb-3">Profil</h3>

                         <div class="mb-3">
                               <label for="pseudoPlatform" class="label">pseudoPlatform</label>
                               <input class="input-field" type="text" placeholder="Your nickname"
                                     value="<?= $utilisateur['pseudoPlatform'] ?>" id="pseudoPlatform"
                                     name="pseudoPlatform" readonly class="input-field">
                         </div>

                   </div>



                   <div class="w-100 mb-4">
                         <hr class="mb-3">
                         <h3 class="mb-3">Utilisateur</h3>
                         <div class="mb-3">
                               <label class="label" for="login">Login</label>
                               <input type="text" name="login" id="login" readonly class="input-field"
                                     placeholder="Your login" value="<?= $utilisateur['login'] ?>" require="required">
                         </div>
                         <form class="w-100" action="<?= URL ?>validation_modification_data" id="profilForm"
                               method="POST">
                               <div class="mb-3">
                                     <label class="label" for="platform">Platform</label>
                                     <select name="platform" class="input-field">
                                           <option value="ps5" selected>ps5</option>
                                           <option value="ps4">ps4</option>
                                           <option value="xbox">xbox</option>
                                           <option value="pc">pc</option>
                                           <option value="switch">switch</option>
                                     </select>
                               </div>

                               <div class="mb-3">
                                     <label class="label" for="mail">Email</label>
                                     <input type="mail" name="mail" id="mail" class="input-field"
                                           placeholder="Your email address" value="<?= $utilisateur['mail'] ?>"
                                           require="required">
                               </div>

                               <div class="mb-3">
                                     <label class="label" for="birthdate">Birthdate</label>
                                     <input type="date" name="birthdate" id="birthdate" class="input-field"
                                           placeholder="Birthdate" value="<?= $utilisateur['birthdate'] ?>"
                                           require="required">
                               </div>

                               <div class="mb-3">
                                     <label class="label" for="telephone">Telephone</label>
                                     <input type="phone" name="telephone" id="telephone" class="input-field"
                                           placeholder="Your Phone number" value="<?= $utilisateur['telephone'] ?>"
                                           require="required">
                               </div>
                   </div>

                   <div class="w-100 mb-4">


                         <div class="mb-3">
                               <label class="label" for="country">Country</label>
                               <input type="Text" name="country" id="country" class="input-field"
                                     value="<?= $utilisateur['country'] ?>" placeholder="Your Country"
                                     require="required">
                         </div>
                   </div>

                   <div class="w-100 mb-4">
                         <hr class="mb-3">
                         <h3 class="mb-3">Info of Withdrawal</h3>
                         <div class="mb-3">
                               <label class="label" for="cryptocurrency">cryptocurrency</label>
                               <select name="cryptocurrency" class="input-field">
                                     <option value="BTC" selected>Bitcoin</option>
                                     <option value="ETH">Ethereum</option>
                                     <option value="LTC">Litecoin</option>
                                     <option value="BNB">BNB Coin (Mainnet)</option>
                                     <option value="DODGE">Dogecoin</option>
                                     <option value="SUM">Sumcoin</option>

                               </select>
                         </div>
                         <div class="mb-3">
                               <label class="label" for="wallet">receiving address of your earned money</label>
                               <input type="Text" name="wallet" id="wallet" class="input-field"
                                     placeholder="Your address's wallet" require="required">
                         </div>

                   </div>
                   <div class="mb-3">
                         <button class="card-button" type="submit">Save the
                               Changes</button>
                   </div>

                   </form>

                   <div class="w-100 mb-4">
                         <hr class="mb-3">
                         <div class="mb-3">
                               <a href="<?= URL ?>compte/modificationPassword">
                                     <button class="card-button">Change password</button>
                               </a>
                         </div>
                         <div class="mb-3">
                               <a href="<?= URL ?>compte/suppressionCompte"> <button class="card-button">Delete my
                                           account</button> </a>
                         </div>

                   </div>
       </main>
 </div>