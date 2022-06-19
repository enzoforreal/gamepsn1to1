<h1 class="text-center">Historical of withdrawal</h1>

<table class="table table-success table-striped table-bordered" id="paymentsTable">
      <thead>
            <tr class="table-dark">
                  <th>id_transaction</th>
                  <th>login</th>
                  <th>from_currency</th>
                  <th>enterred_amount</th>
                  <th>address</th>
                  <th>to_currency</th>
                  <th>amount</th>
                  <th>status</th>
                  <th>created_at</th>
                  <th>updated_at</th>
            </tr>
            <?php foreach ($withdraws as $withdraw) : ?>
            <tr class="table-info">
                  <td><?php echo $withdraw['txn_id'] ?></td>
                  <td><?php echo $withdraw['login'] ?></td>
                  <td><?php echo $withdraw['from_currency'] ?></td>
                  <td><?php echo $withdraw['enterred_amount'] ?></td>
                  <td><?php echo $withdraw['address'] ?></td>
                  <td><?php echo $withdraw['to_currency'] ?></td>
                  <td><?php echo $withdraw['amount'] ?></td>
                  <td><?php echo $withdraw['status'] ?></td>
                  <td><?php echo $withdraw['created_at'] ?></td>
                  <td><?php echo $withdraw['updated_at'] ?></td>
            </tr>
            <?php endforeach; ?>
      </thead>
</table>