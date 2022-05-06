<footer class="container-fluid bg-dark">   
      <div class="container">
            <div class="row p-0">

                  <!--Informations-->
                  <div class="row mt-5 d-flex flex-row justify-content-between">
                        
                        <!--Formulaire de message-->
                        <div class="col-lg-4 col-12 mb-5">
                              <h5 class="text-center text-light fw-bold">Message</h5>

                              <form action="" method="">
                                    <div class="form-group">
                                          <label class="text-light mb-1">Lastname</label>
                                          <input type="text" class="form-control mb-3" name="lastname" placeholder="Votre Nom">
                                    </div>

                                    <div class="form-group">
                                          <label class="text-light mb-1">Email</label>
                                          <input type="email" class="form-control mb-3" name="email" placeholder="Votre Adresse mail">
                                    </div>

                                    <div class="form-group">
                                          <label class="text-light mb-1">Message</label>
                                          <textarea class="form-control mb-3" name="message" rows="3" placeholder="Votre Message"></textarea>
                                    </div>

                                    <div class="text-center">
                                          <button type="submit" class="btn btn-danger custom-button">Submit</button>
                                    </div>
                              </form>
                        </div>

                        <!--Liens de navigation-->
                        <div class="nav col-lg-3 col-12 mb-5 p-0">
                              <h5 class="text-center text-light fw-bold w-100">Sitemap</h5>

                              <li class="w-100">
                                    <a class="nav-link text-light text-center" aria-current="page" href="<?= URL; ?>accueil">Home</a>
                              </li>

                              <?php if(!Securite::estConnecte()) : ?>
                                    <li class="w-100 text-center">
                                          <a class="nav-link text-light" aria-current="page" href="<?= URL; ?>login">Login</a>
                                    </li>

                                    <li class="w-100 text-center">
                                          <a class="nav-link text-light" aria-current="page" href="<?= URL; ?>creerCompte">Register</a>
                                    </li>
                              <?php else : ?>
                                    <li class="w-100 text-center">
                                          <a class="nav-link text-light" aria-current="page" href="<?= URL; ?>compte/profil">Profil</a>
                                    </li>

                                    <li class="w-100 text-center">
                                          <a class="nav-link text-light" aria-current="page" href="<?= URL; ?>partie">Party</a>
                                    </li>

                                    <li class="w-100 text-center">
                                          <a class="nav-link text-light" aria-current="page" href="<?= URL; ?>compte/deconnexion">Logout</a>
                                    </li>
                              <?php endif; ?>

                              <?php if(Securite::estConnecte() && Securite::estAdministrateur()) : ?>
                                    <li class="nav-item dropdown w-100 text-center">
                                          <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">Administration
                                          </a>

                                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li>
                                                      <a class="dropdown-item" href="<?= URL; ?>administration/droits">Manage the rights</a>
                                                </li>
                                          </ul>
                                    </li>
                              <?php endif; ?>
                        </div>

                        <!--Coordonnées-->
                        <div class="col-lg-3 col-12 text-light">
                              <h5 class="text-center text-light fw-bold">Contact</h5>
                              <p class="text-center text-light"><i class="bi bi-map custom-icon"></i>New York, NY 10012, US</p>
                              <p class="text-center text-light"><i class="bi bi-envelope custom-icon"></i>info@example.com</p>
                              <p class="text-center text-light"><i class="bi bi-phone custom-icon"></i>+ 01 234 567 88</p>
                        </div>
                  </div>
                  
                  <!--Copyright-->
                  <div class="my-3 p-0">
                        <hr class="w-100 bg-light">

                        <p class="col-12 text-center text-light">© 2022 GAMEPSN1TO1. All rights reserved.</p>
                  </div>

            </div>
      </div>
</footer>