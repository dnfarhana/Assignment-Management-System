<?php 
    include('connectDB.php');
    include('session.php');
    $classId = $_GET['id'];
    $sqldelete = "DELETE FROM class where class_id = '$classId'";

    $resultdelete = mysqli_query($conn,$sqldelete);

    if(isset($resultdelete)){
        echo "User success deleted";
        echo '<script>';
        echo 'alert("Successfully deleted!");';
        echo 'location="admin-class.php";';
        echo '</script>';
    }
    else{
        echo "User failed deleted";
        echo '<script>';
        echo 'alert("Fail to delete!");';
        echo 'location="admin-class-delete.php";';
        echo '</script>';
    }
?>