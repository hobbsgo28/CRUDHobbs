<body>
<div class="header">
  <a href="index.php">CRUD</a>
  <div class="header-right">
<?php
include("unauthAccess.php");

$currentPage = basename($_SERVER["PHP_SELF"]);

//check if logged in for certian pages, if not logged in kickback to index
if (!isset($_SESSION['exists'])) {
    $_SESSION['exists'] = FALSE;

}

if ($_SESSION["exists"] == TRUE){ 
  ?>
    <a href="logoutConfig.php">Logout</a>
    <a href="dashboard.php">Dashboard</a>

  <?php
}

if ($currentPage == "index.php"){
  ?>
  <a id="" href="login.php">Login</a>
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
if ($currentPage == "globals.php"){
  header("Location: index.php?msg=15");
}
?>

  </div>
</div>
</body>