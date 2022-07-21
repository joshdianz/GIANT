<?php
   $lhost = 'localhost';
   $user = 'root';
   $password = '';
   $db = 'user'; 
   
   mysqli_connect($lhost, $user, $password, $db);
   mysql_select_db($db);
   

   $query = 'SELECT name FROM user WHERE email="'.$email.'"';
   $result = $query;
    echo "<p> Requested user is . $result . </p>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search user using email</title>
</head>
<body>
    
</body>
</html>