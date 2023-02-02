<?php
include('connectDB.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $asgname = $_POST['name'];
    $asginstruction = $_POST['instruction'];
    $asgcreate = date('Y-m-d');
    $asgdue = $_POST['due'];
    $asgid = $_POST['assignmentid'];
    
    //upload file
     // name of the uploaded file
      $filename = $_FILES['myfile']['name'];

      // destination of the file on the server
      $destination = 'uploads/' . $filename;
      $directory = 'uploads/';

      // get the file extension
      $extension = pathinfo($filename, PATHINFO_EXTENSION);

      // the physical file on a temporary uploads directory on the server
      $file = $_FILES['myfile']['tmp_name'];
      $size = $_FILES['myfile']['size'];

      if (!in_array($extension, ['zip', 'pdf', 'docx','pptx','jpeg','jpg','png'])) {
          echo "You file extension must be .zip, .pdf, .docx, .pptx, .jpeg, or .png";
      } elseif ($_FILES['myfile']['size'] > 5000000) { // file shouldn't be larger than 1Megabyte
          echo "File too large!";
      } else {
          
          // move the uploaded (temporary) file to the specified destination
          if (move_uploaded_file($file, $destination)) {
              $sql = "UPDATE assignment SET assignment_name = '$filename', instruction = '$asginstruction', created_date = '$asgcreate', due_date = '$asgdue',size = '$size' WHERE assignment_id = '$asgid'";
              if (mysqli_query($conn, $sql)) {
                  echo "File uploaded successfully";
                  echo '<script>';
<<<<<<< Updated upstream
                  echo 'alert("Successfully Updated!");';
=======
<<<<<<< HEAD
                  echo 'alert("Successfully update!");';
=======
                  echo 'alert("Successfully Updated!");';
>>>>>>> 2ee9511f9f9882f310d2da9c4867ca74af4fab54
>>>>>>> Stashed changes
                  echo 'location="lecturer-assignment.php";';
                  echo '</script>';
              }else{
                  die(mysqli_error($conn));
              }
          } else {
              echo "Failed to upload file.";
          }
      }
}
?>