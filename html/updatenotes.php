<?php
include('connectDB.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $classcode = $_POST['code'];
    $comment = $_POST['notecomment'];
    $date = date('Y-m-d');
    $id = $_POST['noteid'];
    
    //upload file
     // name of the uploaded file
      $filename = $_FILES['myfile']['name'];

      // destination of the file on the server
      $destination = 'uploads/' . $filename;

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
              $sql = "UPDATE notes SET note_name = '$filename', note_size = '$size', note_comment = '$comment', note_create = '$date' WHERE note_id = '$id'";
              if (mysqli_query($conn, $sql)) {
                  echo "File uploaded successfully";
                  echo '<script>';
                  echo 'alert("Successfully update!");';
                  echo 'location="lecturer-notes.php";';
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