<?php

    $nrkaretki = $_POST['numerkaretki'];
    $pierwszy = $_POST['pierwszy'];
    $drugi = $_POST['drugi'];
    $trzeci = $_POST['trzeci'];
    $c = mysqli_connect("localhost","root","","ee09");

    $kw = "INSERT INTO `ratownicy` (`nrKaretki`, `ratownik1`, `ratownik2`, `ratownik3`) VALUES ('$nrkaretki','$pierwszy','$drugi','$trzeci')";
    $q = mysqli_query($c, "$kw");

    echo "Do bazy zostało wysłane zapytanie: $kw";

    mysqli_close($c);
?>