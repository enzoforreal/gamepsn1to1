var clicks = 0;
var clicks_limit = 20;
var elem1;
var elem2;
var pos1; //i5
var pos2; //i1
var pos3; //i6
var pos4; //i2
var captcha = false;
var lastImage = "";

function verifyCaptcha() {
  if (
    (pos1 === "image1") &
    (pos2 === "image2") &
    (pos3 === "image3") &
    (pos4 === "image4")
  ) {
    captcha = true;
    return true;
  }
  captcha = false;
  return false;
}
function clickImage(id) {
  if (clicks >= clicks_limit) {
    // changer l'image
    changeImage();
    return;
  }

  var temp;
  if (clicks % 2 === 0) elem1 = document.getElementById(id);
  else {
    elem2 = document.getElementById(id);
    temp = elem1.className;
    elem1.className = elem2.className;
    elem2.className = temp;
    //console.log(elem2.id);
    if (elem1.className === "i5") pos1 = elem1.id;
    if (elem1.className === "i1") pos2 = elem1.id;
    if (elem1.className === "i6") pos3 = elem1.id;
    if (elem1.className === "i2") pos4 = elem1.id;
    if (elem2.className === "i5") pos1 = elem2.id;
    if (elem2.className === "i1") pos2 = elem2.id;
    if (elem2.className === "i6") pos3 = elem2.id;
    if (elem2.className === "i2") pos4 = elem2.id;
    if (verifyCaptcha() === true) {
      console.log("bravo");

      document.getElementById("button").disabled = false;
    } else console.log("Try again");
  }
  clicks = clicks + 1;
}

function changeImage() {
  clicks = 0;
  var imageSrc = [
    "../public/Assets/images/manette.png",
    "../public/Assets/images/controller cartoon.png",
  ];
  var newImage = imageSrc[Math.floor(Math.random() * imageSrc.length)];
  lastImage = newImage;

  document.getElementById("image1").style.backgroundImage =
    "url(" + newImage + ")";
  document.getElementById("image2").style.backgroundImage =
    "url(" + newImage + ")";
  document.getElementById("image3").style.backgroundImage =
    "url(" + newImage + ")";
  document.getElementById("image4").style.backgroundImage =
    "url(" + newImage + ")";

  return;
}
