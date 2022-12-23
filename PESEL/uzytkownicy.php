<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <h2>Nasze osiedle</h2>
    </header>
    <header>
        <!-- skrypt 1 -->
        <?php
            $conn = new mysqli('localhost', 'root', '', 'portal');

            $sqlQuery = "SELECT COUNT(*) FROM dane;";
            $users = $conn->query($sqlQuery);
            echo "Liczba
            użytkowników portalu:". $users->fetch_row()[0];

            $conn->close();
        ?>
    </header>
    <aside>
        <h3>Logowanie</h3>
        <form action="./uzytkownicy.php" method="post">
            <label>
                login <br> <input type="text" name="login">
            </label>
            <br>
            <label>
                hasło <br> <input type="password" name="password">
            </label>
            <br>
            <button>Zaloguj</button>
        </form>
    </aside>
    <main>
        <h3>Wizytówka</h3>
        <article>
            <!-- skrypt 2 -->
            <?php

                if (isset($_POST['login']) && isset($_POST['password'])) {
                    $conn = new mysqli('localhost', 'root', '', 'portal');

                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    
                    $checkUserQuery = "SELECT haslo FROM uzytkownicy WHERE login = '$login'";

                    $checkUserResult = $conn->query($checkUserQuery);
                    
                    if ($checkUserResult->num_rows == 0) {
                        echo 'login nie istnieje';
                    } elseif ($checkUserResult->fetch_row()[0] != sha1($password)) {
                        echo 'hasło nieprawidłowe';
                    } else {
                        $userDataQuery = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM uzytkownicy JOIN dane ON uzytkownicy.id = dane.id WHERE login = '$login';";
                        $getUserData = $conn->query($userDataQuery);

                        $userData = $getUserData->fetch_assoc();
                        $userName = $userData['login'];
                        $age = date('Y') - $userData['rok_urodz'];
                        $friends = $userData['przyjaciol'];
                        $hobby = $userData['hobby'];
                        $photo = $userData['zdjecie'];
                    
                        echo "<img src='$photo' alt='osoba' />";
                        echo "<h4>$login ($age)</h4>";
                        echo "<p>$hobby</p>";
                        echo "<h1><img src='icon-on.png' alt='' /> $friends</h1>";
                        echo "<button><a href='./dane.html'>Więcej informacji</a></button>";
                    }

                    $conn->close();
                }

            ?>
        </article>
    </main>
    <footer>
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>