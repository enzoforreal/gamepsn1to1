 <div class="row custom-container-fluid-grey">
       <aside class="profil-sidebar-container d-flex flex-column">
             <div class="border border-5">
                   <h5 class="custom-counter-title text-center">Balance</h5>

                   <p class="custom-counter-title text-center"><span
                               class="badge  bg-dark"><?= $utilisateur['balance'] ?>
                               €</span></p>
             </div>
             <div>
                   <ul class="profil-sidebar-list-group">
                         <li><a class="profil-sidebar-list-item" href="<?= URL; ?>compte/pageTransfer">Deposit money</a>
                         </li>

                         </li>
                         <li><a class="profil-sidebar-list-item" href="<?= URL; ?>compte/profilFriends">Friends</a></li>
                   </ul>
             </div>
       </aside>
       <main class="col">
             <div class="d-flex flex-column align-items-center mx-auto" style="margin: 100px; max-width: 700px">
                   <form class="w-100" action="<?= URL ?>compte/createWithdraw" id="profilForm" method="POST">
                         <div class="w-100 mb-3">
                         </div>
                         <div class="w-100 mb-4">
                               <hr class="mb-3">
                               <div class="mb-3">
                                     <label class="label" for="wallet">Amount (EUR)</label>
                                     <input type="text" name="enterred_amount" class="form-control">
                                     <br>
                               </div>
                         </div>
                         <div class="w-100 mb-4">
                               <hr class="mb-3">
                               <div class="mb-3">
                                     <label class="label" for="wallet">receiving address</label>
                                     <input type="Text" name="address" id="wallet" class="input-field"
                                           placeholder="Your address's wallet" require="required">
                               </div>
                         </div>
                         <div class="mb-3">
                               <button class="card-button" type="submit">Withdraw</button>
                         </div>

                   </form>

       </main>
 </div>