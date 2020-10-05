<?php
	include('../db.php');

	if (isset($_POST['submit'])) {
		$username=$_POST['username'];
		$status=$_POST['status'];
		echo $status;
		$remarks=$_POST['remarks'];
		$id=$_POST['id'];
		
		$query = "UPDATE payment_info SET status='$status',remarks='$remarks' WHERE username='".$username."' ";

		if(mysqli_query($con, $query))  
	    {  
	       echo "<script>
			alert('Successfully Updated');
			window.location.href='dashboard.php';
			</script>";  
	    }else{
	       echo "<script>
			alert('Couldn't  Update...Try again!!!');
			window.location.href='dashboard.php';
			</script>"; 
	    }
	}
	else{
	       echo "<script>
			alert('Couldn't enter into loop!!!');
			window.location.href='dashboard.php';
			</script>"; 
	    }

?>