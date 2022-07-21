<?php
$lhost = 'localhost';
$user = 'root';
$password = '';
$db = 'user'; 

mysqli_connect($lhost, $user, $password, $db);
mysql_select_db($db);

if($_GET['key'] && $_GET['token'])
{
include "db.php";
$email = $_GET['key'];
$token = $_GET['token'];
$query = mysqli_query($conn,
"SELECT * FROM `users` WHERE `email_verification_link`='".$token."' and `email`='".$email."';"
);
$date = date('Y-m-d H:i:s');
if (mysqli_num_rows($query) > 0) {
$roww= mysqli_fetch_array($query);
if($roww['email_verified_at'] == NULL){
mysqli_query($conn,"UPDATE users set email_verified_at ='" . $date . "' WHERE email='" . $email . "'");
$msg = "Congratulations! Your email has been verified.";
}else{
$msg = "You have already verified your account with us";
}
} else {
$msg = "This email is not verified";
}
}
else
{
$msg = "Something seems wrong.";
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verification</title>
    <h1 style="display: flex; justify-content: center;">
       Please wait while we verify your email address.
    </h1>
    <img src="\Images\knop.jpg" alt="clock" style="display: flex; justify-content: center;">
</head>
<body>
    
</body>
</html>