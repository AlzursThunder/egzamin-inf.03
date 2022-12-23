<?php
    $conn = new mysqli('localhost', 'root', '', 'ee09');
    
    $numerKaretki = $_POST['numer'];
    $pierwszyRatownik = $_POST['pierwszy'];
    $drugiRatownik = $_POST['drugi'];
    $trzeciRatownik = $_POST['trzeci'];
    
    $sqlQuery = "INSERT INTO ratownicy VALUES (NULL, $numerKaretki, '$pierwszyRatownik', '$drugiRatownik', '$trzeciRatownik');";

    $conn->query($sqlQuery);

    echo "Do bazy zostało wysłane zapytanie: $sqlQuery";

    $conn->close();
?>