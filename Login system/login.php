<?php
session_start();
if (!isset($_POST["username"]) || !isset($_POST["pass"])) {
    header("Location: index.php");
    exit;
}
require_once "database.php";

$connect = @new mysqli($host, $dbUser, $dbPassword, $dbName);
if ($connect->connect_errno != 0) {
    echo "Error" . $connect->connect_errno;
} else {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    $username = htmlentities($username, ENT_QUOTES, "UTF-8");

    // $sql = "SELECT * FROM uzytkownicy WHERE user='$username' AND pass='$password'";
    if ($data = $connect->query(
        sprintf(
            "SELECT * FROM uzytkownicy WHERE user='%s'",
            mysqli_real_escape_string($connect, $username)
        ))){
        $howManyUsers = $data->num_rows;
        if ($howManyUsers > 0) {
            $row = $data->fetch_assoc();
            if(password_verify($password, $row["pass"])){
                $_SESSION["Logged"] = true;

                $_SESSION["dbSubscriber"] = $row["dnipremium"];
                $_SESSION["dbEmail"]      = $row["email"];
                $_SESSION["dbWheet"]      = $row["zboze"];
                $_SESSION["dbUser"]       = $row["user"];
                $_SESSION["dbWood"]       = $row["drewno"];
                $_SESSION["dbRock"]       = $row["kamien"];
                $_SESSION["dbId"]         = $row["id"];

                unset($_SESSION["error"]);
                header("Location: game.php");
                $data->free();
            } else {
                $_SESSION["error"] = '<br>login error wrong login or password <br> please try again';
                header("Location: index.php");
            }
        } else {
            $_SESSION["error"] = '<br>login error wrong login or password <br> please try again';
            header("Location: index.php");
        }
    }



    $connect->close();
}
