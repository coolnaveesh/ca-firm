<?php
include("header.php");

require('db.php');
session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
    $query = "SELECT * FROM `users` WHERE username='$username'";
    if ($forgot_password = mysqli_query($con,$query)) { 
        while($rows = mysqli_fetch_assoc($forgot_password)){
            echo base64_decode($rows['password']);
            $to = $rows['email'];
            $password=base64_decode($rows['password']);
            $subject = "Password Rest- Sulab Filling  Consultancy";

            $message = "<b>This is your password. '".$password."'</b>";

            $header = "From:admin@sulabfilling.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $mail = mail ($to,$subject,$message,$header);

            if( $mail == true ) {
            echo "Email sent successfully...Please check your mail for password";
            }else {
            echo "Message could not be sent...";
            }
        }
    }
}else{
?>
	<form class="login" action="" method="post" name="login">
    <h1 class="login-title">Forgot Password</h1>
    <input type="text" class="login-input" name="username" placeholder="Username" autofocus>
    <input type="submit" value="Forgot Password" name="submit" class="login-button">
  <p class="login-lost"><a href="login.php">Login>></a></p>
  </form>

<?php } ?>
</body>
</html>