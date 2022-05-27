<script src="public/JavaScript/captcha.js" charset="utf-8"></script>
<link href="<?= URL ?>public/CSS/captcha.css" rel="stylesheet" />

<main class="custom-container-fluid-grey">
      <div class="container">
            <div class="d-flex flex-column login-container align-items-center">

                  <div class="login-logo-container">
                        <div class="login-logo-image-container">

                              <img src="<?= URL; ?>public/Assets/images/logo.png" width="70px" alt="logo du site" />
                        </div>
                        <h1 class="login-logo-title">Sign up</h1>
                  </div>

                  <div class="login-form-container">
                        <form method="POST" action="<?= URL ?>validation_creerCompte">
                              <div class="mb-3">
                                    <label class="label" for="login">Login</label>
                                    <input type="text" name="login" id="login" class="input-field"
                                          placeholder="Your login" require="required">
                              </div>

                              <div class="mb-3">
                                    <label class="label" for="pseudoPlatform">Pseudo platform</label>
                                    <input type="Text" name="pseudoPlatform" id="pseudoPlatform" class="input-field"
                                          placeholder="pseudoPlatform" require="required">
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
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="input-field"
                                          placeholder="Your password" require="required">
                              </div>

                              <div class="mb-3">
                                    <label class="label" for="mail">Email</label>
                                    <input type="mail" name="mail" id="mail" class="input-field"
                                          placeholder="Your email" require="required">
                              </div>
                              <div class="mb-3">
                                    <label class="label" for="birthdate">Birthdate</label>
                                    <input type="date" name="birthdate" id="birthdate" class="input-field"
                                          placeholder="Birthdate" require="required">
                              </div>
                              <div class="mb-3">
                                    <label class="label" for="telephone">Telephone</label>
                                    <input type="phone" name="telephone" id="telephone" class="input-field"
                                          placeholder="Your Phone number" require="required">
                              </div>
                              <div class="mb-3">
                                    <label class="label" for="country">Country</label>
                                    <input type="Text" name="country" id="country" class="input-field"
                                          placeholder="Your Country" require="required">
                              </div>


                              <table class="captcha" width="300" border="0" cellspacing="0" cellpadding="0"
                                    height="170">
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
                                          class="btn btn-success btn-sm  mt-4">Create an
                                          account</button>
                              </div>
                        </form>

                  </div>
            </div>
      </div>
</main>