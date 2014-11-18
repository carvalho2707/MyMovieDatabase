
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>Adicionar Filme</title>
</head>


<body style="background-image:url(http://web.ist.utl.pt/ist170438/aux/fundo.jpg)">
<center>
<font size="5" color = "blue" ><b>Menu Adicionar Filme</b></font>
		<br>
		<form action="http://web.ist.utl.pt/ist170438/aux/mymdb.php">
			<input type="submit" class="css_btn_class3" value="Inicio">
		</form>
		<br>
		<br>Preencha os seguintes campos para adicionar um filme
		<br><br>

        <form action="trataAdicionarFilme.php" method="POST">
			<p>*Nome Filme <input required type="text" name="nomeF"/></p>
			<p>*Nome Portugues <input required type="text" name="nomeP"/></p>
			<p>*Classificacao <input  type="number" name="classificacao"value="0" min="0"/></p>
			<p>*Link Imdb <input required type="text" name="linkImdb"/></p>
			<p>*URL imagem <input required type="text" name="imageLink"/></p>
			<p>*Ano <input type="number" name="ano" value="0" min="0"/></p>
		<br>
		*CAMPOS OBRIGATORIOS!
		<br>
		<input type="submit" class="css_btn_class3" value="Adicionar">
	    </form>
		<br>
		

		
</center>    


</body>
</html>