      <div class="row">
            <div class="col-md-6 offset-md-3"
                  style="margin:auto; background: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
                  <div class="panel-heading">
                        <h1>Deposit with cryptocurrency</h1>
                        <p style="font-style: italic;">to account of <strong></strong></p>
                  </div>
                  <hr>

                  <form action="<?= URL ?>compte/deposit_money" method="POST" autocomplete="off">
                        <label for="amount">Amount (EUR)</label>
                        <input type="text" name="amount" class="form-control">
                        <br>


                        <button type="submit" style="border-radius: 0px;"
                              class="btn btn-lg btn-block btn-success">deposit
                              to my account</button>
                  </form>
                  <?php if(isset($datas) && !empty($datas)) : ?>
                  <img width="300" src="<?= $datas["result"]["qrcode_url"]; ?>">
                  <h3>Adresse destinataire: <?= $datas["result"]["address"]; ?></h3>
                  <h3>Somme à payer: <?= $datas["result"]["amount"]; ?></h3>
                  </h3>
                  <?php endif; ?>
            </div>
      </div>