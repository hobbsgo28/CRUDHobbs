<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
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
<a href="index.php">Logout <br></a>
<?php

if (isset($_GET['emailAddr'])) {
    $emailAddr = $_GET["emailAddr"];
}
else {
    $emailAddr = $_POST['emailAddr'];
}

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
    $accessqry = "SELECT accessKey FROM users WHERE emailAddress=?";
    $accessqry = $conn->prepare($accessqry);
    $accessqry->bind_param("s", $emailAddr);
    $accessqry->execute();

    $accessqry->store_result();
    $accessqry->bind_result($accessKey);

while ($accessqry->fetch()) {

    if (isset($_GET['accessKey'])) {
    $accessKey = $_GET["accessKey"];
}

    if($accessKey == 1) {
        $usersqry = "SELECT id, accessKey, firstName, lastName, emailAddress FROM users WHERE emailAddress=?";
        $usersqry = $conn->prepare($usersqry);
        $usersqry->bind_param("s", $emailAddr);
        
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
                <td> <form style="all: unset;" action="updateInfo.php?accessKey=<?=$accessKey?>" method="post">
                    <button type="submit" name="userId" value="<?= $userId ?>" >Update Information</button> </form> </td>
                <td> <form style="all: unset;" action="removeAcct.php?userId=<?=$userId?>&accessKey=<?=$accessKey?>" method="post">
                    <button type="submit" name="userId" value="<?= $userId ?>" >Delete Account</button> </form> </td>

            </tr>
<?php         }         ?>    
        </table>    
<?php
    }
    else if($accessKey == 2){
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
                <td> <form style="all: unset;" action="updateInfoAdmin.php?accessKey=<?=$accessKey?>&emailAddr=<?=$emailAddr?>" method="post">
                    <button type="submit" name="userId" value="<?= $userId ?>" >Update Information</button> </form> </td>
                <td> <form style="all: unset;" action="removeAcct.php?userId=<?=$userId?>&emailAddr=<?=$emailAddr?>&accessKey=<?=$accessKey?>" method="post">
                    <button type="submit" name="userId" value="<?= $userId ?>" >Delete Account</button> </form> </td>
            </tr>
<?php         
        }
?>      </table>  <?php
    }
}
?>

<a href="changePass.php">Change Password Here <br> </a>
<a href="deleteAcct.php">Delete Account Here <br> </a>

</body>
</html>
