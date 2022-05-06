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

                <button type="submit" class="btn btn-primary w-100">Create</button>
            </form>

        </div>
    </div>
</main>