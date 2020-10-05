<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
    error_reporting(E_ALL & ~E_NOTICE);
    require('db.php');
    if (isset($_REQUEST['username'])){
       
        $error = 0;
        if (isset($_POST['username']) && !empty($_POST['username'])) {
            $username=mysqli_real_escape_string($con,trim($_POST['username']));
        }else{
            $error = 1;
            $empty_username="Username Cannot be empty.";
            echo $empty_username.'<br>';
        }
        

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email=mysqli_real_escape_string($con,trim($_POST['email']));
        }else{
            $error =1;
            $empty_email="Email cannot be empty.";
            echo $empty_email.'<br>';
        }

        


        if (isset($_POST['company']) && !empty($_POST['company'])) {
            $company=mysqli_real_escape_string($con,trim($_POST['company']));
        }else{
            $error = 1;
            $empty_category="company cannot be empty.";
            echo $empty_category.'<br>';
        }

        

        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $password=mysqli_real_escape_string($con,trim($_POST['password']));
        }else{
            $error = 1;
            $empty_password="Password cannot be empty";
            echo $empty_password.'<br>';
        }

        

        if (isset($_POST['cpassword']) && !empty($_POST['cpassword'])) {
            $cpassword=mysqli_real_escape_string($con,trim($_POST['cpassword']));
        }else{
            $error = 1;
            $empty_repassword="Retype password cannot be empty";
            echo $empty_repassword.'<br>';
        }

        

        if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
            $firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
        }else{
            $error = 1;
            $empty_firstname="firstname cannot be empty";
            echo $empty_firstname.'<br>';
        }
        


        if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
            $lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));
        }else{
            $error = 1;
            $lastname="lastname cannot be empty";
            echo $lastname.'<br>';
        }

        

        if (isset($_POST['mobile']) && !empty($_POST['mobile'])) {
            $mobile=mysqli_real_escape_string($con,trim($_POST['mobile']));
        }else{
            $error = 1;
            $mobile="mobile cannot be empty";
            echo $mobile.'<br>';
        }
        $date=mysqli_real_escape_string($con, trim('now()'));
        
        if($password!=$cpassword)
        {
            echo "password not Matched";
        }
        $trn_date = date("Y-m-d H:i:s");
        $type="user";
        if(!$error) {
            $sql="select * from users where (username='$username' or email='$email');";
            $res=mysqli_query($con,$sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($username==$row['username'])
                {
                    echo "Username already exists";
                    die();
                }
                if($email==$row['email'])
                {
                    echo "Email already exists";
                    die();
                } //here you need to add else condition
            }else{
                $query = "INSERT into users (id,username,company,firstname,lastname,mobile, email,password,cpassword, trn_date,type) VALUES (NULL,'$username','$company','$firstname','$lastname','$mobile','$email', '".md5($password)."','".md5($cpassword)."', '$trn_date','$type')";
                $result = mysqli_query($con,$query);
                if($result){
                    echo "<div class='form'>
                        <h3>You are registered successfully.</h3>
                        <br/>Click here to <a href='login.php'>Login</a></div>
                    ";
                }

            }
        }
    }else{
?>
	<form class="login" action="" method="post">
        <h1 class="login-title">User Registration</h1>
		<input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="company" placeholder="Company Name" required />
        <input type="text" class="login-input" name="firstname" placeholder="First Name" required />
        <input type="text" class="login-input" name="lastname" placeholder="Last Name" required />
        <input type="text" class="login-input" name="mobile" placeholder="Mobile No..." required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="password" class="login-input" name="cpassword" placeholder="Confirm Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
    </form>
<?php }?>
</body>
</html>