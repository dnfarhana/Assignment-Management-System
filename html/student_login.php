<!doctype html>
<?php
   include('connectDB.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT student_id FROM students WHERE student_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
        $error = false;
         $_SESSION['studentid'] = $row['student_id'] ; 
         $_SESSION['login_student'] = $myusername;
         $_SESSION['student_pass'] = $mypassword;
         $error = "";
         echo '<script>';
        echo 'alert("Successfully login!");';
        echo 'location="student-home.php";';
        echo '</script>';
      }else {
         $error = true;
      }
   }
?>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/ams.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Assignment Management System</title>
</head>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #07f547;
    height: 100vh;
}
    #login .container #login-row #login-column #login-box {
    margin-top: 50px;
    max-width: 600px;
    height: 500px;
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
    padding: 10px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -65px;
}
</style>
<body>
    <div id="login">
        <div class="container">
        
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <div class="row pt-3">
                                <div class="col">
                                    <img class="mx-auto d-block" src="../assets/images/ams.png" width="120px" height="100px"> 
                                </div>
                            </div>
                    <h4 class="text-center text-success">Assignment Management System</h4>
                    <hr>
                        <form name="myform" method="POST" onsubmit="return selectForm();" id="login-form" class="form" action="" method="post">
                            
                            <div class="form-group text-center">
                                <label for="role" class="text-dark">Login as</label><br>
                                <input type="submit" class="btn btn-success" id="admin-btn" value="Admin" onclick="document.pressed=this.value">
                                <input type="submit" class="btn btn-success" id="lecturer-btn" value="Lecturer" onclick="document.pressed=this.value">
                                <input type="submit" class="btn btn-success" id="student-btn" value="Student" onclick="document.pressed=this.value">
                            </div>
                            <div class="form-group">
                                <label>Student Name  : </label>
                                <input type ="text" name ="username" class ="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" name ="password" class="text-dark">Password:</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="float-right">
                                <input type="submit" name="submit" class="btn btn-success btn-md" value="Login">
                                </div>
                            </div>
                            <?php  
                                if($error=true){
                                    echo "Your name or password are wrong!";
                                }
                                else{
                                    echo "";
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Functional Javascript-->
<script>
    function selectForm(){
        if(document.pressed == 'Admin')
        {
        document.myform.action ="index.php";
        }
        else if(document.pressed == 'Lecturer')
        {
            document.myform.action ="lect_login.php";
        }
        else if(document.pressed == 'Student')
        {
            document.myform.action ="student_login.php";
        }
        return true;
    }
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>