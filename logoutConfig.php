<?php
// Resume the session
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

header("Location: index.php?msg=15");

?>

</body>
</html>