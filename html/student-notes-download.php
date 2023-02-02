<?php

if (isset($_GET['note_id'])) {
    $id = $_GET['note_id'];

    $sqlnote = "SELECT * FROM notes where note_id='$id'";

    $resultnote = mysqli_query($conn,$sqlnote );
    $row = mysqli_fetch_array($resultnote,MYSQLI_ASSOC);


    $note_id = $row['note_id'];
    $note_name = $row['note_name'];
    $comment = $row['note_comment'];
    $created_date = $row['note_create'];
    $code = $row['class_code'];

    // fetch file to download from database
    $sql = "SELECT * FROM notes WHERE note_id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['note_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['note_name']));
        readfile('uploads/' . $file['note_name']);

        // Now update downloads count
      
        exit;
    }

}
?>