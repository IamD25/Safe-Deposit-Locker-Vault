let selectop = document.getElementById("lockersize");
let showop = document.getElementById("lockertype");
let showx = document.getElementById("sizex");

selectop.addEventListener("click", function () {
  // Clear previous options
  showop.innerHTML = "";

  let options = [];

  if (selectop.value == "Small") {
    options = ["A", "B", "C"];
  } else if (selectop.value == "Medium") {
    options = ["G", "G1", "F"];
  } else if (selectop.value == "Large") {
    options = ["H", "L", "FR"];
  }

  options.forEach((optionValue) => {
    let option = document.createElement("option");
    option.innerText = optionValue;
    option.value = optionValue;
    showop.appendChild(option);
  });
});

showop.addEventListener("click", function () {
  let selectedOption = showop.value;
  if (selectedOption == "A") {
    showx.value = "05x07x21";
  } else if (selectedOption == "B") {
    showx.value = "06x08x21";
  } else if (selectedOption == "C") {
    showx.value = "05x14x21";
  } else if (selectedOption == "G") {
    showx.value = "06x17x21";
  } else if (selectedOption == "G1") {
    showx.value = "08x21x21";
  } else if (selectedOption == "F") {
    showx.value = "11x14x21";
  } else if (selectedOption == "H") {
    showx.value = "13x17x21";
  } else if (selectedOption == "L") {
    showx.value = "16x21x21";
  } else if (selectedOption == "FR") {
    showx.value = "20x18x21";
  } else {
    showx.value = "Select Valid Size";
  }
});

