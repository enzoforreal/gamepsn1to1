<h1 class="text-center">Rooms Parties</h1>

<table class="table table-success table-striped table-bordered" id="RoomsTable">
      <thead>
            <tr class="table-dark">
                  <th>Room ID</th>
                  <th>Login author</th>
                  <th>Bet</th>
                  <th>Guest</th>
                  <th>Score</th>
                  <th>Platform</th>
                  <th>Game</th>
                  <th>Status</th>
                  <th>DateAtCreated</th>
                  <th>DateAtUpdated</th>

            </tr>
            <?php foreach ($parties as $party) : ?>
            <tr class="table-info">
                  <td><?php echo $party['idParty'] ?></td>
                  <td><?php echo $party['login'] ?></td>
                  <td><?php echo $party['bet'] ?> €</td>
                  <td><?php echo $party['login_1'] ?></td>
                  <td><?php echo $party['score'] ?></td>
                  <td><?php echo $party['platform'] ?></td>
                  <td><?php echo $party['game'] ?></td>
                  <td><?= (int)$party['statut'] === 0 ? "player-waiting" : "game in progress" ?></td>
                  <td><?php echo $party['dateAtCreated'] ?></td>
                  <td><?php echo $party['dateAtUpdated'] ?></td>
            </tr>
            <?php endforeach; ?>
      </thead>
</table>