<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
    <?php 
    session_start();
    include("header.php");
    ?>
<body>

<div class="container">
  <div class="column-2">
<?php
include("globals.php");
include("connection.php");

if (isset($_GET["msg"])) {
    switch ($_GET["msg"]) {
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

if (isset($_POST["updateInfo"])){
    ?>
    <!-- <a href="dashboard.php">Back to Dashboard<br> </a> -->

    <table> 
        <tr>
            <th>ID</th>
            <th>Access Level</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
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
    ?>
            <tr> 
                <td> <?php echo $userId ?> </td>

                <form style="all: unset;" name="updateInfo" action="updateInfoConfig.php" method="post">
                <input type="hidden" name="userId" id="userId" value="<?=$userId?>">
                <?php

                if( $_SESSION["accessKey"] == 1) {
                ?>
                    <td> <?php echo "User" ?> <input type="hidden" name="userKey" id="userKey" value="<?=$userKey?>" required> </td>
    <?php }     if($_SESSION["accessKey"] == 2) {       ?>
                    <td> <input type="integer" id="userKey" placeholder="<?=$userKey ?>" value="<?=$userKey ?>" name="userKey" requires> </td>
    <?php              }        ?>

                <td> <input type="text" id="firstName" placeholder="<?=$userFName ?>" value="<?=$userFName ?>" pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z-']+$" name="firstName" required> </td>

                <td> <input type="text" id="lastName" placeholder="<?=$userLName ?>" value="<?=$userLName ?>" pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z-']+$" name="lastName" required> </td>

                <td> <input type="email" id="emailAddress" placeholder="<?=$userEmail ?>" value="<?=$userEmail ?>" name="emailAddress" required> </td>
                
                <td> <button type="submit"  name="updateInfo" value="<?= $userId ?>" >Update Information</button> </form> </td>

                <td> <form style="all: unset;" action="updatePass.php?userId=<?=$userId?>&emailAddr=<?=$userEmail?>" method="post">
                    <button type="submit" name="updatePass" value="<?= $userId ?>" >Update Password</button> </form> </td>

            </tr>
    <?php
            }
}
else {
    header("Location: index.php?msg=14");
}
?>
</table>
</div>
</div>

<?php
include("footer.php");
?>
</body>
</html>