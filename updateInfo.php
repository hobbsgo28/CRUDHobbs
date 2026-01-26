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
include("connection.php");

if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 8:
            echo $MSG_8;
            break;
        case 12:
            echo $MSG_12;
            break;
        case 13:
            echo $MSG_13;
            break;
        default:
            echo $MSG_1;
            break;
    }
}
if (isset($_GET["userId"])){
    $userId = $_GET["userId"];
}


session_start();
?>
<a href="dashBoard.php">Back to Dashboard<br> </a>

<table> 
    <tr>
        <th>ID</th>
        <th>Access Key</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <!-- <th>Update Password</th> -->
        <th>Update Information</th>
        <th>Password</th>
    </tr>

<?php

    $query = "SELECT id, accessKey, firstName, lastName, emailAddress From users WHERE id=?";
    $query = $conn->prepare($query);

    $query->bind_param("i", $userId);
    $query->execute();
    $query->store_result();

    $query->bind_result($userId, $userKey, $userFName, $userLName, $userEmail);

        while ($query->fetch()) {
            if( $_SESSION["accessKey"] == 1) {
?>
        <tr> 
            <td> <?php echo $userId ?> </td>

            <td> <?php echo $userKey ?> </td>

            <form style="all: unset;" action="updateInfoConfig.php" method="post">
            <input type="hidden" name="userId" value="<?php=$userId?>" >

            <td> <input type="text" id="firstName" placeholder="<?=$userFName ?>" value="<?=$userFName ?>" pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z-']+$" name="firstName" required> </td>

            <td> <input type="text" id="lastName" placeholder="<?=$userLName ?>" value="<?=$userLName ?>" pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z-']+$" name="lastName" required> </td>

            <td> <input type="email" id="emailAddress" placeholder="<?=$userEmail ?>" value="<?=$userEmail ?>" name="emailAddress" required> </td>
            
            <td> <button type="submit"  name="updateInfo" value="<?= $userId ?>" >Update Information</button> </form> </td>

           <!-- <td> <form style="all: unset;" action="newPassConfig.php?userId=<?=$userId?>" method="post">
            <input type="hidden" name="userId" value="<?php=$userId?>" >
            <input type="passwprd" id="newPass" placeholder="abcABC123!@#" name="newPass" required>
                <button type="submit" name="userId" value="<?= $userId ?>" >Update</button> </form> </td> -->

            <td> <form style="all: unset;" action="updatePass.php?userId=<?=$userId?>&emailAddr=<?=$userEmail?>" method="post">
                <button type="submit" name="updateInfo" value="<?= $userId ?>" >Update Password</button> </form> </td>

        </tr>
<?php
        }
    }
             if($_SESSION["accessKey"] == 2) {
 ?>
             <td> <?php echo $userId ?> </td>

            <form style="all: unset;" action="updateInfoAdminConfig.php" method="post">
            <input type="hidden" name="userId" value="<?php=$userId?>">

            <td> <input type="integer" id="userKey" placeholder="<?=$userKey ?>" value="<?=$userKey ?>" name="userKey" requires> </td>

            <td> <input type="text" id="firstName" placeholder="<?=$userFName ?>" value="<?=$userFName ?>" pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z-']+$" name="firstName" required> </td>

            <td> <input type="text" id="lastName" placeholder="<?=$userLName ?>" value="<?=$userLName ?>" pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z-']+$" name="lastName" required> </td>

            <td> <input type="email" id="emailAddress" placeholder="<?=$userEmail ?>" value="<?=$userEmail ?>" name="emailAddress" required> </td>
            
            <td> <button type="submit"  name="updateInfoAdmin" value="<?= $userId ?>" >Update Information</button> </form> </td>

            <!-- <td> <form style="all: unset;" action="newPassConfig.php?userId=<?=$userId?>" method="post">
            <input type="hidden" name="userId" value="<?php=$userId?>" >
            <input type="passwprd" id="newPass" placeholder="abcABC123!@#" name="newPass" required>
                <button type="submit" name="userId" value="<?= $userId ?>" >Update</button> </form> </td> -->

            <td> <form style="all: unset;" action="updatePass.php?userId=<?=$userId?>" method="post">
                <button type="submit" name="updateInfoAdmin" value="<?= $userId ?>" >Update Password</button> </form> </td>

         </tr>
<?php
        }
?>
</table>

</body>
</html>