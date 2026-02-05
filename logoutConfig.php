<?php
session_start();

if (!isset($_SESSION['exists'])) {
    header("Location: index.php?msg=14");
}
else {
?>

<!DOCTYPE html>
<html>
<body>

<?php
session_unset();

session_destroy();

header("Location: index.php?msg=15");
}
?>


</body>
</html>