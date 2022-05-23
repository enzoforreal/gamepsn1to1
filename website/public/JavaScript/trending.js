var token = "";
var conn = new WebSocket("ws://localhost:9000");

window.onload = function () {
  console.log("Requesting user token");
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
      // XMLHttpRequest.DONE == 4
      if (xmlhttp.status == 200) {
        console.log("Token " + xmlhttp.responseText);
        token = xmlhttp.responseText;
        connect();
        login();
      } else if (xmlhttp.status == 400) {
        alert("There was an error 400");
      } else {
        alert("something else other than 200 was returned");
      }
    }
  };

  xmlhttp.open("GET", "/compte/token", true);
  xmlhttp.send();
};

function connect() {
  conn.onopen = function (e) {
    console.log("Websocket connection established");
  };
}

function login() {
  conn.send(
    JSON.stringify({
      command: "connect",
      token: token,
    })
  );
}
