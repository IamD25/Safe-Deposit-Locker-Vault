<?php

$con = mysqli_connect("localhost","root","","form");

if($con){
    // echo "database connected";
}else{
    echo "Error to connect database";
}

$fetch = "SELECT * FROM `user`";
$result = mysqli_query($con, $fetch);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form View</title>
</head>
<body>
    <div class="container">
        <table border="2">
            <thead>
                <tr>
                    <th name="id">Id</th>
                    <th name="username" >User Name</th>
                    <th name="pass" >Password</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody> <?php while($data = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td> <?php echo $data['id']; ?> </td>
                    <td> <?php echo $data['username']; ?> </td>
                    <td> <?php echo $data['password']; ?> </td>
                    <td><a class="btn" type="button" href="formUpdate.php?id=<?= $data['id']; ?>">Update</a></td>
                    <td><a class="btn" type="button" href="formDelete.php?id=<?= $data['id']; ?>">Delete</a></td>

                </tr>  <?php } ?>
            </tbody>
        </table>
        <a href="form.php">Insert Data</a>
    </div>
</body>
</html>