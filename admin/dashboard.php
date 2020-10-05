<?php
require('../db.php');
include("../auth.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Dashboard - Secured Page</title>
		<!-- MDB icon -->
		<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
		  <!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
		  <!-- Google Fonts Roboto -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
		  <!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		  <!-- Material Design Bootstrap -->
		<link rel="stylesheet" href="css/mdb.min.css">
		  <!-- Your custom styles (optional) -->
		  <!-- MDBootstrap Datatables  -->
		<link href="css/addons/datatables2.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<!-- navbar -->
		<!--Navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark primary-color">
			<!-- Navbar brand -->
			<img src="../logo.webp" width="250 ">
			<!-- Collapse button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
			aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Collapsible content -->
			<div class="collapse navbar-collapse" id="basicExampleNav">
				<!-- Links -->
				<ul class="nav nav-tabs md-tabs navbar-nav mr-auto ml-2" id="myTabMD" role="tablist">
					
					<li class="nav-item">
						<a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md"
						aria-selected="true">Payment Information</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
						aria-selected="false">Upload File Returns</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md"
						aria-selected="false">LookUp Type</a>
					</li>
				</ul>
				<a href="logout.php" style="color: white;">LOGOUT</a>
			</div>
			<!-- Collapsible content -->
		</nav>
		<!--/.Navbar-->
		<!-- navbar ends -->
		
		<div class="tab-content card pt-5" id="myTabContentMD">
			<div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
				
				<!-- <form class="border border-light p-5">

				    <p class="h4 mb-4 text-center">Payment Information</p>
				    <label>User Name:</label>
				    <input type="text" class="form-control mb-4">
				    <label>Company Name:</label>
				    <input type="text"  class="form-control mb-4">

				    <label>Amount Paid:</label>
				    <input type="text"  class="form-control mb-4">

				    <label>Download File:</label>
				    <input type="text"  class="form-control mb-4">

				    <label>Reference Number:</label>
				    <input type="text"  class="form-control mb-4">

				    <label>Date Submitted:</label>
				    <input type="text"  class="form-control mb-4">

				    <label>Status:</label>
				    <div class="col-md-12 inline-flex">
						<div class="form-check">
						  <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
						  <label class="form-check-label" for="materialGroupExample1">Approved</label>
						</div>
						<div class="form-check">
						  <input type="radio" class="form-check-input" id="materialGroupExample2" name="groupOfMaterialRadios" checked>
						  <label class="form-check-label" for="materialGroupExample2">Rejected</label>
						</div>
				    </div><br>
					<div class="md-form amber-textarea active-amber-textarea-2">
					  <textarea id="form16" class="md-textarea form-control" rows="3"></textarea>
					  <label for="form16">Reason(give proper reason for approval or rejection):</label>
					</div>
				    <center><input type="submit" name="submit" class="btn btn-info btn-block my-4" value="SAVE"></center>

				</form> -->
				<table id="dtMaterialDesignExample2" class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Id
                    </th>
                    <th class="th-sm">Username
                    </th>
                    <th class="th-sm">Amount paid
                    </th>
                    <th class="th-sm">Download File
                    </th>
                    <th class="th-sm">Reference Number
                    </th>
                    <th class="th-sm">Date Submitted
                    </th>
                    <th class="th-sm">Status
                    </th>
                    <th class="th-sm">Reason
                    </th>
                    <th class="th-sm">Action
                    </th>
                </tr>
            </thead>
            <tbody>
            	<?php
                $payment_info = "SELECT * FROM `payment_info` where status=0";
                if ($payment_infos = mysqli_query($con,$payment_info)) { 
                    while($rows = mysqli_fetch_assoc($payment_infos)){
                        echo'                
			                <tr>
			                	<form class="border border-light" method="POST" action="payment_info_process.php">
				                    <td><input type="text" value="'.$rows['id'].'" name="id" readonly="readonly" style="border:none;"></td>
				                    <td><input type="text" value="'.$rows['username'].'" name="username" readonly="readonly" style="border:none;"></td>
				                    <td>'.$rows['amount_added'].'</td>
				                    <td><a href="../uploads/'.$rows['bill'].'" download style="color:blue;font-weight:600;">download file</td>
				                    <td>'.$rows['ref'].'</td>
				                    <td>'.$rows['trn_date'].'</td>
				                    <td>
				                    	<div class="col-md-12 inline-flex">
											<div class="form-check">
											  <input type="radio" class="form-check-input" id="materialGroupExample1" name="status" value="1">
											  <label class="form-check-label" for="materialGroupExample1">Approved</label>
											</div>
											<div class="form-check">
											  <input type="radio" class="form-check-input" id="materialGroupExample2" name="status" value="2" checked>
											  <label class="form-check-label" for="materialGroupExample2">Rejected</label>
											</div>
									    </div>
				                    </td>
				                    <td>
				                    	<div class="md-form amber-textarea active-amber-textarea-2">
										  <textarea id="form16" name="remarks" class="md-textarea form-control" rows="3"></textarea>
										  <label for="form16">Reason(give proper reason for approval or rejection):</label>
										</div>
				                    </td>
				                    <td>
				                    	<input type="submit" name="submit" value="submit">
				                    </td>
				                </form>
			                </tr>';
		            	}
		        	}
       			?>
            </tbody>
        </table>
			</div>
			<div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
				<form class="border border-light p-5" method="POST" action="upload_file_returns.php" enctype="multipart/form-data">

				    <p class="h4 mb-4 text-center">Upload File Returns</p>
				    <label>User Name:</label>
				    <input type="text" class="form-control mb-4" placeholder="User Name" name="username">

				    <!-- <label>Company Name:</label>
				    <input type="text"  class="form-control mb-4" placeholder="Company Name"> -->


				    <label>TAN Number:</label>
				    <input type="text"  class="form-control mb-4" placeholder="Reference Number" name="tan">

				    <label>Charges:</label>
				    <input type="text"  class="form-control mb-4" placeholder="Charges" name="charges">

				    <label>Type fo Return:</label>
				    <!-- <input type="text"  class="form-control mb-4" placeholder="Type of return">

				    <label>Select Return:</label> -->
				    <select class="browser-default custom-select" name="type_of_return">
					  <option selected>SELECT</option>
					  <option value="revised">Revised</option>
					  <option value="original">Original</option>
					</select><br>
				    <br>
				    <div class="row">
					    <div class="col">
					      	<label>Quater:</label>
							<select id="inputState" class="form-control" name="quater">
						        <option selected>Choose...</option>
						        <option value="q1">Q1</option>
						        <option value="q2">Q2</option>
						        <option value="q3">Q3</option>
						        <option value="q4">Q4</option>
						    </select>
					    </div>
					    <div class="col">
					      	<label>Year:</label>
							<input type="text"  class="form-control mb-4" placeholder="Ex: 2020-2021" name="year">
					    </div>
					</div>

					<br><label>Acknowledge Number:</label>
					<input type="text"  class="form-control mb-4" placeholder="Acknowledge Number" name="ack_no">


					<div class="file-upload-wrapper">
				    	<label>Upload Gov Returned File:</label><br>
  						<input type="file" id="input-file-now" class="file-upload" accept=".pdf" name="gov_return_type" />
					</div>


				    <center>
				    	<input type="submit" name="submit" class="btn btn-info btn-block my-4" value="SAVE">
				    	<!-- <input type="submit" name="submit" class="btn btn-info btn-block my-4" value="MODIFY">
				    	<input type="submit" name="submit" class="btn btn-info btn-block my-4" value="DELETE"> -->
				    </center>

				</form>
			</div>
			<div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
				<form class="border border-light">
					<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
					  <thead>
					    <tr>
					      <th class="th-sm">id
					      </th>
					      <th class="th-sm">User Name
					      </th>
					      <th class="th-sm">Charges
					      </th>
					      <th class="th-sm">TAN Number
					      </th>
					      <th class="th-sm">Type of Return
					      </th>
					      <th class="th-sm">Quater | Year
					      </th>
					      <th class="th-sm">Acknowledge Number
					      </th>
					      <th class="th-sm">Upload Gov Return File
					      </th>
					      <!-- <th class="th-sm">Action
					      </th> -->
					      <!-- <td><button>Modify</button></td> -->
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
		                $upload_file_returns = "SELECT * FROM `upload_file_returns`";
		                if ($upload_file_returnss = mysqli_query($con,$upload_file_returns)) { 
		                    while($rows = mysqli_fetch_assoc($upload_file_returnss)){
		                        echo'
					    <tr>
					      <td>'.$rows['id'].'</td>
					      <td>'.$rows['username'].'</td>
					      <td>'.$rows['charges'].'</td>
					      <td>'.$rows['tan_number'].'</td>
					      <td>'.$rows['type_of_return'].'</td>
					      <td>'.$rows['quater'].'  	'.$rows['year'].' </td>
					      <td>'.$rows['ack_no'].'</td>
					      <td>'.$rows['gov_return_file'].'</td>
					      
					    </tr>';
							}
						}
						?>

					  </tbody>
					</table>
				</form>
			</div>
			
		</div>
		<!-- Footer -->
		<footer class="page-footer font-small cyan darken-3">

		  <!-- Copyright -->
		  <div class="footer-copyright py-3">
		  	<div class="container">
		  		<div class="row">
		  			<div class="col-md-12">
		  				<p>Sulab Filing Consultancy Pvt Ltd</p>
		  			</div>
		  			<div class="col-md-12">
		  				<p>@2020 All Rights Reserved</p>
		  			</div>
		  		</div>
		  		<hr style="background: white;">
		  		<div class="row">
		  			<div class="col-md-6">
		  				<a href="" class="text-left">Terms & Conditions	</a>
		  			</div>
		  			<div class="col-md-6 text-right">
		    			<a href="" class="text-right">Terms & Conditions	</a>
		  			</div>
		  		</div>
		  	</div>
		  </div>
		  <!-- Copyright -->

		</footer>
		<!-- Footer -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		  <!-- Bootstrap tooltips -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		  <!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		  <!-- MDB core JavaScript -->
		<script type="text/javascript" src="js/mdb.min.js"></script>
		  <!-- Your custom scripts (optional) -->
		<script type="text/javascript"></script>
		  <!-- MDBootstrap Datatables  -->
		<script type="text/javascript" src="js/addons/datatables2.min.js"></script>
	</body>
</html>
<script>
  $(document).ready(function () {
  $('#dtMaterialDesignExample2').DataTable();
  $('#dtMaterialDesignExample2_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtMaterialDesignExample2_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "Search");
    $this.removeClass('form-control-sm');
  });
  $('#dtMaterialDesignExample2_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtMaterialDesignExample2_wrapper .dataTables_filter').addClass('md-form');
  $('#dtMaterialDesignExample2_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
  $('#dtMaterialDesignExample2_wrapper select').addClass('mdb-select');
  $('#dtMaterialDesignExample2_wrapper .mdb-select').materialSelect();
  $('#dtMaterialDesignExample2_wrapper .dataTables_filter').find('label').remove();
});
</script>