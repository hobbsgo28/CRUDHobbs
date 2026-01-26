<?php
include("connection.php");

if (isset($_GET['userId'])) {
    $userId = $_GET["userId"];
}
else {
    $userId = $_POST['userId'];
}

?>
<a href="dashBoard.php">Back to Dashboard<br> </a>
<?php

$usersqry = "SELECT firstName, lastName From users WHERE id=?";
$usersqry = $conn->prepare($usersqry);
$usersqry->bind_param("i", $userId);
$usersqry->execute();
$usersqry->store_result();
$usersqry->bind_result($thisFName, $thisLName);
    while ($usersqry->fetch()) {
        echo "Are you sure you want to delete the account for ", $thisFName, " ", $thisLName, "?";
    }
?>
<form action="removeAcctConfig.php?userId=<?=$userId?>" method="post">
    <button type="submit" name="removeAcct" value="<?= $userId ?>">Confirm</button> </form>

<form action="dashBoard.php" method="post">
    <button type="submit" name="userId" value="<?= $userId ?>" >Back to Dashboard</button> </form>
