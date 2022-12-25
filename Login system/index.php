<?php
session_start();

if (isset($_SESSION["Logged"]) && $_SESSION["Logged"] == true) {
    header("Location: game.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Game</title>
</head>

<body>
    <form action="login.php" method="POST">
        User name:<br>
        <input type="text" name="username"><br>
        Password:<br>
        <input type="password" name="pass"><br>
        <input type="submit" value="Login">
        <a href="singin.php">register</a>
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
        }
        ?>


    </form>


</body>

</html>