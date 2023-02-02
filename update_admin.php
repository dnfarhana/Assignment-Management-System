<!DOCTYPE html>
<?php
   include('connectDB.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $adminName = $_POST['adminName'];
    $adminPhone = $_POST['adminPhone'];
    $adminEmail = $_POST['adminEmail'];
    $password = $_POST['adminPass'];

    $sqlupdate = "update admin set admin_name='$adminName', admin_phone='$adminPhone', 'admin_email' = '$adminEmail', password = '$password' where admin_id = '$user_id'";

    $resultupdate = mysqli_query($conn,$sqlupdate);
 }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    welcome
</body>
</html>