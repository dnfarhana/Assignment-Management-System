<!DOCTYPE html>
<html lang="en">
<?php
    include('connectDB.php');
   include('session.php');
   if(!isset($_SESSION['login_user'])){
    header('location:login.php');
    
    
    
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>
<body>
    
    
    <section id="welcome_admin">
        <h4>Welcome admin <?php echo $login_session; echo $row['admin_name'];?> !</h4>
    </section>
    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $sqladmin = "SELECT * from admin where admin_id = $user_id";
                                            $resultadmin = mysqli_query($conn,$sqladmin);
                                            $row = mysqli_fetch_array($resultadmin,MYSQLI_ASSOC);
                                            $data = array($row['admin_id'], $row['admin_name'], $row['admin_email'], $row['admin_phone']);
                                            foreach($data as $value)  
                                            {    
                                                 echo "<td> ". $value."</td>";    
                                      
                                            } 
                                            mysqli_close($conn);
                                        ?>
                                    </table>
                                </div>

</body>
</html>
