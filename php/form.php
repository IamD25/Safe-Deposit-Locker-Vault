<?php 

$con = mysqli_connect("localhost","root","","form");

if($con){
    // echo "database connected";
}else{
    echo "Error to connect database";
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pass = $_POST['pass'];
        // echo "submit clicked";


    $query = "INSERT INTO `user`(`username`, `password`) VALUES ('$username','$pass')";
    $result = mysqli_query($con, $query);
    if($result){
        echo "Data inserted";
    echo "<script> location.replace('formView.php'); </script>";

    }else{
        echo "Error to insert data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <h1>Register</h1>
    <form action="" class="form" method="POST">
        <div class="container">
            <div class="form-group">
                <label for="" class="form-label">Docter Name</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div>
                <label for="" class="form-label">Docter Speciality</label>
                <input type="text" class="form-control" name="pass" id="">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </div>
    </form>
</body>
</html>