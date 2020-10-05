<?php
include("header.php");

require('db.php');
session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	if (mysqli_num_rows($result)==1) {
		$logged_in_user = mysqli_fetch_assoc($result);
        if ($logged_in_user['type'] == 'user') {
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['success']  = "You are now logged in";
            echo "<script>
                alert('login Successful')
                </script>";
            header('location:dashboard.php');      
        }elseif($logged_in_user['type'] == 'admin'){
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['success']  = "You are now logged in";
            echo "<script>
                alert('login Successful')
                </script>";
            header('location:admin/dashboard.php');
        }
	}elseif(mysqli_num_rows($result)==0){
        	 echo "<div class='form'>
			<h3>Username/password is incorrect.</h3>
			<br/>Click here to <a href='login.php'>Login</a></div>";
    }}else{
?>
	<form class="login" action="" method="post" name="login">
    <h1 class="login-title">Login</h1>
    <input type="text" class="login-input" name="username" placeholder="Username" autofocus>
    <input type="password" class="login-input" name="password" placeholder="Password">
    <input type="submit" value="Login" name="submit" class="login-button">
  <p class="login-lost">New Here? <a href="registration.php">Register</a></p>
  <br>
	<a href="forgot_password.php">Forgot Password</a>
  </form>

<?php } ?>
</body>
</html>