<html>
    <head>
        <title>Forum o psach</title>
        <link rel = "stylesheet" href = "styl4.css" />
    </head>

    <body>
        <header>
            <h1>Forum wielbicieli psów</h1>
        </header>

        <div id = "lewy">
            <img src = "obraz.jpg" alt = "foksterier" />
        </div>

        <div id = "prawy">
            <div id = "gorny">
                <h2>Zapisz się</h2>
                <form method="post">
                    login: <input type = "text" name = "login" /> <br/>
                    hasło: <input type ="password" name = "password" /> <br/>
                    powtórz hasło: <input type ="password" name = "repeatpassword" /> <br/>
                    <input type ="submit" value = "Zapisz" />
                    <?php
                        if(isset($_POST['login'])) {
                            $login = $_POST['login'];
                            $password = $_POST['password'];
                            $repeatpassword = $_POST['repeatpassword'];
                            $c = mysqli_connect("localhost","root","","psy");

                            $loginexist = mysqli_query($c,"SELECT * FROM `uzytkownicy` WHERE login LIKE '$login'");

                            $blad = 0;

                            if(!$login || !$password || !$repeatpassword) {
                                echo "<p>Musisz wypelnic wszystkie pola!</p>";
                                $blad = 1;
                            }

                            while($a = mysqli_fetch_array($loginexist)) {
                                if($a[0] == $login) {
                                    echo "<p>Login jest w bazie!</p>";
                                    $blad = 1;
                                }
                            }

                            if($password != $repeatpassword) {
                                echo "<p>Hasla sie roznia!</p>";
                                $blad = 1;
                            }

                            if($blad == 0) {
                                $hash = sha1($password);
                                mysqli_query($c, "INSERT INTO `uzytkownicy` VALUES ('$login','$hash')");
                                echo "<p>Konto zostało dodane</p>";
                            }

                        

                            mysqli_close($c);
                        }
                    ?>
                </form>
            </div>

            <div id = "dolny">
                <h2>Zapraszamy wszystkich</h2>
                <ol>
                    <li>właścicieli psów</li>
                    <li>weterynarzy</li>
                    <li>tych, co chcą kupić psa</li>
                    <li>tych, co lubią psy</li>
                    <a href = "regulamin.html">Przeczytaj regulamin forum</a>
                </ol>
            </div>

        </div>

        <footer>
            Strone wykonał: 000000000000
        </footer>
    </body>






</html>