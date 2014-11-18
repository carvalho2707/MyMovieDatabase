<!--Alterar para ser tipo checkbox-->
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Adiconar Pratos a Encomenda</title>
</head>


<body style="background-image:url(http://web.ist.utl.pt/ist170438/aux/fundo.jpg)">



<center>
<font size="5" color = "blue" ><b>Menu Escolher Genero a Procurar</b></font>
		<br>
		<form action="http://web.ist.utl.pt/ist170438/aux/mymdb.php">
			<input type="submit" class="css_btn_class3" value="Inicio">
		</form>
		<br><h3>Escolha qual o genero a Procurar</h3>
			<?php
					try
					{
					$host = "db.ist.utl.pt";
					$user ="ist170438";
					$password = "zkkg9305";
					$dbname = $user;
					$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT * FROM Genero ;";
					$options = array();
					foreach($db->query($sql) as $row) {
						$options[$row['nomeG']] = '<input type="checkbox" name="lista[]" value="'.$row['nomeG'].'" />';
					}
					$db = null;
					}
					catch (PDOException $e)
					{
					echo("<p>ERROR: {$e->getMessage()}</p>");
					}
			?>
		<form action="mostraResultadosProcuraGenero.php" method="POST">
				<?php
					if (!$options) echo ' Nao ha Generos na BD';
					else foreach ($options as $name => $input) echo '<label>'.$input.' '.$name.'</label><br />';
				?>
				<?php if(!$options): ?>
					<button type="submit" class="css_btn_class3" disabled>Procurar</button>
				<?php endif; ?>
				<?php if(sizeof($options)> 0): ?>
					<button type="submit" class="css_btn_class3">Procurar</button>
				<?php endif; ?>
			</form>
		<br>
</center>    


</body>
</html>