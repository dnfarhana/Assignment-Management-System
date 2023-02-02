<?php
// connect to the database

$sql = "SELECT * FROM assignment where lect_id=$user_id";
$result = mysqli_query($conn, $sql);


$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    $name = $_POST['assignment-name'];
    $instruction = $_POST['assignment-instruction'];
    $status = $_POST['assignment-status'];
    $created = $_POST['assignment-created'];
    $deadline = $_POST['assignment-deadline'];
    $code = $_POST['assignment-class'];
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx','pptx', 'py'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 10000000000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO assignment (assignment_name, status,instruction,created_date,due_date,size,class_code,lect_id) VALUES ('$filename', '$status','$instruction','$created','$deadline',$size,'$code',$user_id)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
                echo '<script>';
                echo 'alert("Successfully uploaded!");';
                echo '</script>';
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}



if (isset($_GET['assignment_id'])) {
    $id = $_GET['assignment_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM assignment WHERE assignment_id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['assignment_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['assignment_name']));
        readfile('uploads/' . $file['assignment_name']);

        // Now update downloads count
      
        exit;
    }

}
?>