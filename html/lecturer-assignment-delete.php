<?php 
    include('connectDB.php');
    $asgid = $_GET['assignment_id'];
    $sqldelete = "DELETE FROM assignment where assignment_id = '$asgid'";

    $resultdelete = mysqli_query($conn,$sqldelete);

    if(isset($resultdelete)){
        echo "Assignment success deleted";
         echo '<script>';
        echo 'alert("Successfully deleted!");';
        echo 'location="lecturer-assignment.php";';
        echo '</script>';
    }
    else{
        echo "Assignment failed deleted";
    }
?>