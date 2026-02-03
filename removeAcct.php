
<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
    <?php 
    include("header.php");
    include("connection.php");
?>

<?php
if (isset($_GET["userId"])) {
    $userId = $_GET["userId"];
}
else {
    $userId = $_POST["userId"];
}

$usersqry = "SELECT firstName, lastName From users WHERE id=?";
$usersqry = $conn->prepare($usersqry);
$usersqry->bind_param("i", $userId);
$usersqry->execute();
$usersqry->store_result();
$usersqry->bind_result($thisFName, $thisLName);
    while ($usersqry->fetch()) {
        echo "Are you sure you want to delete the account for ", $thisFName, " ", $thisLName, "?";
    }
?><br>
<form style="all: unset;" action="removeAcctConfig.php?userId=<?=$userId?>" method="post">
    <button type="submit" name="removeAcct" value="<?= $userId ?>">Confirm</button> </form> <br>

<form style="all: unset;" action="dashBoard.php" method="post">
    <button type="submit" name="userId" value="<?= $userId ?>" >Back to Dashboard</button> </form> <br>

</head>
</html>