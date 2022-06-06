<h1 class="text-center">Historical of payments</h1>

<table class="table table-success table-striped table-bordered" id="paymentsTable">
      <thead>
            <tr class="table-dark">
                  <th>id_transaction</th>
                  <th>login</th>
                  <th>from_currency</th>
                  <th>enterred_amount</th>
                  <th>to_currency</th>
                  <th>amount</th>
                  <th>status</th>
                  <th>created_at</th>
                  <th>updated_at</th>
            </tr>
            <?php foreach ($payments as $payment) : ?>
            <tr class="table-info">
                  <td><?php echo $payment['id_transaction'] ?></td>
                  <td><?php echo $payment['login'] ?></td>
                  <td><?php echo $payment['from_currency'] ?></td>
                  <td><?php echo $payment['enterred_amount'] ?></td>
                  <td><?php echo $payment['to_currency'] ?></td>
                  <td><?php echo $payment['amount'] ?></td>
                  <td><?php echo $payment['status'] ?></td>
                  <td><?php echo $payment['created_at'] ?></td>
                  <td><?php echo $payment['updated_at'] ?></td>
            </tr>
            <?php endforeach; ?>
      </thead>
</table>