<?php

include "partials/connection.php";

// $lockerDetQur = "SELECT * FROM `locker_type`";
// $lockerDetRes = mysqli_query($con, $lockerDetQur);
// $lockerData = mysqli_fetch_assoc($lockerDetRes);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-step Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <link href="css/sidebars.css" rel="stylesheet">
    <link rel="stylesheet" href="css/adminDashboard.css">
    <link rel="stylesheet" href="css/customerAdd.css">
</head>
<header>
    <?php require "partials/_nheader.php" ?>
</header>

<body>

    <div class="form-container container">
        <form id="multiStepForm" method="POST" action="php/register.php">
            <!-- Step 1 -->
            <h3 class="text-center mb-3">Register here</h3>
            <div id="step1" class="step active">
                <h6 class="text-center mb-4">Step 1 of 4</h6>
                <div class="row mb-3">
                    <div class="col">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Name Surname" required>
                    </div>
                    <div class="col">
                        <label for="emailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Enter Email Address" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="col">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            required>
                    </div>
                </div>
                <div class="row px-2 justify-content-end">
                    <div class="col-2">
                        <button type="button" class="btn btn-dark" id="nextstep2" onclick="nextStep()">Next</button>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div id="step2" class="step">
                <h6 class="text-center mb-4">Step 2 of 4</h6>
                <div class="mb-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input pattern="[0-9]{10}" class="form-control" id="contactNumber" name="contactNumber" maxlength="10" required>
                </div>
                <div class="row mb-3 ">
                    <div class="col">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>
                <div class="row  justify-content-between">
                    <div class="col-2">
                        <button type="button" class="btn btn-secondary" id="previous1" onclick="prevStep()">Previous</button>
                    </div>
                    <div class="col-2 px-2">
                        <button type="button" class="btn btn-dark" id="nextstep3" onclick="nextStep()">Next</button>
                    </div>
                </div>

            </div>

            <!-- Step 3 -->
            <div id="step3" class="step">
                <h6 class="text-center mb-4">Step 3 of 4</h6>
                <div class="row  mb-3">

                    <div class="col">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="col">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                    </div>
                    <div class="col">
                        <label for="pincode" class="form-label">Pincode</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" required>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-3">
                        <button type="button" class="btn btn-secondary" id="previous2" onclick="prevStep()">Previous</button>
                    </div>
                    <div class="col-3 px-4">
                        <button type="button" class="btn btn-dark" id="nextstep4" onclick="nextStep()">Next</button>
                    </div>
                </div>
            </div>
            <!-- Step 4 -->
            <div id="step4" class="step ">
                <h6 class="text-center mb-4">Step 4 of 4</h6>
                <div class="row my-3">
                    <div class="col-md-12">
                        <label class="form-label">Select Locker Size</label>
                        <select class="form-select form-select mb-3" id="lockersize" name="lockersize" aria-label="Default select example" required>
                            <option selected>Select Locker Size</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Select Loker Type</label>
                        <select class="form-select form-select mb-3" id="lockertype" name="lockertype" aria-label="Default select example" required>
                            <option selected>Select Locker Type</option>

                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Locker Dimensions</label>
                        <input type="text" id="sizex" class="form-control" name="sizex" placeholder="Locker Size">
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-3">
                        <button type="button" class="btn btn-secondary" id="previous3" onclick="prevStep()">Previous</button>
                    </div>
                    <div class="col-3 px-4">
                        <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/register.js"></script>
</body>
<script>
    $(document).ready(function() {
        $("#customers-collapse").addClass('show');
        $("#customeradd").addClass('btn-active');

        $("#emailAddress").on('focusout', function emailAddress() {
            var email = $("#emailAddress").val();
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.(example@gmail.com)");
                $("#emailAddress").addClass('redclass');
            } else {
                $("#emailAddress").removeClass('redclass');

            }
        });

        $("#password").on('focusout', function password() {
            var password = $("#password").val();
            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!passwordPattern.test(password)) {
                // alert("Password must be at least 8 characters long, contain an uppercase letter, a lowercase letter, a digit, and a special character.");
                $("#password").addClass('redclass');


            } else {
                $("#password").removeClass('redclass');
                console.log(!passwordPattern.test(password));
                console.log(password);
            }
        });

        $("#confirmPassword").on('focusout', function confirmPassword() {
            var password = $("#password").val();
            var confirmPassword = $("#confirmPassword").val();

            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            if (!passwordPattern.test(confirmPassword)) {
                alert("Confirm Password must be at least 8 characters long, contain an uppercase letter, a lowercase letter, a digit, and a special character.");
                $("#confirmPassword").addClass('redclass');
            } else {
                $("#confirmPassword").removeClass('redclass');

            }

            if (password !== confirmPassword) {
                alert("Passwords do not match");
                $("#confirmPassword").addClass('redclass');

            } else {
                $("#confirmPassword").removeClass('redclass');

            }
        });
        $("#contactNumber").on('input', function() {
            var contactNumber = $(this).val();
            contactNumber = contactNumber.replace(/\D/g, '').substring(0, 10);
            $(this).val(contactNumber);

            if (contactNumber.length !== 10) {
                $("#contactNumber").addClass('redclass'); 
            } else {
                $("#contactNumber").removeClass('redclass');
            }
        });
        $("#contactNumber").on('focusout', function contactNumber() {
            var contactNumber = $("#contactNumber").val();

            if (!/^\d{10}$/.test(contactNumber)) {
                alert("Please enter a valid 10-digit contact number");
                $("#contactNumber").addClass('redclass');
            } else {
                $("#contactNumber").removeClass('redclass');

            }
        });

        $('#gender').on('focusout', function gender() {
            var gender = document.getElementById("gender").value;
            if (gender == "") {
                alert("Please select a gender");
                $("#gender").addClass('redclass');
            } else {
                $("#gender").removeClass('redclass');

            }
        });

        $('#dob').on('focusout', function dob() {
            var dob = document.getElementById("dob").value;
            if (dob == "") {
                alert("Please select a date of birth");
                $("#dob").addClass('redclass');
            } else {
                $("#dob").removeClass('redclass');

            }
        });
        $("#pincode").on('focusout', function pincode() {
            var contactNumber = $("#pincode").val();
            if (!/^\d{6}$/.test(contactNumber)) {
                alert("Please enter a valid 6-digit Pincode number");
                $("#pincode").addClass('redclass');
            } else {
                $("#pincode").removeClass('redclass');

            }
        });

        // $('#customerAdd').on('submit', function() {
        //     emailAddress();
        //     password();
        //     confirmPassword();
        //     contactNumber();
        //     gender();
        //     dob();
        // })

    });
</script>
<script>
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
    nextstep2.addEventListener("click", function() {
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
    previous1.addEventListener("click", function() {
        step1.classList.add("active");
        step2.classList.remove("active");
    });

    let nextstep3 = document.querySelector("#nextstep3  ");
    nextstep3.addEventListener("click", function() {
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
    previous2.addEventListener("click", function() {
        step2.classList.add("active");
        step1.classList.remove("active");
        step3.classList.remove("active");
    });

    let nextstep4 = document.querySelector("#nextstep4");
    nextstep4.addEventListener("click", function() {
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

    previous3.addEventListener("click", function() {
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

    selectop.addEventListener("click", function() {
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

    showop.addEventListener("click", function() {
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
</script>

</html>