
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Todos os Filmes</title>
</head>


<body  style="background-image:url(http://web.ist.utl.pt/ist170438/aux/fundo.jpg)">



<center style="font-family:Comic Sans MS">
<font size="5" color = "blue" ><b>Todos os Filmes</b></font>
		<br>
		<br>
		<form action="http://web.ist.utl.pt/ist170438/aux/mymdb.php">
			<input type="submit" class="css_btn_class3" value="Inicio">
		</form>
		<br>
		<map name="mapaimagem">
		<area shape="rect" coords="0,0,82,126" href="infoDetalhada.php" alt="Sun">
		</map>
		<?php
				try
				{
				$nomeF= $_REQUEST['nomeF'];
				$host = "db.ist.utl.pt";
				$user ="ist170438";
				$password = "zkkg9305";
				$dbname = $user;
				$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$ordenacao = $_SESSION['ordenacao'];
				$sql = "SELECT * FROM Filme where Filme.nomeF='$nomeF';";
				echo("<table border=\"5\" bordercolor=\"eeeeee\" cellspacing=\"5\">\n");
				$result = $db->query($sql);
				foreach($result as $row)
				{
				$tiago="Tiago";
				$filipe="Filipe";
				$sebastiao="Sebastiao";
				$jota="Jota";
				$stmt = $db->prepare('SELECT * FROM FilmesVistos F WHERE F.nomeP = :nomePessoa and F.nomeF=:nomeFilme ');
				$stmt->bindParam(':nomePessoa', $tiago, PDO::PARAM_INT);
				$stmt->bindParam(':nomeFilme', $row[nomeF], PDO::PARAM_INT);				// <-- Automatically sanitized by PDO
				$stmt->execute();
				$count = $stmt->rowCount();
				
				$stmt1 = $db->prepare('SELECT * FROM FilmesVistos F WHERE F.nomeP = :nomePessoa and F.nomeF=:nomeFilme ');
				$stmt1->bindParam(':nomePessoa', $filipe, PDO::PARAM_INT);
				$stmt1->bindParam(':nomeFilme', $row[nomeF], PDO::PARAM_INT);				// <-- Automatically sanitized by PDO
				$stmt1->execute();
				$count1 = $stmt1->rowCount();
				
				$stmt2 = $db->prepare('SELECT * FROM FilmesVistos F WHERE F.nomeP = :nomePessoa and F.nomeF=:nomeFilme ');
				$stmt2->bindParam(':nomePessoa', $pai, PDO::PARAM_INT);
				$stmt2->bindParam(':nomeFilme', $row[nomeF], PDO::PARAM_INT);				// <-- Automatically sanitized by PDO
				$stmt2->execute();
				$count2 = $stmt2->rowCount();
				
				$stmt3 = $db->prepare('SELECT * FROM FilmesVistos F WHERE F.nomeP = :nomePessoa and F.nomeF=:nomeFilme ');
				$stmt3->bindParam(':nomePessoa', $jota, PDO::PARAM_INT);
				$stmt3->bindParam(':nomeFilme', $row[nomeF], PDO::PARAM_INT);				// <-- Automatically sanitized by PDO
				$stmt3->execute();
				$count3 = $stmt3->rowCount();
			
				$stmt4 = $db->prepare('SELECT * FROM FilmesVistos F WHERE F.nomeP = :nomePessoa and F.nomeF=:nomeFilme ');
				$stmt4->bindParam(':nomePessoa', $ines, PDO::PARAM_INT);
				$stmt4->bindParam(':nomeFilme', $row[nomeF], PDO::PARAM_INT);				// <-- Automatically sanitized by PDO
				$stmt4->execute();
				$count4 = $stmt4->rowCount();
				
				echo("<tr>\n");
				echo '<td align="center">
						<img 
							src="'.$row['idImdb'].'" 
							width="375 height="562.5" 
							alt="'.$row['nomeF'].'" 
						/></td>';
				echo("<tr><td>{$row['nomeF']}</tr></td>\n");
				echo("<tr><td>{$row['classificacao']}</tr></td>\n");
				echo("<tr><td>Estreia - >{$row['ano']}</tr></td>\n");
				echo("<tr><td>Data Sacado -> {$row['dataSacado']}</tr></td>\n");
				if($count == 1)
					echo("<tr><td>O Tiago ja viu</tr></td>\n");
				else echo("<tr><td>O Tiago ainda nao viu</tr></td>\n");
				if($count1 == 1)
					echo("<tr><td>O Filipe ja viu</tr></td>\n");
				else echo("<tr><td>O Filipe ainda nao viu</tr></td>\n");
				if($count2 == 1)
					echo("<tr><td>O Sebastiao ja viu</tr></td>\n");
				else echo("<tr><td>O Sebastiao ainda nao viu</tr></td>\n");
				if($count3 == 1)
					echo("<tr><td>O Jota ja viu</tr></td>\n");
				else echo("<tr><td>O Jota ainda nao viu</tr></td>\n");
				if($count4 == 1)
					echo("<tr><td>A ines ja viu</tr></td>\n");
				else echo("<tr><td>A ines ainda nao viu</tr></td>\n");
				
				
				echo("<tr><td>{$row['sinopse']}</tr></td>\n");
				echo("</tr>\n");
				}
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