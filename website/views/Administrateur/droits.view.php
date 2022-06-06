 <h2 class="text-center">Right Management</h2>
 <table class="table table-info table-striped table-bordered">
       <thead>
             <tr class="table-dark">
                   <th>Login</th>
                   <th>Validé</th>
                   <th>Rôle</th>
             </tr>
             <?php foreach ($utilisateurs as $utilisateur) : ?>
             <tr class="form-group">
                   <td><?= $utilisateur['login'] ?></td>
                   <td><?= (int)$utilisateur['est_valide'] === 0 ? "non validé" : "validé" ?></td>
                   <td>
                         <?php if($utilisateur['role'] === "administrateur") : ?>
                         <?= $utilisateur['role'] ?>
                         <?php else: ?>
                         <form method="POST" action="<?= URL ?>administration/validation_modificationRole">
                               <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
                               <select class="form-select" name="role"
                                     onchange="confirm('confirmez vous la modification ?') ? submit() : document.location.reload()">
                                     <option value="utilisateur"
                                           <?= $utilisateur['role'] === "utilisateur" ? "selected" : ""?>>Utilisateur
                                     </option>
                                     <option value="Sutilisateur"
                                           <?= $utilisateur['role'] === "Sutilisateur" ? "selected" : ""?>>Super
                                           Utilisateur</option>
                                     <option value="administrateur"
                                           <?= $utilisateur['role'] === "administrateur" ? "selected" : ""?>>
                                           Administrateur</option>
                               </select>
                         </form>
                         <?php endif; ?>
                   </td>
             </tr>
             <?php endforeach; ?>
       </thead>
 </table>