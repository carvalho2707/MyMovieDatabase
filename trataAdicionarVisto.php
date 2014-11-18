<html>
	<body style="background-image:url(http://web.ist.utl.pt/ist170438/aux/fundo.jpg)">
	<center>
		<?php
			session_start();
			$nomeP = $_REQUEST['nomeP'];
			$nomeF = $_SESSION['nomeF'];
			try
			{
				$host = "xxxxx";
				$user ="xxxxx";
				$password = "xxxxx";
				$dbname = $user;
				$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO FilmesVistos VALUES ('$nomeP','$nomeF', true);";
				$db->query($sql);
				echo("<p>$sql</p>");
				$db = null;
			}
			catch (PDOException $e)
			{
				echo("<p>ERROR: {$e->getMessage()}</p>");
			}
			echo "<br>Filme Adicionado aos Vistos!<br>";
		?>
		<a href="mymdb.php"> Voltar atras</a>
	</center>
	</body>
</html>