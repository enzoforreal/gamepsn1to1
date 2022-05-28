<div class="row">

    <!--Chat privée-->
    <aside class="chat-container d-flex flex-column">
        <h3 class="chat-title">CHAT PUBLIQUE</h3>


        <div class="d-flex flex-column">
            <div class="mb-3" id="public-chat-container" style="height: 500px; overflow: scroll;">

            </div>
            <!--
            <div class="speech-bubble speech-other">
                <div class="d-flex flex-row">
                    <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                    <div class="d-flex flex-column">
                        <p class="chat-nickname">ZharksLeGrand #7593</p>
                        <p class="chat-date">11:22</p>
                    </div>
                </div>
                <p class="chat-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate voluptatibus laboriosam ex
                    officia excepuri magni, explicabo magnam. Similique odit maxime exercitationem aliquid reiciendis
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
            </div>-->
            <input disabled class="input-field-left justify-content-end align-self-end" id="chatMsg" type="text" placeholder="Connecting to chatroom">
            <button id="buttonSend" disabled onClick="sendMsg()" class="button-right-red">Send</button>
        </div>


    </aside>


    <!--Profil-->
    <div class="col custom-card-container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4 justify-content-center ">

            <!--Template profil-->
            <div class="col custom-card-item" style="width: 300px">
                <div class="card">
                    <img class="card-avatar" src="https://picsum.photos/1000" alt="image game">
                    <div class="custom-card-body">
                        <h5 class="custom-card-title text-center">Nom site: Marie</h5>
                        <hr>

                        <p class="custom-card-subtitle">Pseudo: ZharksLeGrand</p>
                        <p class="custom-card-subtitle">Description: Je suis une gameuse vétérée qui joue principalement au FPS notamment Call Of Duty</p>
                        <hr>

                        <p class="custom-card-text">Plateforme: PC</p>
                        <p class="custom-card-text">Jeux préféré: Call Of Duty Ghost</p>
                        <p class="custom-card-text">Rang: 462ème</p>
                        <hr>

                        <div class="row">
                            <a class="col-12 col-sm-6" href="">
                                <button class="card-button">Message</button>
                            </a>
                            <a class="col-12 col-sm-6" href="">
                                <button class="card-button">Follow</button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>