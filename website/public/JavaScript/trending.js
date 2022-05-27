var token = "";
var conn = new WebSocket("wss://gamepsn1to1.com:9000");
var chatMsg = document.getElementById("chatMsg");
var username = "";

window.onload = function () {
  console.log("Connecting to chat");
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
      // XMLHttpRequest.DONE == 4
      if (xmlhttp.status == 200) {
        token = xmlhttp.responseText;
        login();
      } else {
        alert("Could not connect to the server");
      }
    }
  };

  xmlhttp.open("GET", "/compte/token", true);
  xmlhttp.send();
};

conn.onopen = function (e) {
  console.log("Websocket connection established");
};

function sendMsg() {
  var msg = chatMsg.value;
  chatMsg.value = "";
  chat.value = "";

  console.log("Sending msg to server");
  conn.send(
    JSON.stringify({
      command: "msg",
      room: "public",
      content: msg,
    })
  );
}

chatMsg.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    sendMsg();
  }
});

conn.addEventListener("message", function (event) {
  var data = JSON.parse(event.data);
  if (data["command"] == "auth" && data["status"] == 1) {
    console.log("Successfully connected as " + data["self"]);
    username = data["self"];
    document.getElementById("buttonSend").disabled = false;
    chatMsg.disabled = false;
    chatMsg.placeholder = "Your message";
  } else if (data["command"] == "msg") {
    var content = data["content"];
    var from = data["from"];
    var from_other = data["from_other"];
    var from_myself = data['from_myself'];
    //console.log("New message from " + from + " : " + msg);

    var publicChatContainer = document.getElementById("public-chat-container");
    var myNewMessage = document.createElement("div");

    if (from == username) {
      myNewMessage.innerHTML += `<div class="speech-bubble speech-user">
    if(from == username){
      myNewMessage.innerHTML +=  
      `<div class="speech-bubble speech-user">
          <div class="d-flex flex-row">
              <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
              <div class="d-flex flex-column">
                  <p class="chat-nickname">${from}</p>
                  <p class="chat-date">11:22</p>
              </div>
          </div>
          <p class="chat-text">${content}</p>
      </div>`;
    } else {
      myNewMessage.innerHTML += `<div class="speech-bubble speech-other">
      myNewMessage.innerHTML +=
      `<div class="speech-bubble speech-other">
        <div class="d-flex flex-row">
            <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
            <div class="d-flex flex-column">
                <p class="chat-nickname">${from}</p>
                <p class="chat-date">11:22</p>
            </div>
        </div>
        <p class="chat-text">${content}</p>
      </div>`;
    }
    

    publicChatContainer.appendChild(myNewMessage);

    /*
    document.getElementById("public-chat-container").innerHTML +=
          `<div class="speech-bubble speech-other">
                <div class="d-flex flex-row">
                    <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                    <div class="d-flex flex-column">
                        <p class="chat-nickname">${from["from"]}</p>
                        <p class="chat-date">11:22</p>
                    </div>
                </div>
                <p class="chat-text">${msg["content"]}</p>
            </div>

            <div class="speech-bubble speech-user">
                <div class="d-flex flex-row">
                    <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
                    <div class="d-flex flex-column">
                        <p class="chat-nickname">${from["from"]}</p>
                        <p class="chat-date">11:22</p>
                    </div>
                </div>
                <p class="chat-text">${msg["content"]}</p>
            </div>-->`;*/
  }
});

function login() {
  conn.send(
    JSON.stringify({
      command: "connect",
      token: token,
    })
  );

  conn.send(
    JSON.stringify({
      command: "join",
      name: "public",
    })
  );
}
