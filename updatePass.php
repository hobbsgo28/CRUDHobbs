<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
    <?php 
    session_start();
    include("header.php");
    include("footer.php");
    ?>
<body>
<?php

include("globals.php");

if (isset($_GET["msg"])) {
    switch ($_GET["msg"]) {
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

if (isset($_GET["userId"])) {
    $userId = $_GET["userId"];
}
else {
    $userId = $_POST["userId"];
}

if (isset($_POST["updatePass"])){

?>

<table> 
    <tr> 
        <th>User ID</th>
        <th>Enter New Password</th>
        <th> </th>
    </tr>
    <tr>
<form action="updatePassConfig.php?userId=<?=$userId?>" method="POST">
    <td> <input type="hidden" name="userId" value="<?php=$userId?>" > <?php echo $userId ?>  </td>
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
?>

</body>
</html>