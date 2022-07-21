<?php
    $lhost = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'user'; 

//     $conn = mysqli_connect($lhost, $user, $password, $db);

//      check connection

//     if ($conn->connect_error){
//        die ("Connection failed: " .$conn->connect_error);
// }
//     echo '<script> alert ("Connected successfully") </script>';
//     mysqli_close($conn);

mysqli_connect($lhost, $user, $password, $db);
mysql_select_db($db);

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from loginform where email='".$email."'AND pass='".$password."' limit 1";

    $result = mysql_query($sql);

    if(mysql_num_rows($result)==1){
        echo "Login successful!";
        exit();
    }
    else{
        echo "Login unsuccessful. Please verify your email or password.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/Style/login.css">
</head>
<body>
<div class="login">
  <div class="form">
    <form class="login-form" method="POST" action="#">
      <span class="material-icons">lock</span>
      <input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="email"/>
      <input type="password" name="password" required placeholder="password"/>
      <button>login</button>
      <p>
         Don't have an account? <a href="#">Sign up here!</a>
      </p>
    </form>  
  </div>
</div>
</body>
</html>