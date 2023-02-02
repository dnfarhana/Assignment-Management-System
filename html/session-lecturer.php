<?php
   include('connectDB.php');
   session_start();

   $user_id = $_SESSION['userid'];
   
   $user_check = $_SESSION['login_user'];
   $user_pass = $_SESSION['login_pass'];
   
   $ses_sql = mysqli_query($conn,"select lect_name from lecturers where lect_name = '$user_check' and lect_id = $user_id");

   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['lect_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:lect_login.php");
      die();
   }
?>