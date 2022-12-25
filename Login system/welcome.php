<?php
session_start();

if (!isset($_SESSION["successRegister"])) {
    header("Location: index.php");
    exit();
} else {
    unset($_SESSION["successRegister"]);
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
    <a href="index.php"> successful registration pleas login in to game </a>

</body>

</html>