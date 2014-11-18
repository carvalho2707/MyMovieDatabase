
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Resultados da Procura</title>
</head>


<body style="background-image:url(http://web.ist.utl.pt/ist170438/aux/fundo.jpg)">



<center>
<font size="5" color = "blue" ><b>Resultados da Procura</b></font>
		<br>
		<br>
		<form action="http://web.ist.utl.pt/ist170438/aux/mymdb.php">
			<input type="submit" class="css_btn_class3" value="Inicio">
		</form>
		<br>
		<br>
			<?php	
				$options = $_REQUEST['lista'];
				try
				{
					$host = "xxxxx";
					$user ="xxxxx";
					$password = "xxxxx";
					$dbname = $user;
					$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$pos = 0;
					echo("<table border=\"5\" bordercolor=\"eeeeee\" cellspacing=\"5\">\n");
					foreach($options as $row)
					{
						$nomeG=$row;
						$sql = "SELECT * FROM Filme RIGHT JOIN TipoFilme on TipoFilme.nomeF = Filme.nomeF WHERE TipoFilme.nomeG = '$nomeG';";
						$result = $db->query($sql);
						foreach($result as $row2)
						{
							if($pos == 0)
								echo '<tr>';
							if($pos < 6){
								echo '<td><a href="infoDetalhada.php?nomeF='.$row2['nomeF'].'" target="_self"><img 
							src="'.$row2['idImdb'].'" 
							width="250" height="375" 
							alt="'.$row2['nomeF'].'" 
						/></a>
						</td>';
								$pos++;
							}
							if($pos == 6){
								echo '</tr>';
								$pos = 0;
							}
						}
					}
					if($pos < 6)
					echo '</tr>';
					echo("</table>\n");
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