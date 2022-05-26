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
    var msg = data["content"];
    var from = data["from"];
    console.log("New message from " + from + " : " + msg);
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
