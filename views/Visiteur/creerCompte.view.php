<!--<h1>Création de compte</h1>
<form method="POST" action="validation_creerCompte">
    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" id="login" name="login" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="mail" class="form-label">mail</label>
        <input type="mail" class="form-control" id="mail" name="mail" required>
    </div>

    <button type="submit" class="btn btn-primary">Créer !</button>
</form>-->

<main class="container-fluid bg-light" style="height: 100vh">
    <div class="container">
        <div class="d-flex flex-column align-items-center">

            <div class="m-5">
                <img class="mx-auto d-block mb-3" src="https://picsum.photos/100" alt="Logo">
                <h1 class="text-center fw-bold">Form register</h1>
                <p class="text-center">Create an account to acces our services</p>
            </div>

            <form method="POST" action="validation_creerCompte" class="d-flew flew-column" style="width: 400px">
                <div class="mb-3">
                    <label for="login">Lastname</label>
                    <input type="text" name="login" id="login" class="form-control" placeholder="Your lastname" require="required">
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Your password" require="required">
                </div>

                <div class="mb-3">
                    <label for="mail">Email</label>
                    <input type="mail" name="mail" id="mail" class="form-control" placeholder="Your email" require="required">
                </div>
                <h6 class="title">Captcha puzzle</h6>
                <table width="225" border="0" cellspacing="0" cellpadding="0" height="225">
                    <tr>
                        <td id="image1" name="image2" class="i6" onclick="clickImage('image1')"></td>
                        <td id="image2" name="image3" class="i2" onclick="clickImage('image2')"></td>
                    </tr>
                    <tr>
                        <td id="image3" name="image1" class="i5" onclick="clickImage('image3')"></td>
                        <td id="image4" name="image4" class="i1" onclick="clickImage('image4')"></td>
                    </tr>
                </table>

                <button disabled="True" id="button" type="submit" class="btn btn-primary w-100">Create</button>
            </form>

        </div>
    </div>
</main>