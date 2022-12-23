<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <aside>
        <img src="./obraz.jpg" alt="foksterier">
    </aside>
    <article>
        <h2>Zapisz się</h2>
        <form action="./logowanie.php" method="post">
            <label>
                login: <input type="text" name="login">
            </label>
            <br>
            <label>
                hasło: <input type="password" name="password">
            </label>
            <br>
            <label>
                powtórz hasło: <input type="password" name="confPassword">
            </label>
            <br>
            <button>Zapisz</button>
        </form>
        <?php
            if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['confPassword'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $confPassword = $_POST['confPassword'];
                
                $conn = new mysqli('localhost', 'root', '', 'psy');
                
                $sqlQuery = "SELECT login FROM uzytkownicy";
                $allLogins = $conn->query($sqlQuery);

                if ($allLogins->num_rows > 0) {
                    $loginExists = false;
                    while ($row = $allLogins->fetch_row()) {
                        if ($row[0] == $login) {
                            $loginExists = true;
                            break;
                        }
                    }
                }
                
                if (!$login || !$password || !$confPassword) {
                    echo '<p>wypełnij wszystkie pola</p>';
                } elseif ($loginExists) {
                    echo 'login występuje w bazie danych, konto nie zostało dodane';
                } elseif ($password != $confPassword) {
                    echo '<p>hasła nie są takie same, konto nie zostało dodane</p>';
                } else {
                    $hashedPasswd = sha1($password);
                    $setUser = "INSERT INTO uzytkownicy VALUES(NULL, '$login', '$hashedPasswd');";
                    $conn->query($setUser);
                    echo '<p>Konto zostało dodane</p>';
                }

                $conn->close();
            }
        ?>
    </article>
    <main>
        <h2>Zaprzaszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych co chcą kupić psa</li>
            <li>tych co lubią psy</li>
        </ol>
        <a href="./regulamin.html">Przeczytaj regulamin forum</a>
    </main>
    <footer>
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>