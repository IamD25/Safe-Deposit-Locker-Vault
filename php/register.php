<?php

include "../partials/connection.php";

if(isset($_POST['submit'])){
    $name = $_POST['fullName'];
    $email = $_POST['emailAddress'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $hashPass = password_hash($password, PASSWORD_DEFAULT);  

    $username = strtok($name, " "); 

    $contact = $_POST['contactNumber'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    $locker_size = $_POST['lockersize'];
    $locker_type = $_POST['lockertype'];
    $locker_sizex = $_POST['sizex'];

    $role = "user";
    // $role = "admin";
    $status = "Pending";

    // $insQur = "INSERT INTO `users`(`username`, `fullname`, `email`, `password`, `contact`, `gender`, `dob`, `address`, `city`, `state`, `pincode`, `role`,`request_id`) VALUES ('$username','$name', '$email', '$hashPass', '$contact', '$gender', '$dob', '$address', '$city', '$state', '$pincode', '$role','$ab')";
    // $insRes = mysqli_query($con, $insQur);

    $insQur = "INSERT INTO `requests`(`username`, `fullname`, `email`, `password`, `contact`, `gender`, `dob`, `address`, `city`, `state`, `pincode`,`role`, `locker_size`, `locker_type`, `locker_sizex`,`status`) VALUES ('$username','$name', '$email', '$hashPass', '$contact', '$gender', '$dob', '$address', '$city', '$state', '$pincode', '$role','$locker_size','$locker_type','$locker_sizex','$status')";
    $insRes = mysqli_query($con, $insQur);
    if($insRes){
        echo '<script>alert("Registration successfull.");</script>';
        echo '<script>alert("Please Note:- You need to submit your document copy at our office.");</script>';
        echo "<script>location.replace('../login.php')</script>";
        // header("location: ../login.php");
    }else{
        echo "Registration Failed".mysqli_connect_error();
        die();
    }

}
?>