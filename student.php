<!DOCTYPE html>
<html lang="en">
<?php
   include('session_student.php');
   if(!isset($_SESSION['login_student'])){
    header('location:student_login.php');
    
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Student</title>
</head>
<body>
    
    <section id="sidebar">
        <ul>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="student.php">Student</a></li>
            <li><a href="lecturer.php">Lecturer</a></li>
        </ul>
    </section>
    <section id="welcome_admin">
        <h4>Welcome <?php echo $login_session; ?> !</h4>
    </section>

</body>
</html>
