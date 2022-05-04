<header class="container-fluid bg-dark">
      <nav class="container">
            <div class="row d-flex flex-row align-items-center justify-content-center justify-content-md-between">

                  <!--Logo-->
<<<<<<< Updated upstream
                  <a href="#" class="col-12 col-lg-3 text-lg-start text-center"><img
                              src="<?= URL; ?>public/Assets/images/logo.svg" width="150" alt="logo du site" /></a>
=======
                  <a href="#" class="col-12 col-lg-3 text-lg-start text-center d-flex flex-row align-items-center" style="text-decoration: blink;">
                        <img src="<?= URL; ?>public/Assets/images/logo.svg" width="70px" alt="logo du site" />
                        <p class="text-danger d-inline fw-bold mb-0 ms-2" style="font-size: 20px;">Game1To1</p>
                  </a>
>>>>>>> Stashed changes

                  <!--Liens-->
                  <ul class="nav col-12 col-lg-auto justify-content-center">

                        <li>
                              <a class="nav-link text-light" aria-current="page" href="<?= URL; ?>accueil">Home</a>
                        </li>

                        <?php if(!Securite::estConnecte()) : ?>
                        <li>
                              <a class="nav-link text-light" aria-current="page" href="<?= URL; ?>login">Login</a>
                        </li>

                        <li>
                              <a class="nav-link text-light" aria-current="page"
                                    href="<?= URL; ?>creerCompte">Register</a>
                        </li>
                        <?php else : ?>
                        <li>
                              <a class="nav-link text-light" aria-current="page"
                                    href="<?= URL; ?>compte/profil">Profil</a>
                        </li>

                        <li>
                              <a class="nav-link text-light" aria-current="page" href="<?= URL; ?>partie">Party</a>
                        </li>

                        <li>
                              <a class="nav-link text-light" aria-current="page"
                                    href="<?= URL; ?>compte/deconnexion">Logout</a>
                        </li>
                        <?php endif; ?>

                        <?php if(Securite::estConnecte() && Securite::estAdministrateur()) : ?>
                        <li class="nav-item dropdown">
                              <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Administration
                              </a>

                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                          <a class="dropdown-item" href="<?= URL; ?>administration/droits">Manage the
                                                rights</a>

                                    </li>
                              </ul>
                        </li>
                        <?php endif; ?>
                  </ul>

            </div>
      </nav>
</header>