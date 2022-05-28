export class chatClient {
  #room;
  #con;
  #logged;
  #url;
  #username;
  #verbose;
  onMessage = (msg, author) => {};
  onConnected = () => {};

  constructor(url, room, token, verbose = false) {
    this.#verbose = verbose;
    this.#logged = false;
    this.#room = room;
    this.#url = url;
    this.#username;
    this.#connect(token);
  }

  #connect(token) {
    if (this.#verbose)
      console.log(`[chatClient] Connecting to url ${this.#url}`);
    this.#con = new WebSocket(this.#url);
    this.#con.onopen = () => {
      this.#login(token);
    };
    this.#con.onmessage = (event) => {
      this.#receive(event);
    };
  }

  getUsername() {
    return this.#username;
  }
  getRoom() {
    return this.#room;
  }
  sendMsg(msg) {
    if (this.#logged) {
      if (this.#verbose) {
        console.log(`[chatClient][DEBUG] Sending chat msg to server : ${msg}`);
        this.#con.send(
          JSON.stringify({
            command: "msg",
            room: this.#room,
            content: msg,
          })
        );
      }
    } else {
      return false;
    }
  }

  joinRoom(name) {
    if (this.#verbose)
      console.log(`[chatClient][DEBUG] Attempting to join room : ${name}`);
    this.#con.send(
      JSON.stringify({
        command: "join",
        name: name,
      })
    );
  }

  #receive(event) {
    if (this.#verbose)
      console.log(
        `[chatClient][DEBUG] Data received from server : ${event.data}`
      );
    try {
      let data = JSON.parse(event.data);
      switch (data["command"]) {
        case "auth":
          if (data["status"] === 1) {
            console.log(`[chatClient] Connected to the server`);
            this.onConnected();
            this.#logged = true;
            this.#username = data["self"];
            if (this.#room != null) this.joinRoom(this.#room);
          }
          break;
        case "msg":
          let msg = data["content"];
          let author = data["from"];
          if (this.#verbose)
            console.log(
              `[chatClient][DEBUG] msg received from server from ${author} : ${msg}`
            );
          this.onMessage(msg, author);
          break;
        default:
          console.warn(
            "[chatClient] Unknown instruction received from the server"
          );
          break;
      }
    } catch (e) {
      console.error("[chatClient] Could not parse the data :", e);
    }
  }

  #login(token) {
    if (this.#con.readyState != 1) {
      console.error(
        "[chatClient] Cannot login because the connection is closed"
      );
      return;
    }
    if (this.#verbose) console.log("[chatClient] Sending connection request");
    this.#con.send(
      JSON.stringify({
        command: "connect",
        token: token,
      })
    );
  }
}
