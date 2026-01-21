<html>
    <head> <link rel="stylesheet" href="style.css"> </head>

<body>
    <h2> Register </h2>
<a href="login.php">Login Here <br></a>
<br>

<?php
include("globals.php");

if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 3:
            echo $MSG_3;
            break;
        default:
            echo $MSG_1;
            break;
    }
}
?>

<form action="registerConfig.php" method="POST"> 
    First Name: <input type="text" name="fName" placeholder="John" id="fName" pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z-']+$" required > <br>
    Last Name: <input type="text" name="lName" placeholder="Smith" id="lName" pattern="^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z-']+$" required > <br>
    Email Address: <input type="email" name="emailAddr" placeholder="johnsmith@email.com" id="emailAddr" required > <br>
    Password: <input type="password" name="pass" placeholder="abcABC123!@#" id="pass"
    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$" required > <br>
    <input type="submit" name="register">


</form>

</body>
</html>
