<main class="container-fluid bg-light" style="height: 100vh">
      <div class="container">
            <div class="d-flex flex-column align-items-center">

                  <div class="m-5">
                        <img class="mx-auto d-block mb-3" src="../../public/Assets/images/logo.png" alt="Logo"
                              width="100px" style=" object-fit: cover;">
                        <h1 class="text-center fw-bold">Change password</h1>

                  </div>

                  <form method="POST" action="<?= URL ?>compte/validation_modificationPassword" class="d-flew flew-column"
                        style="width: 400px">

                        <div class="mb-3">
                            <label for="password" class="label">Ancien mot de passe</label>
                            <input type="password" class="input-field" id="ancienPassword" name="ancienPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="nouveauPassword" class="label">Nouveau mot de passe</label>
                            <input type="password" class="input-field" id="nouveauPassword" name="nouveauPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmNouveauPassword" class="label">Confirmation nouveau mot de passe</label>
                            <input type="password" class="input-field" id="confirmNouveauPassword" name="confirmNouveauPassword" required>
                        </div>
                        <div class="alert alert-danger d-none" id="erreur">
                            Les passwords ne correspondent pas
                        </div>

                        <button type="submit" class="card-button" id="btnValidation" disabled>Submit</button>

                        </div>
                  </form>

            </div>
      </div>
</main>