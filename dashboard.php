<?php
require('db.php');
include("auth.php");
include("header.php");
?>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <!-- Navbar brand -->
    <img src="logo.webp" width="250 ">
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
                aria-selected="true">Upload Payment Information</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
                aria-selected="false">Upload Returns</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
                aria-selected="false">Upload Payment Info Status</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md"
                aria-selected="false">PassBook</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="download-tab-md" data-toggle="tab" href="#download-md" role="tab" aria-controls="download-md"
                aria-selected="false">Download File Returns</a>
            </li>
        </ul>
        <a href="logout.php" style="color: white;">LOGOUT</a>
    </div>
    <!-- Collapsible content -->
</nav>
<div class="tab-content card pt-5" id="myTabContentMD">
    <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
        <form class="border border-light p-5" action="payment_info_process.php" method="POST" enctype="multipart/form-data">
            <p class="h4 mb-4 text-center">Upload Payment Information</p>
            <label>Amount Paid:</label>
            <input type="text" name="amount" class="form-control mb-4" placeholder="Amount Paid">
            <label>Reference Number:<small>NEFT or IFSC</small> </label>
            <input type="text" name="ref"  class="form-control mb-4" placeholder="Reference Number">
            <div class="file-upload-wrapper">
                <label>Upload File:<small>only .fvu file is acceptable</small> </label><br>
                <input type="file" name="bill" required multiple class="form-control" accept=".fvu">
            </div>
            <input type="text" name="username" value="<?php echo $_SESSION['username'];?>" hidden>
            <center><input type="submit" name="upload_payment" class="btn btn-info btn-block my-4" value="SAVE"></center>
        </form>
    </div>
    <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
        <table id="dtMaterialDesignExample5" class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">ID
                    </th>
                    <th class="th-sm">STATUS
                    </th>
                    <th class="th-sm">REMARKS
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payment_info = "SELECT * FROM `payment_info` WHERE username='".$_SESSION['username']."' order by trn_date ASC";
                if ($payment_infos = mysqli_query($con,$payment_info)) { 
                    while($rows = mysqli_fetch_assoc($payment_infos)){
                        if($rows['status']==1){
                            $status="Approved";
                        }elseif($rows['status']==2){
                            $status="Rejected";
                        }else{
                            $status="Processing";
                        }
                        echo'
                    <tr>
                        <td>'.$rows['id'].'</td>
                        <td>'.$status.'</td>
                        <td>'.$rows['remarks'].' </td>
                    </tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
        <table id="dtMaterialDesignExample" class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">DATE
                    </th>
                    <th class="th-sm">DR
                    </th>
                    <th class="th-sm">CR
                    </th>
                    <th class="th-sm">BALANCE
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payment_info = "SELECT * FROM `payment_info` WHERE username='".$_SESSION['username']."' order by trn_date ASC";
                if ($payment_infos = mysqli_query($con,$payment_info)) { 
                    while($rows = mysqli_fetch_assoc($payment_infos)){
                        echo'
                    <tr>
                        <td>'.$rows['trn_date'].'</td>
                        <td>'.$rows['dr'].'</td>
                        <td>'.$rows['amount_added'].'</td>
                        <td>'.$rows['balance'].' CR</td>
                    </tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="download-md" role="tabpanel" aria-labelledby="download-tab-md">
        <table id="dtMaterialDesignExample1" class="table" cellspacing="0" width="100%">
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
                    $upload_file_returns = "SELECT * FROM `upload_file_returns` where username='".$_SESSION['username']."'";
                    if ($upload_file_returnss = mysqli_query($con,$upload_file_returns)) { 
                        while($rows = mysqli_fetch_assoc($upload_file_returnss)){
                            echo'
                    <tr>
                      <td>'.$rows['id'].'</td>
                      <td>'.$rows['username'].'</td>
                      <td>'.$rows['charges'].'</td>
                      <td>'.$rows['tan_number'].'</td>
                      <td>'.$rows['type_of_return'].'</td>
                      <td>'.$rows['quater'].'   '.$rows['year'].' </td>
                      <td>'.$rows['ack_no'].'</td>
                      <td><a href="uploads/'.$rows['gov_return_file'].'" download>Download</a></td>
                      
                    </tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Footer -->
<?php include('footer.php'); ?>