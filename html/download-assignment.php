<?php




if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    $sqlassignment = "SELECT * FROM assignment where assignment_id='$id'";

    $resultassignment = mysqli_query($conn,$sqlassignment );
    $row = mysqli_fetch_array($resultassignment,MYSQLI_ASSOC);


    $assignment_id = $row['assignment_id'];
    $assignment_name = $row['assignment_name'];
    $instruction = $row['instruction'];
    $status = $row['status'];
    $created_date = $row['created_date'];
    $due_date = $row['due_date'];

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