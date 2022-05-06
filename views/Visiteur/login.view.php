<main class="container-fluid bg-light" style="height: 100vh">
      <div class="container">
            <div class="d-flex flex-column align-items-center">

                  <div class="m-5">
                        <img class="mx-auto d-block mb-3" src="../../public/Assets/images/logo.svg" alt="Logo"
                              width="200px" style=" object-fit: cover;">
                        <h1 class="text-center fw-bold">Login</h1>
                        <p class="text-center">Connect to your account</p>
                  </div>

                  <form method="POST" action="<?= URL ?>validation_login" class="d-flew flew-column"
                        style="width: 400px">
                        <div class="mb-3">
                              <label for="login">Lastname</label>
                              <input type="text" name="login" id="login" class="form-control"
                                    placeholder="Your lastname" require="required">
                        </div>

                        <div class="mb-3">
                              <label for="password">Password</label>
                              <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Your password" require="required">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Connect</button>
                  </form>

            </div>
      </div>
</main>