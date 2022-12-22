<?php
    $conn = new mysqli('localhost', 'root', '', 'wedkowanie');
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    
    $sqlQuery = "INSERT INTO karty_wedkarskie VALUES (NULL, '$imie', '$nazwisko', '$adres', NULL, NULL)";

    $conn->query($sqlQuery);

    $conn->close();
?>