<!DOCTYPE html>
<html lang="en">
<?php
    include('connectDB.php');
    include('session.php');
    if(!isset($_SESSION['login_user'])){
    header('location:login.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $adminName = $_POST['adminName'];
    $adminPhone = $_POST['adminPhone'];
    $adminEmail = $_POST['adminEmail'];
    $password = $_POST['adminPass'];

    $sqlupdate = "UPDATE admin set admin_name='$adminName', admin_phone='$adminPhone', admin_email='$adminEmail' where admin_id = '$user_id'";

    $resultupdate = mysqli_query($conn,$sqlupdate);

    if(isset($resultupdate)){
        echo "User success updated";
    }
    else{
        echo "User failed updated";
    }
 }


$sql = "select admin_name, admin_phone, admin_email, password from admin where admin_id = $user_id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$msg = "";




mysqli_close($conn);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
     
    <section id="sidebar">
        <ul>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="student.php">Student</a></li>
            <li><a href="lecturer.php">Lecturer</a></li>
        </ul>
    </section>
    <form id="myform" method="POST" action="admin_edit.php">
        <h3>Update Admin</h3>
        <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="adminName" id="adminName" value="<?php echo $row['admin_name'];?>"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="adminEmail" id="adminEmail" value="<?php echo $row['admin_email'];?>"></td>
            </tr>
            <tr>
                <td>Phone: </td>
                <td><input type="text" name="adminPhone" id="adminPhone" value="<?php echo $row['admin_phone'];?>" value="<?php echo $row['admin_phone'];?>"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="adminPass" id="adminPass" value="<?php echo $row['password'];?>"></td>
            </tr>
           
            <tr>
                <td><input type="submit" name="submit" id="submit"></td>
            </tr>
                
            
        </table>
    </form>
    
</body>
</html>
