window.getPartyList = function getPartyList(e) {
  let url = document
    .getElementById("gm-partie-v-container")
    .getAttribute("gm-data-url");
  let status = document
    .getElementById("gm-statut-v-row")
    .getAttribute("gm-data-statut");
  const req = new XMLHttpRequest();
  let formData = new FormData();
  console.log(e.value);
  formData.append("filterKey", e.value);
  req.onreadystatechange = function (e) {
    if (req.readyState === 4) {
      let response = JSON.parse(this.response);
      if (response["error"] === false) {
        document.getElementById("listParty").innerHTML = "";
        if (response["msg"] != "") {
          for (let data of response["msg"]) {
            document.getElementById("listParty").innerHTML += `
              <div class="col custom-card-item" style="width: 300px" id="party-list">
                  <div class="card">
                        <img src="../../public/Assets/images/party1.jpg" class="card-img-top"
                              alt="image game">
                        <div class="custom-card-body">
                              <h5 class="card-title fw-bold">${data["game"]}</h5>
                              <p class="card-text fw-bold">Bet: ${data["bet"]} $</p>
                               <p class="card-text fw-bold">Create by: ${data["login"]}</p>
                              <p class="card-text">Plateform : ${data["platform"]}</p>
                              <p class="card-text">Score : ${data["score"]}</p>
                              <p class="card-text"> ROOM ID : ${data["idParty"]}
                              </p>
                               <p class="card-text"> Status : ${status}</p>
                              <a class="btn btn-danger"
                                    href="${url}/roomParty&idParty=${data["idParty"]}">Join</a>
                        </div>
                  </div>

              </div>   
            `;
          }
        } else {
          console.log("ok");
          document.getElementById("listParty").innerHTML = "no party found";
        }
      }
    }
  };
  req.open("POST", "/roomFilter");
  req.send(formData);
};
