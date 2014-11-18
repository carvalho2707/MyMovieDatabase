
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Adicionar Filme</title>
</head>


<body style="background-image:url(http://web.ist.utl.pt/ist170438/aux/fundo.jpg)">
<center>
<font size="5" color = "blue" ><b>Login</b></font>
		<br>
		<form action="http://web.ist.utl.pt/ist170438/aux/mymdb.php">
			<input type="submit" class="css_btn_class3" value="Inicio">
		</form>
		<br>
		<br>Introduza os seus dados
		<br><br>

        <form action="trataAdicionarVisto.php" method="POST">
		*Qual o seu nome?:
			<select name="nomeP">
			<?php
					try
					{
					$host = "xxxxx";
					$user ="xxxxx";
					$password = "xxxxx";
					$dbname = $user;
					$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "SELECT nomeP FROM Pessoa ;";
					$result = $db->query($sql);
					foreach($result as $row)
					{
					$nomeP = $row['nomeP'];
					echo("<option value=\"$nomeP\">$nomeP</option>\n");
					}
					session_start();
					$_SESSION['nomeF'] = $_REQUEST['nomeF'];
					$db = null;
					}
					catch (PDOException $e)
					{
					echo("<p>ERROR: {$e->getMessage()}</p>");
					}
			?>
			</select>
		<br>
		<br>
		<input type="submit" class="css_btn_class3" value="Adicionar">
	    </form>
		<br>
		

		
</center>    


</body>
</html>