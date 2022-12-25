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
    $i = 0;
    $con = @new mysqli("localhost", "root", "", "ee_09_2019");

    $query1 = mysqli_query($con, 'SELECT nazwa FROM towary WHERE promocja = 1');

    echo "<ul>";
    while ($i <= mysqli_num_rows($query1) - 1) {
        echo "<li>";
        $data       = mysqli_fetch_assoc($query1);
        $nazwa      = $data["nazwa"];
        print($nazwa);
        $i++;
        echo "</li>";
    }
    echo "</ul>";
    $con->close();
    ?>
    <form method="POST" action="">
        <label for="produkty"> Wybierz z listy:</label>
        <select name="produkty" id="produkty">
            <option value="Zeszyt 60 kartek">Zeszyt 60 kartek </option>
            <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
            <option value="Cyrkiel">Cyrkiel</option>
            <option value="Linijka 30 cm">Linijka 30 cm</option>
            <option value="Ekierka">Ekierka</option>
            <option value="Linijka 50 cm">Linijka 50 cm</option>
            <option value="Gumka do mazania">Gumka do mazania</option>
            <option value="Cienkopis">Cienkopis</option>
            <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
            <option value="Markery 4 szt.">Markery 4 szt.</option>
        </select>
        <input type="submit"></input>
    </form>
    <?php 
        $towar = $_POST["produkty"];

        $connet = new mysqli("localhost", "root", "", "ee_09_2019");
        $row = $connet->query("SELECT cena, promocja FROM towary WHERE nazwa='$towar'");
        $data = $row->fetch_assoc();
        $cena = $data["cena"];
        $promocja = $data["promocja"];
        
        if($promocja == 1){
            $suma = $cena * 0.85;
            echo "$cena z promocją = ". $suma;
        }else{
            echo $cena;
        }
        $connet->close();


    ?>
</body>
</html>