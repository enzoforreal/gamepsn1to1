<h1 class="text-center">Logs of Visits</h1>

<table class="table table-success table-striped table-bordered" id="logsTable">
      <thead>
            <tr class="table-dark">
                  <th>Route</th>
                  <th>Visites connectées</th>
                  <th>Invités</th>
            </tr>
            <?php foreach ($logs as $log) : ?>
            <tr class="table-info">
                  <td><?php echo $log['route'] ?></td>
                  <td><?php echo $log['loggedVisits'] ?></td>
                  <td><?php echo $log['visitorsVisits'] ?></td>
            </tr>
            <?php endforeach; ?>
      </thead>
</table>