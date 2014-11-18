<html>
	<body style="background-image:url(http://web.ist.utl.pt/ist170438/aux/fundo.jpg)">
	<center>
		<?php
			$nomeF = $_REQUEST['nomeF'];
			try
			{
				$host = "xxxxx";
				$user ="xxxxx";
				$password = "xxxxx";
				$dbname = $user;
				$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				foreach($options as $name){
					$nomeF = $name;
					$sql = "Delete From FilmesVistos FV where FVG.nomeF='$nomeF';";
					$sql .= "Delete From Genero G where G.nomeF='$nomeF';";
					$sql .= "Delete FROM Filme F where F.nomeF= '$nomeF';";
					echo("<p>$sql</p>");
					$db->query($sql);
				};
				$db = null;
			}
			catch (PDOException $e)
			{
				echo("<p>ERROR: {$e->getMessage()}</p>");
			}
			echo "<br>Filme Eliminado!<br>";
		?>
		<a href="mymdb.php"> Voltar atras</a>
	</center>
	</body>
</html>