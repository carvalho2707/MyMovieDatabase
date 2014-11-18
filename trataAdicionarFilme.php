<html>
<body style="background-image:url(http://web.ist.utl.pt/ist170438/aux/fundo.jpg)">
<center>
<?php
$nomeF= $_REQUEST['nomeF'];
$nomeP= $_REQUEST['nomeP'];
$classificacao= $_REQUEST['classificacao'];
$linkImdb= $_REQUEST['linkImdb'];
$imageLink= $_REQUEST['imageLink'];
$ano= $_REQUEST['ano'];

try
{
$host = "xxxxx";
$user ="xxxxx";
$password = "xxxxx";
$dbname = $user;
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO Filme VALUES ('$nomeF','$nomeP',$classificacao,'$linkImdb','$imageLink',$ano);";
echo("<p>$sql</p>");
$db->query($sql);
$db = null;
}
catch (PDOException $e)
{
echo("<p>ERROR: {$e->getMessage()}</p>");
}
?>
<a href="mymdb.php"> Voltar atras</a>
</center>
</body>
</html>