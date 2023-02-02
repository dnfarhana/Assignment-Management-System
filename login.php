<!DOCTYPE html>
<?php
   include('connectDB.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT admin_id FROM admin WHERE admin_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         $_SESSION['userid'] = intval($result) ; 
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login_pass'] = $mypassword;
         $error = "";
         header("location: admin.php");
      }else {
         $error = "fail";
      }
   }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student login</title>
</head>
<body>
    <form name="myform" method="POST" onsubmit="return selectForm();">
        <h1 style="font-weight:normal">MyClass</h1>
        <input type="submit" id="admin-btn" value="Admin" onclick="document.pressed=this.value">
        <input type="submit" id="lecturer-btn" value="Lecturer" onclick="document.pressed=this.value">
        <input type="submit" id="student-btn" value="Student" onclick="document.pressed=this.value"><br>
        <label>Admin Name  : </label><input type = "text" name = "username" class = "box"/><br /><br />
        <label>Password  : </label><input type = "password" name = "password" class = "box" /><br/><br />
        <input type="submit" name="submit" id="submit">
        <div style = "font-size:11px; color:#cc0000; margin-top:10px">
        <?php  
            if(isset($error)){
                echo "Your name or password are wrong!";
            }
            else{
                echo "";
            }
        ?></div>
    </form>
</body>
</html>
<script>
    function selectForm(){
        if(document.pressed == 'Admin')
        {
        document.myform.action ="login.php";
        }
        else if(document.pressed == 'Lecturer')
        {
            document.myform.action ="lect.html";
        }
        else if(document.pressed == 'Student')
        {
            document.myform.action ="student_login.php";
        }
        return true;
    }
</script>
