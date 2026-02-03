<div class="header">
  <a href="index.php">CRUD</a>
  <div class="header-right">
    <!-- <a href="dashboard.php">Dashboard</a>
    <a href="logoutConfig.php">Logout</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a> -->

<?php
$currentPage = basename($_SERVER["PHP_SELF"]);

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
if ($currentPage == "dashboard.php"){
  ?>
  <a href="logoutConfig.php">Logout</a>
  <?php
}
if ($currentPage == "updateInfo.php"){
  ?>
<a href="dashboard.php">Dashboard</a>
<a href="logoutConfig.php">Logout</a>
  <?php
}
if ($currentPage == "updatePass.php"){
  ?>
<a href="dashboard.php">Dashboard</a>
<a href="logoutConfig.php">Logout</a>
  <?php
}
if ($currentPage == "removeAcct.php"){
  ?>
<a href="dashboard.php">Dashboard</a>
<a href="logoutConfig.php">Logout</a>
  <?php
}
?>

  </div>
</div>