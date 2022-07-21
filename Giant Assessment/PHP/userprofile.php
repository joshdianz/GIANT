<?php
    $lhost = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'user'; 

    mysqli_connect($lhost, $user, $password, $db);
    mysql_select_db($db);

    include "login.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>