<!--<h1>Page de connexion</h1>
<form method="POST" action="<?= URL ?>validation_login">
    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" id="login" name="login" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <button type="submit" class="btn btn-primary">Connexion</button>
</form>-->

<main class="container-fluid bg-light" style="height: 100vh">
    <div class="container">
        <div class="d-flex flex-column align-items-center">

            <div class="m-5">
                <img class="mx-auto d-block mb-3" src="https://picsum.photos/100" alt="Logo">
                <h1 class="text-center fw-bold">Form login</h1>
                <p class="text-center">Connect to your account</p>
            </div>

            <form method="POST" action="<?= URL ?>validation_login" class="d-flew flew-column" style="width: 400px">
                <div class="mb-3">
                    <label for="login">Lastname</label>
                    <input type="text" name="login" id="login" class="form-control" placeholder="Your lastname" require="required">
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Your password" require="required">
                </div>

                <button type="submit" class="btn btn-primary w-100">Connect</button>
            </form>

        </div>
    </div>
</main>