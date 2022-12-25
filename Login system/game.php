<?php
session_start();
if (isset($_SESSION["Logged"]) != true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<p>Welcome " . $_SESSION["dbUser"] . '! </p><a href="logout.php"> Logout</a>';
    echo "<p><b>Wood</b>: " . $_SESSION["dbWood"];
    echo " | <b>Rocks</b>: " . $_SESSION["dbRock"];
    echo " | <b>Wheet</b>: " . $_SESSION["dbWheet"] . "</p>";

    echo "<p><b>E-mail</b>: " . $_SESSION["dbEmail"] . "<br>";
    echo "<br /><b>Subscribtion expires in</b>: " . $_SESSION["dbSubscriber"] . "</p>";


    // $date = new DateTime("2017-01-01 09:30:15");
    $date = new DateTime();

    echo $date->format("Y-m-d H:i:s") . "<br>";
    $endSub = DateTime::createFromFormat("Y-m-d H:i:s", $_SESSION["dbSubscriber"]);
    $diff = $date->diff($endSub);

    if ($date < $endSub) {
        echo "Subscribtion expires in: " . $diff->format("%y years, %m months, %d days");
    } else {
        echo "Subscribtion expired: " . $diff->format("%y years, %m months, %d days ") . "ago";
    }


    ?>

</body>

</html>