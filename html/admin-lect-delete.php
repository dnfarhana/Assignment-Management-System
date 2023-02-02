<?php 
    include('connectDB.php');
    include('session-lecturer.php');
    $lectid = $_GET['id'];
    $sqldelete2 = "DELETE FROM notes where lect_id = '$lectid'";
    $sqldelete3 = "DELETE FROM assignment where lect_id = '$lectid'";
    $sqldelete4 = "DELETE FROM class where lect_id = '$lectid'";
    $sqldelete = "DELETE FROM lecturers where lect_id = '$lectid'";
    
    $resultdelete2 = mysqli_query($conn,$sqldelete2);
    $resultdelete3 = mysqli_query($conn,$sqldelete3);
    $resultdelete4 = mysqli_query($conn,$sqldelete4);
    $resultdelete = mysqli_query($conn,$sqldelete);
    

    if(isset($resultdelete)){
        echo "User success deleted";
        echo '<script>';
        echo 'alert("Successfully deleted!");';
        echo 'location="admin-lecturer.php";';
        echo '</script>';
    }
    else{
        echo "User failed deleted";
        echo '<script>';
        echo 'alert("Fail to delete");';
        echo 'location="admin-lecturer.php";';
        echo '</script>';
    }
?>