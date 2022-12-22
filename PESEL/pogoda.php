<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prognoza pogody Wrocław</title>
	<link rel="stylesheet" href="styl2.css">
</head>
<body>
	<section>
		<header>
			<img src="./logo.png" alt="meteo">
		</header>
		<header>
			<h1>Prognoza dla Wrocławia</h1>
		</header>
		<header>
			<p>maj, 2019 r.</p>
		</header>
	</section>
	<main>
		<table>
			<thead>
				<tr>
					<th>DATA</th>
					<th>TEMPERATURA W NOCY</th>
					<th>TEMPERATURA W DZIEŃ</th>
					<th>OPADY [mm/h]</th>
					<th>CIŚNINIE [hPa]</th>
				</tr>
			</thead>
			<tbody>
				<!-- skrypt -->
				<?php
					$conn = new mysqli('localhost', 'root', '', 'prognoza');
					
					$sqlQuery = "SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy ASC;";
					$result = $conn->query($sqlQuery);
					if ($result->num_rows) {
						while ($row = $result->fetch_assoc()) {
							echo '<tr>';
							echo "<td>".$row['data_prognozy']."</td>";
							echo "<td>".$row['temperatura_noc']."</td>";
							echo "<td>".$row['temperatura_dzien']."</td>";
							echo "<td>".$row['opady']."</td>";
							echo "<td>".$row['cisnienie']."</td>";
							echo '</tr>';
						}
					}
					$conn->close();
				?>
			</tbody>
		</table>
	</main>
	<article>
		<img src="./obraz.jpg" alt="Polska, Wrocław">
	</article>
	<aside>
		<a href="./kwerendy.txt">Pobierz kwerendy</a>
	</aside>
	<footer>
		<p>Stronę wykonał: 00000000000</p>
	</footer>
</body>
</html>