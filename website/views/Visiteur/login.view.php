<script src="public/JavaScript/captcha.js" charset="utf-8"></script>
<link href="<?= URL ?>../../public/CSS/captcha.css" rel="stylesheet" />
<main class="container-fluid bg-light" style="height: 100vh">
      <div class="container">
            <div class="d-flex flex-column align-items-center">

                  <div class="m-5">
                        <img class="mx-auto d-block mb-3" src="../../public/Assets/images/logo.png" alt="Logo"
                              width="100px" style=" object-fit: cover;">
                        <h1 class="text-center fw-bold">Login</h1>

                  </div>

                  <form method="POST" action="<?= URL ?>validation_login" class="d-flew flew-column"
                        style="max-width: 400px">
                        <div class="mb-3">
                              <label for="login">Login</label>
                              <input type="text" name="login" id="login" class="form-control" placeholder="Your login"
                                    require="required">
                        </div>

                        <div class="mb-3">
                              <label for="password">Password</label>
                              <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Your password" require="required">
                        </div>

                        <table class="captcha" width="300" border="0" cellspacing="0" cellpadding="0" height="170">
                              <tr>
                                    <td id="image1" name="image2" class="i6" onclick="clickImage('image1')"></td>
                                    <td id="image2" name="image3" class="i2" onclick="clickImage('image2')"></td>
                              </tr>
                              <tr>
                                    <td id="image3" name="image1" class="i5" onclick="clickImage('image3')"></td>
                                    <td id="image4" name="image4" class="i1" onclick="clickImage('image4')"></td>
                              </tr>
                        </table>
                        <div class="text-center">
                              <button disabled="True" id="button" type="submit"
                                    class="btn btn-success btn-sm mt-4">Connect to your
                                    account</button>
                        </div>
                  </form>

            </div>
      </div>
</main>