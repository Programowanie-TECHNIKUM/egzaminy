<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel = "stylesheet" href = "styl3.css">
    </head>


    <body>

        <header>
            <div id = "logo">
                <img src = "wzor.png" alt = "wzór BMI">
            </div>

            <div id = "banner">
                <h1>Oblicz swoje BMI</h1>
            </div>
        </header>

        <div id = "glowny">
            <table>
                <tr>
                    <th>Interpretacja BMI</th>
                    <th>Wartość minimalna</th>
                    <th>Wartość maksymalna</th>
                </tr>
                <tr>
                    <td>niedowaga</td>
                    <td>0</td>
                    <td>18</td>
                </tr>
                <tr>
                    <td>waga prawidłowa</td>
                    <td>19</td>
                    <td>25</td>
                </tr>
                <tr>
                    <td>nadwaga</td>
                    <td>26</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>otylosc</td>
                    <td>31</td>
                    <td>100</td>
                </tr>
            </table>
        </div>

        <div id = "nieglownebloki">
            <div id = "lewy">
                <h2>Podaj wagę i wzrost</h2>
                <form method = "post">
                    Waga: <input type = "number" min = 1 name = "waga"> </br>
                    Wzrost: <input type = "number" min = 1 name = "cm"> </br>
                    <input type="submit" value = "Oblicz i zapamiętaj wynik">
                </form>
                <?php
                    
                    if(isset($_POST['waga']) && isset($_POST['cm'])) {
                        $c = mysqli_connect('localhost', 'root', '', 'egzamin');
                        $waga = $_POST['waga'];
                        $cm = $_POST['cm'];

                        $bmi = $waga / ($cm * $cm);

                        $ostatecznebmi = $bmi * 10000;

                        echo "Twoja Waga: $waga; Twoj wzrost: $cm; BMI wynosi: $ostatecznebmi \n";

                        $czas = date("Y-m-d");

                        $q = mysqli_query($c, "SELECT * FROm bmi where wart_min < $ostatecznebmi and wart_max > $ostatecznebmi;");

                        while($a = mysqli_fetch_array($q)) {
                            echo $a[0];
                            $b = mysqli_query($c, "insert into wynik(bmi_id,data_pomiaru,wynik) VALUES ('$a[0]', '$czas', '$ostatecznebmi')");
                        }
                        mysqli_close($c);
                    }
                ?>


            </div>
    
            <div id = "prawy">
                <img src = "rys1.png" alt = "ćwiczenia">
            </div>
        </div>


        <footer>
            Autor: 0000000000
            <a href = "kwerendy.txt">Zobacz kwerendy</a>
        </footer>


    </body>

</html>