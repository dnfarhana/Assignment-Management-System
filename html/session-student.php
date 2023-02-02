<?php
   include('connectDB.php');
   session_start();

   $user_id = $_SESSION['studentid'];
   
   $user_check = $_SESSION['login_student'];
   $user_pass = $_SESSION['student_pass'];
   
   $ses_sql = mysqli_query($conn,"select student_name from students where student_name = '$user_check' and student_id = $user_id");

   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['student_name'];
   
   if(!isset($_SESSION['login_student'])){
      header("location: student_login.php");
      die();
   }
?>