import { chatClient } from "./chatClient.js";

let client;
let chatMsg = document.getElementById("chatMsg");

window.onload = async function () {
  const response = await fetch("/compte/token", {
    method: "GET",
  });

  let token = await response.text();
  client = new chatClient("wss://gamepsn1to1.com:9000", "public", token, true);
  let username = client.getUsername();
  client.onConnected = () => {
    chatMsg.disabled = false;
    document.getElementById("buttonSend").disabled = false;
    chatMsg.disabled = false;
    chatMsg.placeholder = "Your message";
  };
  client.onMessage = (msg, from) => {
    var publicChatContainer = document.getElementById("public-chat-container");
    var myNewMessage = document.createElement("div");

    if (from == username) {
      myNewMessage.innerHTML += `<div class="speech-bubble speech-user">
          <div class="d-flex flex-row">
              <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
              <div class="d-flex flex-column">
                  <p class="chat-nickname">${from}</p>
                  <p class="chat-date">11:22</p>
              </div>
          </div>
          <p class="chat-text">${msg}</p>
      </div>`;
    } else {
      myNewMessage.innerHTML += `<div class="speech-bubble speech-other">
        <div class="d-flex flex-row">
            <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
            <div class="d-flex flex-column">
                <p class="chat-nickname">${from}</p>
                <p class="chat-date">11:22</p>
            </div>
        </div>
        <p class="chat-text">${msg}</p>
      </div>`;
    }

    publicChatContainer.appendChild(myNewMessage);
  };
};

window.sendMsg = function sendMsg() {
  var msg = chatMsg.value;
  client.sendMsg(msg);
  chatMsg.value = "";
};

chatMsg.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    sendMsg();
  }
});
