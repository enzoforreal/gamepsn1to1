var token = "";
var conn = new WebSocket("wss://gamepsn1to1.com:9000");

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
  var chat = document.getElementById("chatMsg");
  var msg = chat.value;
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

conn.addEventListener("message", function (event) {
  var data = JSON.parse(event.data);
  if (data["command"] == "auth" && data["status"] == 1) {
    console.log("Successfully connected");
  } else if (data["command"] == "msg") {
    var msg_other = data["content_other"];
    var msg_myself = data['content_myself'];
    var from_other = data["from_other"];
    var from_myself = data['from_myself'];
    //console.log("New message from " + from + " : " + msg);

    var publicChatContainer = document.getElementById("public-chat-container");
    var myNewMessage = document.createElement("div");

    if(from_myself){
      myNewMessage.innerHTML +=  
      `<div class="speech-bubble speech-user">
          <div class="d-flex flex-row">
              <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
              <div class="d-flex flex-column">
                  <p class="chat-nickname">${from_myself}</p>
                  <p class="chat-date">11:22</p>
              </div>
          </div>
          <p class="chat-text">${msg_myself}</p>
      </div>`;
    }
    else{
      myNewMessage.innerHTML +=
      `<div class="speech-bubble speech-other">
        <div class="d-flex flex-row">
            <img class="chat-avatar" src="https://picsum.photos/800" alt="Avatar joueur 1">
            <div class="d-flex flex-column">
                <p class="chat-nickname">${from_other}</p>
                <p class="chat-date">11:22</p>
            </div>
        </div>
        <p class="chat-text">${msg_other}</p>
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
