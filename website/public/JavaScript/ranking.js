console.log("ok");
var btns = document.querySelectorAll("button");

for (let btn of btns) {
  if (btn.classList.contains("follow-button-class-event")) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      let ownLogin = this.getAttribute("loginOwnLogin");
      let xhttp = new XMLHttpRequest();
      let formdata = new FormData();
      formdata.append("ownLogin", ownLogin);

      xhttp.onreadystatechange = function (e) {
        if (this.readyState === 4 && this.status === 200) {
          let d = JSON.parse(this.responseText);
          if (d["error"] === false) {
            document.location.replace("/ranking");
          }
        }
      };

      xhttp.open("POST", "/compte/addFollowers");
      xhttp.send(formdata);
    });
  }
}
