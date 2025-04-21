// let currentStep = 1;
// const totalSteps = 4;

// function showStep(step) {
//     const steps = document.querySelectorAll('.step');
//     steps.forEach((element, index) => {
//         element.classList.remove('active');
//         if (index === step - 1) {
//             element.classList.add('active');
//         }
//     });
// }

// function nextStep() {
//     if (currentStep < totalSteps) {
//         currentStep++;
//         showStep(currentStep);
//     }
// }

// function prevStep() {
//     if (currentStep > 1) {
//         currentStep--;
//         showStep(currentStep);
//     }
// }

// document.addEventListener('DOMContentLoaded', () => {
//     showStep(currentStep);
// });
let step1 = document.querySelector("#step1");
let step2 = document.querySelector("#step2");
let step3 = document.querySelector("#step3");
let step4 = document.querySelector("#step4");

let nextstep2 = document.querySelector("#nextstep2");
nextstep2.addEventListener("click", function () {
  var fullName = document.getElementById("fullName").value;
  var emailId = document.getElementById("emailAddress").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;
  // console.log(fullName);
  if (
    fullName != "" &&
    emailAddress != "" &&
    password != "" &&
    confirmPassword != ""
  ) {
    if (password == confirmPassword) {
      step1.classList.remove("active");
      step2.classList.add("active");
    } else {
      alert("Passwords do not match");
    }
  } else {
    alert("Please fill all fields");
  }
});

let previous1 = document.querySelector("#previous1");
previous1.addEventListener("click", function () {
  step1.classList.add("active");
  step2.classList.remove("active");
});

let nextstep3 = document.querySelector("#nextstep3  ");
nextstep3.addEventListener("click", function () {
  var contactNumber = document.getElementById("contactNumber").value;
  var gender = document.getElementById("gender").value;
  var dob = document.getElementById("dob").value;

  if (contactNumber != "" && gender != "" && dob != "") {
    step1.classList.remove("active");
    step2.classList.remove("active");
    step3.classList.add("active");
  } else {
    alert("Please fill all fields");
  }
});

let previous2 = document.querySelector("#previous2");
previous2.addEventListener("click", function () {
  step2.classList.add("active");
  step1.classList.remove("active");
  step3.classList.remove("active");
});

let nextstep4 = document.querySelector("#nextstep4");
nextstep4.addEventListener("click", function () {
  step1.classList.remove("active");
  step3.classList.remove("active");
  step4.classList.add("active");

 
});
// if (lockersize != "" && lockertype != "" && sizex != "") {
  
// } else {
//   alert("Please fill all fields");
// }

// var lockersize = document.getElementById("lockersize").value;
// var lockertype = document.getElementById("lockertype").value;
// var sizex = document.getElementById("sizex").value;

let previous3 = document.querySelector("#previous3");

previous3.addEventListener("click", function () {
  let step1 = document.querySelector("#step1");
  // let step2 = document.querySelector("#step2");
  let step3 = document.querySelector("#step3");
  let step4 = document.querySelector("#step4");
  step3.classList.add("active");
  step1.classList.remove("active");
  // step2.classList.remove("active");
  step3.classList.remove("active");
});

// let selectop = document.getElementById("select");
// let showop = document.getElementById("showop");

// selectop.addEventListener("focusout", function () {
//   if(selectop.value == "Small") {
//     let option1 = document.createElement('option');
//     option1.innerText = "A";
//     let option2 = document.createElement('option');
//     option2.innerText = "B";
//     let option3 = document.createElement('option');
//     option3.innerText = "C";
//     showop.appendChild(option1);
//     showop.appendChild(option2);
//     showop.appendChild(option3);
//   }else if(selectop.value == "Medium") {
//       let option1 = document.createElement('option');
//       option1.innerText = "G";
//       let option2 = document.createElement('option');
//       option2.innerText = "G1";
//       let option3 = document.createElement('option');
//       option3.innerText = "F";
//       showop.appendChild(option1);
//       showop.appendChild(option2);
//       showop.appendChild(option3);
//     }else if(selectop.value == "Large"){

//         let option1 = document.createElement('option');
//         option1.innerText = "H";
//         let option2 = document.createElement('option');
//         option2.innerText = "L";
//         let option3 = document.createElement('option');
//         option3.innerText = "FR";
//         showop.appendChild(option1);
//         showop.appendChild(option2);
//         showop.appendChild(option3);
//   }
// });

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
