<!DOCTYPE html>
<html lang="en">
    <head> <link rel="stylesheet" href="style.css"> </head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
include("globals.php");

if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 4:
            echo $MSG_4;
            break;
        case 6:
            echo $MSG_6;
            break;
        case 14:
            echo $MSG_14;
            break;
        case 15:
            echo $MSG_15;
            break;
        default:
            echo $MSG_1;
            break;
    }
}
?>



<h2> Welcome to my CRUD </h2>

<a href="register.php">Register Here <br></a>
<a href="login.php">Login Here <br></a>


<?php 

?> 

</body>
</html>