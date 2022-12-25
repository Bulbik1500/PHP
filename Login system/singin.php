<?php
session_start();
if (isset($_POST["email"])) {

    // ------------ VARIABLES ---------------
    $allDataIsGood = true;

    $nick = $_POST["nickname"];
    $email = $_POST["email"];
    $emailS = filter_var($email, FILTER_SANITIZE_EMAIL);


    // ----------------DATA CHECK-------------
    // --------------NICK CHCEK-----------
    if (strlen($nick) < 3 || strlen($nick) > 20) {
        $allDataIsGood = false;
        $_SESSION["e_nick"] = "Error: Nickname must have at leat 3 charaters and can't have more then 20 <br/>";
    }

    if (ctype_alnum($_POST["nickname"]) == false) {
        $allDataIsGood = false;
        $_SESSION["e_nick"] = "Nickname it can only have letters and numbers <br/>";
    }
    // --------------EMAIL CHCEK-----------
    if (filter_var($emailS, FILTER_VALIDATE_EMAIL) == false || $email != $emailS) {
        $allDataIsGood = false;
        $_SESSION["e_email"] = "Error: wrong email <br/>";
    }
    // --------------PASWORD CHCEK-----------
    $password = $_POST["password"];
    $Rpassword = $_POST["Rpassword"];

    if (strlen($password) < 4) {
        $allDataIsGood = false;
        $_SESSION["e_password"] = "Error: Password is to short <br/>";
    }

    if ($password != $Rpassword) {
        $allDataIsGood = false;
        $_SESSION["e_password"] = "Error: Password are not the same <br/>";
    }

    $pass_hash = password_hash($password, PASSWORD_DEFAULT);

    //--------terms accept---------------

    if (!isset($_POST["terms"])) {
        $allDataIsGood = false;
        $_SESSION["e_terms"] = " you must agree <br/>";
    }
    //-----------recaptcha check---------------
    $seckey = "6LfzaOUfAAAAAEyv7BLfU7xRGcAljEhsPB3WJb3C";
    $recaptchaCheck = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $seckey . '&response=' . $_POST['g-recaptcha-response']);
    $response = json_decode("$recaptchaCheck");

    if ($response->success == false) {
        $allDataIsGood = false;
        $_SESSION["e_recaptcha"] = " are you a robot? <br/>";
    }
    //------------conect to data base---------
    require_once("database.php");
    mysqli_report(MYSQLI_REPORT_STRICT);


    try {
        $connect = new mysqli($host, $dbUser, $dbPassword, $dbName);
        if ($connect->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            // --------------check if email is in data base------------
            $data = $connect->query("SELECT id FROM uzytkownicy WHERE email='$email'");
            if (!$data) throw new Exception($connect->error);
            $returnEmail = $data->num_rows;
            if ($returnEmail > 0) {
                $allDataIsGood = false;
                $_SESSION["e_email"] = " this email is taken <br/>";
            }
            // ----------------chce if username is in data base-------------
            $data = $connect->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
            if (!$data) throw new Exception($connect->error);
            $returnNick = $data->num_rows;
            if ($returnNick > 0) {
                $allDataIsGood = false;
                $_SESSION["e_nick"] = " this username is taken <br/>";
            }
            // ----------if all data is correct,add user to new database--------------
            if ($allDataIsGood == true) {
                if ($connect->query("INSERT INTO uzytkownicy VALUES (null, '$nick' ,'$pass_hash' ,'$email' ,100 ,100 ,100 , now() + INTERVAL 14 DAY)")) {
                    $_SESSION["successRegister"] = true;
                    header("Location: welcome.php");
                } else {
                    throw new Exception(mysqli_connect_errno());
                };
            }

            $connect->close();
        }
    } catch (Exception $e) {
        echo "data base error, please try again later";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<body>
    <form method="post">
        Nickname: <br /><input type="text" name="nickname" /><br />
        <?php
        if (isset($_SESSION["e_nick"])) {
            echo $_SESSION["e_nick"];
            unset($_SESSION["e_nick"]);
        }
        ?>

        E-mail: <br /><input type="text" name="email" /><br />
        <?php
        if (isset($_SESSION["e_email"])) {
            echo $_SESSION["e_email"];
            unset($_SESSION["e_email"]);
        }
        ?>
        Password <br /><input type="password" name="password" /><br />
        Reapet Password <br /><input type="password" name="Rpassword" /><br />
        <?php
        if (isset($_SESSION["e_password"])) {
            echo $_SESSION["e_password"];
            unset($_SESSION["e_password"]);
        }
        ?>

        <label>
            <input type="checkbox" name="terms"> agreed to this terms
        </label>
        <?php
        if (isset($_SESSION["e_terms"])) {
            echo $_SESSION["e_terms"];
            unset($_SESSION["e_terms"]);
        }
        ?>

        <div class="g-recaptcha" data-sitekey="6LfzaOUfAAAAAAGC1l4z1ZfLckB2vNfvBEvjJV7u"></div>
        <?php
        if (isset($_SESSION["e_recaptcha"])) {
            echo $_SESSION["e_recaptcha"];
            unset($_SESSION["e_recaptcha"]);
        }
        ?>
        <input type="submit" value="Sing in" />

    </form>

</body>

</html>