<h1>Logs du site</h1>
<h2>Visites</h2>
<table class="table">
      <thead>
            <tr>
                  <th>Route</th>
                  <th>Visites connectées</th>
                  <th>Invités</th>
            </tr>
            <?php foreach ($logs as $log) : ?>
            <tr>
                  <td><?php echo $log['route'] ?></td>
                  <td><?php echo $log['loggedVisits'] ?></td>
                  <td><?php echo $log['visitorsVisits'] ?></td>
            </tr>
            <?php endforeach; ?>
      </thead>
</table>