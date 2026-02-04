<div class="header">
  <a href="index.php">CRUD</a>
  <div class="header-right">
<?php
$currentPage = basename($_SERVER["PHP_SELF"]);

//check if logged in for certian pages, if not logged in kickback to index
if (!isset($_SESSION['exists'])) {
    $_SESSION['exists'] = FALSE;

}

if ($_SESSION["exists"] == TRUE){ 
  ?>
    <a href="logoutConfig.php">Logout</a>
  <?php
}
else {
  ?>
    <a href="login.php">Login</a>
  <a href="register.php">Register</a>
  <?php

}

if ($currentPage == "index.php"){
  ?>
  <a href="login.php">Login</a>
  <a href="register.php">Register</a>
  <?php
}
if ($currentPage == "login.php"){
  ?>
  <a href="register.php">Register</a>
  <?php
}
if ($currentPage == "register.php"){
  ?>
  <a href="login.php">Login</a>
  <?php
}
if ($currentPage == "updateInfo.php"){
  ?>
<a href="dashboard.php">Dashboard</a>
  <?php
}
if ($currentPage == "updatePass.php"){
  ?>
<a href="dashboard.php">Dashboard</a>
  <?php
}
if ($currentPage == "removeAcct.php"){
  ?>
<a href="dashboard.php">Dashboard</a>
  <?php
}
?>

  </div>
</div>