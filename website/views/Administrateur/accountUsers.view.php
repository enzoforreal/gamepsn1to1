 <table class="table table-success table-striped table-bordered" id="AccountTable">
       <thead>
             <h2 class="text-center">Account users</h2>
             <tr class="table-dark">
                   <th>Login</th>
                   <th>Pseudo Platform</th>
                   <th>Balance</th>
                   <th>Platform</th>
                   <th>Mail</th>
                   <th>Banned</th>
                   <th>Connections</th>
                   <th>Points</th>
                   <th>Wins</th>
                   <th>Defeats</th>
                   <th>Draws</th>
                   <th>Birthdate</th>
                   <th>Telephone</th>
                   <th>Country</th>
                   <th>isBanned</th>
                   <th>Last ip</th>


             </tr>
             <?php foreach ($utilisateurs as $utilisateur) : ?>
             <tr class="table-info">
                   <td><?php echo $utilisateur['login'] ?></td>
                   <td><?php echo $utilisateur['pseudoPlatform'] ?></td>
                   <td><?php echo $utilisateur['balance'] ?> €</td>
                   <td><?php echo $utilisateur['platform'] ?></td>
                   <td><?php echo $utilisateur['mail'] ?></td>
                   <td><?php echo $utilisateur['numberOfBans'] ?></td>
                   <td><?php echo $utilisateur['numberOfConnections'] ?></td>
                   <td><?php echo $utilisateur['totalPoints'] ?></td>
                   <td><?php echo $utilisateur['numberOfWins'] ?></td>
                   <td><?php echo $utilisateur['numberOfDefeats'] ?></td>
                   <td><?php echo $utilisateur['numberOfDraws'] ?></td>
                   <td><?php echo $utilisateur['birthdate'] ?></td>
                   <td><?php echo $utilisateur['telephone'] ?></td>
                   <td><?php echo $utilisateur['country'] ?></td>
                   <td><?= (int)$utilisateur['isBanned'] === 0 ? "no" : "yes" ?></td>
                   <td><?php echo $utilisateur['lastIP'] ?></td>
             </tr>
             <?php endforeach; ?>
       </thead>
 </table>