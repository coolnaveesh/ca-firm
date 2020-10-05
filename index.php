<?php
include("auth.php");
include("header.php");
?>


  <div class="form">
  <h1 >Welcome <?php echo $_SESSION['username']; ?>!</h1>
  <p >This is your secured index.</p>
  <p><a href="dashboard.php">Your Dashboard</a></p>
  <a href="logout.php">Logout</a>
  </div>

  <?php
include("footer.php");
?>
