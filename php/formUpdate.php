<?php 
$id = $_GET['id'];

$con = mysqli_connect("localhost","root","","form");

if($con){
    // echo "database connected";
}else{
    echo "Error to connect database";
}

$query = "SELECT * FROM `user` WHERE `id` = '$id'";

$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];
   
    $update = "UPDATE `user` SET `username`='$username',`password`='$pass' WHERE `id`='$id'";
    $update_result = mysqli_query($con, $update);
    if($update_result){
    echo "<script> alert('Data Updated'); </script>";
    echo "<script> location.replace('formView.php'); </script>";
        
    }else{
        echo "Error to update data";
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
                <input type="text" class="form-control" id="username" name="username" value=" <?php echo $data['username']; ?> ">
            </div>
            <div>
                <label for="" class="form-label">Docter Speciality</label>
                <input type="text" class="form-control" name="password" id="" value=" <?php echo $data['password']; ?> ">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div>
        </div>
    </form>
</body>
</html>