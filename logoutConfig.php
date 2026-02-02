<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
session_unset();

session_destroy();

header("Location: index.php?msg=15");

?>

</body>
</html>