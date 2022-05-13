
<div class="row">

    <!--Chat privée-->
    <aside class="chat-container">
        <h3 class="chat-title">CHAT PRIVEE</h3>

        <div class="d-flex flex-column">
            <div class="speech-bubble speech-other">
                <div class="d-flex flex-row">
                    <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                    <div class="d-flex flex-column">
                        <p class="chat-nickname">ZharksLeGrand #7593</p>
                        <p class="chat-date">11:22</p>
                    </div>
                </div>
                <p class="chat-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate voluptatibus laboriosam ex 
                    officia excepturi magni, explicabo magnam. Similique odit maxime exercitationem aliquid reiciendis 
                    atque, consequatur aut ipsa possimus suscipit eaque!</p>
            </div>

            <div class="speech-bubble speech-user">
                <div class="d-flex flex-row">
                    <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                    <div class="d-flex flex-column">
                        <p class="chat-nickname">ZharksLeGrand #7593</p>
                        <p class="chat-date">11:22</p>
                    </div>
                </div>
                <p class="chat-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate voluptatibus laboriosam ex 
                    officia excepturi magni, explicabo magnam. Similique odit maxime exercitationem aliquid reiciendis 
                    atque, consequatur aut ipsa possimus suscipit eaque!</p>
            </div>
        </div>

        <form class="d-flex flex-row chat-input-container">
            <input class="input-field-left" type="text" placeholder="Your message">
            <button class="button-right-red">Send</button>
        </form>
    </aside>



    <main class="col">
        <div class="row">

            <!--Liste des joueurs-->
            <div class="d-flex flex-column custom-playerList-container">
                <div class="d-flex flex-row custom-playerList-item">
                    <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                    <div class="d-flex flex-column">
                        <p class="chat-nickname">ZharksLeGrand #7593</p>
                        <p class="chat-date">Ready</p>
                    </div>

                    <div class="ms-auto">
                        <button class="button-red">Ready</button>
                    </div>
                </div>

                <div class="d-flex flex-row custom-playerList-item">
                    <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                    <div class="d-flex flex-column">
                        <p class="chat-nickname">ZharksLeGrand #7593</p>
                        <p class="chat-date">Not ready</p>
                    </div>

                    <div class="ms-auto">
                        <button class="button-outline-red">Kick</button>
                    </div>
                </div>           
            </div>


            <!--Informations de la partie-->
            <div class="custom-infoList-container">
                <hr class="w-100 custom-infoList-item">
                <h2 class="custom-infoList-title">Informations</h2>
                <h4 class="custom-infoList-item">Jeux: Fortnite</h4>
                <h4 class="custom-infoList-item">Mise: 20 euros</h4>
                <h4 class="custom-infoList-item">Plateforme: PC</h4>
                <h4 class="custom-infoList-item">Statut partie: privée (entre ami)</h4>
                <h4 class="custom-infoList-item">Identifiant partie: #47013</h4>
            </div>


            <!--Score-->
            <form class="row">
                <div class="col-12 col-lg-4">
                    <label for="" class="label">Your score</label>
                    <input class="input-field" type="text" placeholder="0">
                </div>
                
                <div class="col-12 col-lg-4">
                    <label for="" class="label">Enemy score</label>
                    <input class="input-field" type="text" placeholder="0">
                </div>

                <div class="col-12 col-lg-4">
                    <label for="" class="label">Proof of the score</label>
                    <input class="form-control" type="file">
                </div>

                <div class="text-center">
                    <button class="button-red">Publish score</button>
                </div>
            </form>

        </div>
    </main>
</div>


<!--
<main class="">
    <div class="row">

        Couverture du jeu
        <div class="col-12 col-xl-6 text-center mb-5">
            <img src="https://picsum.photos/400" alt="" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
        </div>

        Joueurs présent dans la salle
        <div class="list-group list-group-flush col-12 col-xl-6 mb-5">
            <div class="list-group-item">
                <div class="">
                    <div class="d-flex w-100">
                        <img src="https://picsum.photos/200" class="me-2" alt="" style="height: 20px">
                        <h4 class="fw-bold">Pseudo site: Marie</h4>
                        <small class="ms-auto text-success">Ready</small>
                    </div>
                    <div>Pseudo plateforme: Dark_Sasukexx63</div>
                    <div>Mise: 20$</div>
                </div>
            </div>

            <div class="list-group-item">
                <div class="">
                    <div class="d-flex w-100">
                        <img src="https://picsum.photos/200" class="me-2" alt="" style="height: 20px">
                        <h4 class="fw-bold">Pseudo site: Marie</h4>
                        <small class="ms-auto text-danger">Not Ready</small>
                    </div>
                    <div>Pseudo plateforme: Dark_Sasukexx63</div>
                    <div>Mise: 20$</div>
                </div>
            </div>

        <div class="col-12 mb-5">
            <h3 class="d-block mb-2 fw-bold">Informations</h3>
            <hr class="w-100">
            <div class="row">
                <h4 class="mb-2">Plateforme: PC</h4>
                <h4 class="mb-2">Statut partie: privée (entre ami)</h4>
                <h4 class="mb-2">Identifiant partie: #47013</h4>
            </div>
        </div>

        <div class="col-12 row justify-content-md-between">
            <button class="col-12 col-md-5 btn btn-outline-danger mb-3">Quit</button>
            <button class="col-12 col-md-5 btn btn-danger mb-3">Ready</button>
        </div>


    </div>
</main>
-->