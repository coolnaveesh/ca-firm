<?php

require('db.php');

if (isset($_POST['upload_payment'])) {
	$username=$_POST['username'];
	$amount=$_POST['amount'];
	$ref=$_POST['ref'];
	$bill = $_FILES['bill']['name'];
    $dir = "uploads/".basename($bill);
    $trn_date=time();
    $cr=$amount;
    $dr=0;


    $query = "SELECT * FROM `payment_info` WHERE username='".$username."'";
    if ($users = mysqli_query($con,$query)) { 
        while($rows = mysqli_fetch_assoc($users)){
        	$balance=$rows['balance'];

        }
    }
    $balance=$balance+$amount;
    $allowed = array('pdf');
	$ext = pathinfo($bill, PATHINFO_EXTENSION);
	if (!in_array($ext, $allowed)) {
	    echo '<script type="text/javascript"> 
	                alert("We allow only .svu files."); 
	                window.location.href = "dashboard.php";
	                </script>';
	}else{
	    if(move_uploaded_file($_FILES['bill']['tmp_name'], $dir)) {
	    	$query="INSERT INTO payment_info (id,amount_added,ref,bill,username,trn_date,cr,dr,balance) VALUES (NULL,'".$amount."','".$ref."','".$bill."','".$username."',now(),'".$cr."','".$dr."','".$balance."')";

	        if(mysqli_query($con, $query))  
	        {  
	           echo '<script type="text/javascript"> 
	                alert("Bill uploaded successfully"); 
	                window.location.href = "dashboard.php";
	                </script>';  
	        }else{
	            echo '<script type="text/javascript"> 
	                alert("Couldn"t upload bill.....technical error please try again!!!");
	                window.location.href = "dashboard.php";
	                </script>';
	        }
	    }
	}
	
}






?>