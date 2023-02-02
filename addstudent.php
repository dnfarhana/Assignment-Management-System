<!DOCTYPE html>
<html lang="en">
<?php
    include('connectDB.php'); 

    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    
        $sql = "INSERT INTO students (student_id, student_name, student_email, student_phone, password) VALUES (NULL, '$name', '$email', '$phone', '$pass')";
    
        $result = mysqli_query($conn,$sql);
    
        if(isset($result)){
            echo "Success";
        }
        else{
            echo "failed";
        }
     }
    
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="addstudent.php">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <label>Name: </label>
                    <input type="text" class="form-control" name="name" id="name">
                    <label>Email: </label>
                    <input type="text" class="form-control" name="email" id="email">
                    <label>Phone: </label>
                    <input type="text" class="form-control" name="phone" id="phone">
                    <label>Password: </label>
                    <input type="text" class="form-control" name="pass" id="pass">
                    <button type="submit" class="btn btn-success">Submit</button>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>