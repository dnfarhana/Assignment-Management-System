<?php 
    include('connectDB.php');
    $noteid = $_GET['noteid'];
    $sqldelete = "DELETE FROM notes where note_id = '$noteid'";

    $resultdelete = mysqli_query($conn,$sqldelete);

    if(isset($resultdelete)){
        echo "notes success deleted";
        echo '<script>';
        echo 'alert("Successfully deleted!");';
        echo 'location="lecturer-notes.php";';
        echo '</script>';
    }
    else{
        echo "notes failed deleted";
    }
?>