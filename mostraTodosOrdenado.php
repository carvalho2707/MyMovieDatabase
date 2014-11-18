
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
		<form action="http://web.ist.utl.pt/ist170438/aux/mostraTodosCapas.php">
			<input type="submit" class="css_btn_class3" value="Mostrar Capas">
		</form>
		<form action="http://web.ist.utl.pt/ist170438/aux/mymdb.php">
			<input type="submit" class="css_btn_class3" value="Inicio">
		</form>
		<br>
		<?php
				try
				{
				session_start();
				//IF THE FLAG HASN'T BEEN SET YET, SET THE DEFAULT
				if(empty($_GET['sort'])) {
					$_GET['sort'] = 'nomeF';
					$_SESSION['ordenacao'] = 'nomeF DESC';
				}
				
				
				//FIGURE OUT HOW TO SORT THE TABLE
				switch($_GET['sort']) {
					case 'nomeF':
						if ($_SESSION['ordenacao'] == 'nomeF ASC'){
							$_SESSION['ordenacao'] = 'nomeF DESC';
						}
						else{
							$_SESSION['ordenacao'] = 'nomeF ASC';
						}
						break;
					 case "classificacao":
						if ($_SESSION['ordenacao'] == 'classificacao ASC'){
							$_SESSION['ordenacao'] = 'classificacao DESC';
						}
						else{
							$_SESSION['ordenacao'] = 'classificacao ASC';
						}
						break;
					  case "ano":
						if ($_SESSION['ordenacao'] == 'ano ASC'){
							$_SESSION['ordenacao'] = 'ano DESC';
						}
						else{
							$_SESSION['ordenacao'] = 'ano ASC';
						}
						break;
					case "dataSacado":
						if ($_SESSION['ordenacao'] == 'dataSacado ASC'){
							$_SESSION['ordenacao'] = 'dataSacado DESC';
						}
						else{
							$_SESSION['ordenacao'] = 'dataSacado ASC';
						}
						break;
					 default:
							$_SESSION['ordenacao'] = 'nomeF ASC';
							break;
				}
				$host = "xxxxx";
				$user ="xxxxx";
				$password = "xxxxx";
				$dbname = $user;
				$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$ordenacao = $_SESSION['ordenacao'];
				$sql = "SELECT * FROM Filme ORDER BY $ordenacao;";
				echo("<table border=\"5\" bordercolor=\"eeeeee\" cellspacing=\"5\">\n");
				echo("<tr><th><a href=\"mostraTodosOrdenado.php?sort=nomeF\">Nome Filme</a></th><th><a href=\"mostraTodosOrdenado.php?sort=classificacao\">Classificacao</a></th><th><a href=\"mostraTodosOrdenado.php?sort=ano\">Ano</a><th><a href=\"mostraTodosOrdenado.php?sort=dataSacado\">Data Adicionado</a></th><th>Quem Viu</th><th>Imagem</th><th>Adicionar</th>");
				$result = $db->query($sql);
				foreach($result as $row)
				{
				$exp = "";
				$tiago="Tiago";
				$filipe="Filipe";
				$sebastiao="Sebastiao";
				$jota="Jota";
				$ines="Ines";
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
				$stmt2->bindParam(':nomePessoa', $sebastiao, PDO::PARAM_INT);
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
				if($count == 1)
					$exp .= "T ";
				if($count1 == 1)
					$exp .= "F ";
				if($count2 == 1)
					$exp .= "S ";
				if($count3 == 1)
					$exp .= "J ";
				if($count4 == 1)
					$exp .= "I ";
				echo("<tr>\n");
				echo("<td>{$row['nomeF']}</td>\n");
				echo("<td>{$row['classificacao']}</td>\n");
				echo("<td>{$row['ano']}</td>\n");
				echo("<td>{$row['dataSacado']}</td>\n");
				echo("<td>'$exp'</td>\n");
				echo '<td>
					<a href="infoDetalhada.php?nomeF='.$row['nomeF'].'" target="_self">
						<img 
							src="'.$row['idImdb'].'" 
							width="100" height="130" 
							alt="'.$row['nomeF'].'" 
						/>
					</a></td>';
				echo("<td><a href=\"pedeDadosLogin.php?nomeF={$row['nomeF']}\">Adicionar Filme</a></td>\n");
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