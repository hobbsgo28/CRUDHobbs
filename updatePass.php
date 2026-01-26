<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
    <div class="header">
  <a href="index.php">CRUD</a>
  <div class="header-right">
    <a href="dashboard.php">Dashboard</a>
    <a href="logoutConfig.php">Logout</a>
  </div>
</div>
<body>

<?php
include("globals.php");

if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 9:
            echo $MSG_9;
            break;
        case 10:
            echo $MSG_10;
            break;
        case 11:
            echo $MSG_11;
            break;
        default:
            echo $MSG_1;
            break;
    }
}
if (isset($_POST["updateInfo"])) {
    $userId = $_POST[""]

?>
<a href="updateInfo.php">Back to Update Page<br></a>


<table> 
    <tr> 
        <th>User ID</th>
        <th>Confirm Old Password</th>
        <th>Enter New Password</th>
        <th> </th>
    </tr>
    <tr>
<form action="updatePassConfig.php" method="POST">
    <td> <input type="hidden" name="userId" value="<?php=$userId?>" > <?php echo $userId ?>  </td>
    <td> <input type="password" name="pass" placeholder="abcABC123!@#" id="pass"
    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$" required> </td>
    <td> <input type="password" name="newPass" placeholder="abcABC123!@#" id="newPass"
    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$" required> </td>
    <td> <button type="submit" name="updatePass">Update </td>
    </form>

    </tr>

<?php
}
else {
    header("Location: index.php?msg=14");
}
//header("Location: updateInfo.php?msg=12&userId=$userId");

?>
</body>
</html>