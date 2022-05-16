var myRange = document.querySelector("#myRange");
var myValue = document.querySelector("#myValue");
var myUnits = "€";
var off = myRange.offsetWidth / (parseInt(myRange.max) - parseInt(myRange.min));
var px =
  (myRange.valueAsNumber - parseInt(myRange.min)) * off -
  myValue.offsetParent.offsetWidth / 2;

myValue.parentElement.style.left = px + "px";
myValue.parentElement.style.top = myRange.offsetHeight + "px";
myValue.innerHTML = myRange.value + " " + myUnits;

myRange.oninput = function () {
  let px =
    (myRange.valueAsNumber - parseInt(myRange.min)) * off -
    myValue.offsetWidth / 2;
  myValue.innerHTML = myRange.value + " " + myUnits;
  myValue.parentElement.style.left = px + "px";
};

function getPartyList(e) {
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
          for (data of response["msg"]) {
            document.getElementById("listParty").innerHTML += `
              <div class="col custom-card-item" style="width: 300px" id="party-list">
                  <div class="card">
                        <img src="../../public/Assets/images/party1.jpg" class="card-img-top"
                              alt="image game">
                        <div class="custom-card-body">
                              <h5 class="card-title fw-bold">${data["game"]}</h5>
                              <p class="card-text fw-bold">Bet: 20$</p>
                              <p class="card-text">Plateform : ${data["platform"]}</p>
                              <p class="card-text">Score : ${data["score"]}</p>
                              <p class="card-text"> Number of room : ${data["idParty"]}
                              </p>
                              <p class="card-text">Statut : ${data["statut"]}</p>

                              <a class="btn btn-danger"
                                    href="<?= URL ?>roomParty&idParty=${data["idParty"]}">
                              </a>
                        </div>
                  </div>

              </div>
            `;
          }
        } else {
          console.log("ok");
          document.getElementById("listParty").innerHTML =
            "Aucune partie trouvée";
        }
      }
    }
  };
  req.open("POST", "/roomFilter");
  req.send(formData);
}
