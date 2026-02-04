<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
    <?php 
    session_start();
    include("header.php");
    ?>
<body>

<h1> Dashboard </h1>

<?php 
include("globals.php");
include("connection.php");

if (isset($_GET["msg"])) {
    switch ($_GET["msg"]) {
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

<?php
if($_SESSION["accessKey"] == 1) { // normal user access
    $usersqry = "SELECT id, accessKey, firstName, lastName, emailAddress FROM users WHERE emailAddress=?";
    $usersqry = $conn->prepare($usersqry);
    $usersqry->bind_param("s", $_SESSION["emailAddr"]);

} else if($_SESSION["accessKey"] == 2) { // admin user acces
    $usersqry = "SELECT id, accessKey, firstName, lastName, emailAddress FROM users";
    $usersqry = $conn->prepare($usersqry);
        
} else { // no access
    header("Location: index.php?msg=14");
}
$usersqry->execute();
$usersqry->store_result();

$usersqry->bind_result($userId, $userKey, $userFName, $userLName, $userEmail);
?>
<table> 
    <tr>
        <th>ID</th>
        <th>Access Level</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Update Information</th>
        <th>Delete Account</th>
    </tr>
<?php
    
        
    while ($usersqry->fetch()) {
?>
        <tr> 
            <td> <?php echo $userId ?> </td>
            <td> <?php if ($userKey == 1){
                echo "User";
            } else if($userKey == 2){
                echo "Admin";
            } ?> </td>
            <td> <?php echo $userFName  ?> </td>
            <td> <?php echo $userLName  ?> </td>
            <td> <?php echo $userEmail ?> </td>
            <td> <form style="all: unset;" action="updateInfo.php?userId=<?=$userId?>" method="post">
                <button type="submit" name="updateInfo" value="<?= $userId ?>" >Update Information</button> </form> </td>
            <td> <form style="all: unset;" action="removeAcct.php?userId=<?=$userId?>" method="post">
                <button type="submit" name="userId" value="<?= $userId ?>" >Delete Account</button> </form> </td>
        </tr>

        
<?php   

        }
?>      </table>

</body>
</html>
