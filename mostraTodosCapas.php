
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Todos os Filmes</title>
</head>


<body style="background-image:url(http://web.ist.utl.pt/ist170438/aux/fundo.jpg)">


<center>
<font size="5" color = "blue" ><b>Todos os Filmes</b></font>
		<br>
		<br>
		<form action="http://web.ist.utl.pt/ist170438/aux/mostraTodosOrdenado.php">
			<input type="submit" class="css_btn_class3" value="Ver Lista">
		</form>
		<form action="http://web.ist.utl.pt/ist170438/aux/mymdb.php">
			<input type="submit" class="css_btn_class3" value="Inicio">
		</form>
		<br>
		<?php
				try
				{
				session_start();
				$host = "xxxxx";
				$user ="xxxxx";
				$password = "xxxxx";
				$dbname = $user;
				$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$ordenacao = $_SESSION['ordenacao'];
				$sql = "SELECT * FROM Filme ORDER BY $ordenacao;";
				$result = $db->query($sql);
				$pos = 0;
				echo '<table>';
				echo("<table border=\"5\" bordercolor=\"eeeeee\" cellspacing=\"5\">\n");
				foreach ($result as $row)
				{
					if($pos == 0)
						echo '<tr>';
					if($pos < 6){
						echo '<td>
						<a href="infoDetalhada.php?nomeF='.$row['nomeF'].'" target="_self"><img 
							src="'.$row['idImdb'].'" 
							width="250" height="375" 
							alt="'.$row['nomeF'].'" 
						/></a>
						</td>';
						$pos++;
					}
					if($pos == 6){
						echo '</tr>';
						$pos = 0;
					}
				}
				if($pos < 6)
					echo '</tr>';
				echo '</table>';
				$db = null;
				}
				catch (PDOException $e)
				{
				echo("<p>ERROR: {$e->getMessage()}</p>");
				}
		?>	
		<br>
		<br>		
		<br>
</center>    


</body>
</html>