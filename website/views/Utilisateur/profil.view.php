<div class="text-center">
    <h1>Profil de <?= $utilisateur['login'] ?></h1>
    <div>
        <div>
            <img src="<?= URL; ?>public/Assets/images/<?= $utilisateur['image'] ?>" width="100px" alt="photo de profil" />
        </div>
        <form method="POST" action="<?= URL ?>compte/validation_modificationImage" enctype="multipart/form-data">
            <label for="image">Changer l'image de profil </label><br />
            <input accept=".jpg,.jpeg" type="file" class="form-control-file" id="image" name="image" onchange="submit();" />
        </form>
    </div>
    <div id="mail">
        Mail : <?= $utilisateur['mail'] ?>
        <button class="btn btn-primary" id="btnModifMail">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
            </svg>
        </button>
    </div>

    <div id="modificationMail" class="d-none">
        <form method="POST" action="<?= URL; ?>compte/validation_modificationMail">
            <div class="row">
                <label for="mail" class="col-2 col-form-label">Mail :</label>
                <div class="col-8">
                    <input type="mail" class="form-control" name="mail" value="<?= $utilisateur['mail'] ?>" />
                </div>
                <div class="col-2">
                    <button class="btn btn-success" id="btnValidModifMail" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div>
        <a href="<?= URL ?>compte/modificationPassword" class="btn btn-warning">Changer le mot de passe</a>
        <button id="btnSupCompte" class="btn btn-danger">Supprimer son compte</button>
    </div>
    
</div>







