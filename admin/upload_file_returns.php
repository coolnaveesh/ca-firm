<?php
	require('../db.php');

	if (isset($_POST['submit'])) {
		$username=$_POST['username'];
		$tan=$_POST['tan'];
		$charges=$_POST['charges'];
		$dr=$charges;
		$type_of_return=$_POST['type_of_return'];
		$quater=$_POST['quater'];
		$year=$_POST['year'];
		$ack_no=$_POST['ack_no'];
		$gov_return_type = $_FILES['gov_return_type']['name'];
	    $dir = "../uploads/".basename($gov_return_type);
	    $allowed = array('pdf');
	    $ext = pathinfo($gov_return_type, PATHINFO_EXTENSION);
	    $status=3;
	    if (!in_array($ext, $allowed)) {
	        echo '<script type="text/javascript"> 
	                    alert("We allow only .pdf files."); 
	                    window.location.href = "dashboard.php";
	                    </script>';
	    }
	    move_uploaded_file($_FILES['gov_return_type']['tmp_name'], $dir);


	    $query = "SELECT balance FROM `payment_info` WHERE username='".$username."' order by id desc limit 1";
	    if ($users = mysqli_query($con,$query)) { 
	        while($rows = mysqli_fetch_assoc($users)){
	        	$balance=$rows['balance'];

	        }
	    }
	    if ($balance > $charges) {
	    	
	    	$balance=$balance-$charges;

		    echo $balance;
		    $query1="INSERT INTO payment_info (id,username,trn_date,dr,balance,status) VALUES (NULL,'".$username."',now(),'".$dr."','".$balance."','".$status."')";
		    mysqli_query($con, $query1);
		    $query="INSERT INTO upload_file_returns (username,tan_number,charges,type_of_return,quater,year,gov_return_file,ack_no) VALUES ('".$username."','$tan','$charges','".$type_of_return."','".$quater."','".$year."','".$gov_return_type."','".$ack_no."')";

		    if(mysqli_query($con, $query))  
		    {  
		       echo "<script>
				alert('Successfully Submitted');
				window.location.href='dashboard.php';
				</script>";  
		    }else{
		        echo "<script>
		       	alert('Try Again');
		       </script>"; 
		    }
	    }else{
	    	echo "in sufficent funds";
	    }
	    
	}


?>