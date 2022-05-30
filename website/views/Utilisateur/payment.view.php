      <div class="row">
            <div class="col-md-6 offset-md-3"
                  style="margin:auto; background: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
                  <div class="panel-heading">
                        <h1>Deposit with cryptocurrency</h1>
                        <p style="font-style: italic;">to account of <strong><?= $utilisateur['login']; ?></strong></p>
                  </div>
                  <hr>
                  <form action="process.php" method="post" autocomplete="off">
                        <label for="amount">Amount (EUR)</label>
                        <input type="text" name="amount" class="form-control">
                        <br>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="form-control">
                        <br>
                        <a href="compte/validationDeposit" type="submit" style="border-radius: 0px;"
                              class="btn btn-lg btn-block btn-success">deposit
                              to my account</a>
                  </form>
            </div>
      </div>