<div class="row custom-container-fluid-grey">
    
    <aside class="profil-sidebar-container d-flex flex-column">
        <div style="position: fixed;">
            <ul class="profil-sidebar-list-group">
                <li><a class="profil-sidebar-list-item" href="<?= URL; ?>compte/profil">Settings</a></li>
                <li><a class="profil-sidebar-list-item" href="<?= URL; ?>compte/profilFriends">Friends</a></li>
            </ul>
        </div>
    </aside>

    <main class="col">
        <div class="d-flex flex-column align-items-center mx-auto" style="margin: 96px; max-width: 700px">

            <div class="card">
                <img class="profil-avatar-full" src="<?= URL; ?>public/Assets/images/<?= $utilisateur['image'] ?>" alt="Avatar">
            </div>

            <!--
            <form method="POST" action="<?= URL ?>compte/validation_modificationImage" enctype="multipart/form-data">
                
            </form>-->
            

            <p class="profil-nickname"><?= $utilisateur['pseudoPlatform'] ?></p>

            <div class="w-100 mb-3">

                

                <div class="mb-3">
                    <form method="POST" action="<?= URL ?>compte/validation_modificationImage" enctype="multipart/form-data">
                        <label for="image" class="label">Profil Picture</label><br />
                        <input accept=".jpg,.jpeg" type="file" class="form-control" id="image" name="image" onchange="submit();" />
                    </form>
                </div>

                <div class="mb-3">
                    <a href="<?= URL ?>compte/modificationPassword">
                        <button class="card-button">Change password</button>
                    </a>             
                </div>


                <hr class="mb-3">
                <h3 class="mb-3">Performances</h3>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 justify-content-center ">

                    <!--Template compteur-->
                    <div class="col custom-counter-item">
                        <div class="custom-counter" >
                            <div class="custom-counter-avatar-container">
                                <img class="custom-counter-avatar" src="https://picsum.photos/1000" alt="image game">
                            </div>
                            <div class="custom-counter-body">
                                <h5 class="custom-counter-subtitle text-center">VICTOIRE</h5>
                                <p class="custom-counter-title text-center"><?= $utilisateur['numberOfWins'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col custom-counter-item">
                        <div class="custom-counter" >
                            <div class="custom-counter-avatar-container">
                                <img class="custom-counter-avatar" src="https://picsum.photos/1000" alt="image game">
                            </div>
                            <div class="custom-counter-body">
                                <h5 class="custom-counter-subtitle text-center">DEFAITE</h5>
                                <p class="custom-counter-title text-center"><?= $utilisateur['numberOfDefeats'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col custom-counter-item">
                        <div class="custom-counter" >
                            <div class="custom-counter-avatar-container">
                                <img class="custom-counter-avatar" src="https://picsum.photos/1000" alt="image game">
                            </div>
                            <div class="custom-counter-body">
                                <h5 class="custom-counter-subtitle text-center">EGALITE</h5>
                                <p class="custom-counter-title text-center"><?= $utilisateur['numberOfDraws'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!--Rajouter colonne ratio dans la BDD ou calculer directement avec php-->
                    <div class="col custom-counter-item">
                        <div class="custom-counter" >
                            <div class="custom-counter-avatar-container">
                                <img class="custom-counter-avatar" src="https://picsum.photos/1000" alt="image game">
                            </div>
                            <div class="custom-counter-body">
                                <h5 class="custom-counter-subtitle text-center">RATIO</h5>
                                <p class="custom-counter-title text-center">1.28</p>
                            </div>
                        </div>
                    </div>

                    <!--Rajouter colonne rang dans la BDD-->
                    <div class="col custom-counter-item">
                        <div class="custom-counter" >
                            <div class="custom-counter-avatar-container">
                                <img class="custom-counter-avatar" src="https://picsum.photos/1000" alt="image game">
                            </div>
                            <div class="custom-counter-body">
                                <h5 class="custom-counter-subtitle text-center">RANG</h5>
                                <p class="custom-counter-title text-center">592</p>
                            </div>
                        </div>
                    </div>

                    <div class="col custom-counter-item">
                        <div class="custom-counter" >
                            <div class="custom-counter-avatar-container">
                                <img class="custom-counter-avatar" src="https://picsum.photos/1000" alt="image game">
                            </div>
                            <div class="custom-counter-body">
                                <h5 class="custom-counter-subtitle text-center">POINTS</h5>
                                <p class="custom-counter-title text-center"><?= $utilisateur['totalPoints'] ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                          
            </div>

            <!--RENAUD doit mettre l'action du formulaire-->
            <form class="w-100" action="<?= URL ?>compte/modificationProfil" id="profilForm" method="POST">

                <div class="w-100 mb-4">
                    <hr class="mb-3">
                    <h3 class="mb-3">Profil</h3>
                    
                    <!--Rajouter colonne Wallet dans BDD-->
                    <div class="mb-3">
                        <label for="pseudoPlatform" class="label">Nickname</label>
                        <input class="input-field" type="text" placeholder="Your nickname" 
                        value="<?= $utilisateur['pseudoPlatform'] ?>" id="pseudoPlatform" name="pseudoPlatform">
                    </div>

                    <!--Rajouter colonne Banking Card dans BDD-->
                    <div class="mb-3">
                        <label for="image" class="label">Avatar</label>
                        <input accept=".jpg,.jpeg" class="form-control" type="file" id="image" name="image">
                    </div>
                </div>

                <div class="w-100 mb-4">
                    <hr class="mb-3">
                    <h3 class="mb-3">Utilisateur</h3>
                    <div class="mb-3">
                        <label class="label" for="login">Login</label>
                        <input type="text" name="login" id="login" readonly class="input-field" placeholder="Your login"
                            value="<?= $utilisateur['login'] ?>" require="required">
                    </div>

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
                        <input type="mail" name="mail" id="mail" class="input-field" placeholder="Your email address"
                            value="<?= $utilisateur['mail'] ?>" require="required">
                    </div>

                    <div class="mb-3">
                        <label class="label" for="birthdate">Birthdate</label>
                        <input type="date" name="birthdate" id="birthdate" class="input-field"
                            placeholder="Birthdate" value="<?= $utilisateur['birthdate'] ?>" require="required">
                    </div>

                    <div class="mb-3">
                        <label class="label" for="telephone">Telephone</label>
                        <input type="phone" name="telephone" id="telephone" class="input-field"
                                placeholder="Your Phone number" value="<?= $utilisateur['telephone'] ?>" require="required">
                    </div>
                </div>

                <div class="w-100 mb-4">
                    <hr class="mb-3">
                    <h3 class="mb-3">Cordonnées</h3>
                    <div class="mb-3">
                        <label class="label" for="country">Country</label>
                        <input type="Text" name="country" id="country" class="input-field" value="<?= $utilisateur['country'] ?>"
                            placeholder="Your Country" require="required">
                    </div>
                </div>

                <div class="w-100 mb-4">
                    <hr class="mb-3">
                    <h3 class="mb-3">Paiement</h3>
                    
                    <div class="mb-3">
                        <label class="label" for="wallet">Wallet</label>
                        <input type="Text" name="wallet" id="wallet" class="input-field"
                                placeholder="Your wallet" require="required">
                    </div>

                    <!--
                    Rajouter colonne Banking Card dans BDD
                    <div class="mb-3">
                        <label class="label" for="bk">Banking card</label>
                        <input type="Text" name="bk" id="bk" class="input-field"
                                placeholder="Your banking card" require="required">
                    </div>-->
                </div>

                <div class="w-100 mb-4">
                    <hr class="mb-3">
                    <h3 class="mb-3">Save and Delete</h3>

                    <!--
                    <div class="mb-3">
                        <label class="label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="input-field"
                                placeholder="Your password" require="required">
                    </div>
                    -->


                    <div class="">
                        <button class="card-button mb-3" type="submit" form="profilForm">Save the Changes</button>
                    </div>

                    <button id="btnSupCompte" class="card-button-outline">Supprimer son compte</button>
                    
                    <div id="suppressionCompte" class="d-none m-2">
                        <div class="alert alert-danger">
                            Veuillez confirmer la suppression du compte.
                            <br />
                            <a href="<?= URL ?>compte/suppressionCompte" class="btn btn-danger">Je Souhaite supprimer mon compte définitivement !</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>