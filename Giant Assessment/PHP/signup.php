<?php
 $lhost = 'localhost';
 $user = 'root';
 $password = '';
 $db = 'user'; 

 mysqli_connect($lhost, $user, $password, $db);
 mysql_select_db($db);

 if(isset($_POST['password-reset-token']) && $_POST['email'])
 {
 include "db.php";
 $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
 $row= mysqli_num_rows($result);
 if($row < 1)
 {
 $token = md5($_POST['email']).rand(10,9999);
 mysqli_query($conn, "INSERT INTO users(name, email, email_verification_link ,password) VALUES('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $token . "', '" . md5($_POST['password']) . "')");
 $link = "<a href='localhost/email-verification/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";
 require_once('phpmail/PHPMailerAutoload.php');
 $mail = new PHPMailer();
 $mail->CharSet =  "utf-8";
 $mail->IsSMTP();
 // enable SMTP authentication
 $mail->SMTPAuth = true;                  
 $mail->Username = "your_email_id@gmail.com";
 $mail->Password = "your_gmail_password";
 $mail->SMTPSecure = "ssl";  
 $mail->Host = "smtp.gmail.com";
 $mail->Port = "465";
 $mail->From='your_gmail_id@gmail.com';
 $mail->FromName='your_name';
 $mail->AddAddress('reciever_email_id', 'reciever_name');
 $mail->Subject  =  'Reset Password';
 $mail->IsHTML(true);
 $mail->Body    = 'Click On This Link to Verify Email '.$link.'';
 if($mail->Send())
 {
 echo "An email with a verification link has been sent to your email. Click on the verification link to continue";
 }
 else
 {
 echo "Mail Error - >".$mail->ErrorInfo;
 }
 }
 else
 {
 echo "You are a registered user!";
 }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/Style/signup.css">
</head>
<body>
<div class="signup">
  <div class="form">
    <form class="signup-form" method="POST" action="signup.php">
      <span class="material-icons">lock</span>
      <input type="text" name="fname" required placeholder="First name"/>
      <input type="text" name="lname" required placeholder="Last name"/>
      <input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="email"/>
      <input type="password" name="password" required placeholder="password"/>
      <button>Sign up</button>
      <p>
         Already have an account? <a href="#">Log in here!</a>
      </p>
    </form>  
  </div>
</div>
</body>
</html>