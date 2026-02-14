
<html>
    <head> <link rel="stylesheet" href="style.css"> </head>
    <?php 
    session_start();
    include("header.php");
    include("connection.php");
    include("footer.php");
?>
<div class="container">
  <div class="column-wing">
</div>

  <div class="column-1">

<?php
if (isset($_GET["userId"])) {
    $userId = $_GET["userId"];
}
else {
    $userId = $_POST["userId"];
}

if (isset($_POST["removeAcct"])){

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

<form style="all: unset;" action="dashboard.php" method="post">
    <button type="submit" name="userId" value="<?= $userId ?>" >Back to Dashboard</button> </form> <br>

<?php
}
else {
    header("Location: index.php?msg=14");

}
?>

</div>

<div class="container">
  <div class="column-wing">
</div>
</head>
</html>