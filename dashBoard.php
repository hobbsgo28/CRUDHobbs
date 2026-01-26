<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
    <div class="header">
  <a href="index.php">CRUD</a>
  <div class="header-right">
    <a href="logoutConfig.php">Logout</a>
  </div>
</div>
<body>

<h1> Dashboard </h1>

<?php 
include("globals.php");
include("connection.php");

if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 4:
            echo $MSG_4;
            break;
        case 6:
            echo $MSG_6;
            break;
        case 8:
            echo $MSG_8;
            break;
        default:
            echo $MSG_1;
            break;
    }
}
?>
<a href="logoutConfig.php">Logout <br></a>
<?php    //TODO clear session variables on logout

?>

<table> 
    <tr>
        <th>ID</th>
        <th>Access Key</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Update Information</th>
        <th>Delete Account</th>
    </tr>

<?php
    session_start(); 
if($_SESSION["accessKey"] == 1) {
    $usersqry = "SELECT id, accessKey, firstName, lastName, emailAddress FROM users WHERE emailAddress=?";
    $usersqry = $conn->prepare($usersqry);
    $usersqry->bind_param("s", $_SESSION["emailAddr"]);
    
    $usersqry->execute();
    $usersqry->store_result();

    $usersqry->bind_result($userId, $userKey, $userFName, $userLName, $userEmail);

    while ($usersqry->fetch()) {
?>
        <tr> 
            <td> <?php echo $userId ?> </td>
            <td> <?php echo $userKey ?> </td>
            <td> <?php echo $userFName  ?> </td>
            <td> <?php echo $userLName  ?> </td>
            <td> <?php echo $userEmail ?> </td>
            <td> <form style="all: unset;" action="updateInfo.php" method="post">
                <button type="submit" name="userId" value="<?= $userId ?>" >Update Information</button> </form> </td>
            <td> <form style="all: unset;" action="removeAcct.php?userId=<?=$userId?>" method="post">
                <button type="submit" name="userId" value="<?= $userId ?>" >Delete Account</button> </form> </td>

        </tr>
<?php        }         ?>    
        </table>    
<?php
    }
else if($_SESSION["accessKey"] == 2){
    $usersqry = "SELECT id, accessKey, firstName, lastName, emailAddress FROM users";
    $usersqry = $conn->prepare($usersqry);
        
    $usersqry->execute();
    $usersqry->store_result();

    $usersqry->bind_result($userId, $userKey, $userFName, $userLName, $userEmail);
        
    while ($usersqry->fetch()) {
?>
        <tr> 
            <td> <?php echo $userId ?> </td>
            <td> <?php echo $userKey ?> </td>
            <td> <?php echo $userFName  ?> </td>
            <td> <?php echo $userLName  ?> </td>
            <td> <?php echo $userEmail ?> </td>
            <td> <form style="all: unset;" action="updateInfo.php?userId=<?=$userId?>" method="post">
                <button type="submit" name="userId" value="<?= $userId ?>" >Update Information</button> </form> </td>
            <td> <form style="all: unset;" action="removeAcct.php?userId=<?=$userId?>" method="post">
                <button type="submit" name="userId" value="<?= $userId ?>" >Delete Account</button> </form> </td>
        </tr>
<?php         
        }
?>      </table>  <?php
    }
?>

</body>
</html>
