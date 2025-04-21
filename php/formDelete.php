    <?php  

    $id = $_GET['id'];
    $con = mysqli_connect("localhost","root","","form");

    if($con){
        // echo "database connected";
    }else{
        echo "Error to connect database";
    }

    $query = "DELETE FROM `user` WHERE `id`='$id'";
    $result = mysqli_query($con, $query);
    if($result){
        echo "<script> alert('Data Deleted'); </script>";
        echo "<script> location.replace('formView.php'); </script>";
    }else{
        echo "<script> alert('Error to Delete Data'); </script>";

    }

    ?>