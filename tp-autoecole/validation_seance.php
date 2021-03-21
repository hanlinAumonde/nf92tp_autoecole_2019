<html>
<head>
  <title>page de saisir</title>
  <link href="1.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h1>Choisir un s&eacuteance</h1>
  <h2>
<?php
$dbhost = 'tuxa.sme.utc';
$dbuser = 'nf92a153';
$dbpass = 'zq2mKmQR';
$dbname = 'nf92a153';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
date_default_timezone_set('Europe/Paris');
$today = date("Y-m-d");
$query = "SELECT idseance, DateSeance, nom FROM seances, themes WHERE DateSeance<='$today' AND seances.idtheme=themes.idtheme";
$result = mysqli_query($connect, $query);
assert($result);
echo "<FORM METHOD='POST' ACTION='valider_seance.php'>";
echo "<select name='menuChoixSeance' size='4'>";
echo "Seance:<br>";
while ($row = mysqli_fetch_array($result, MYSQL_NUM))
{
echo "<option value='$row[0]'>$row[1]</option>";
}
echo "</select><br>";
echo "<input type='submit' value='Valider séance'>";
echo "</form>";
mysqli_close($connect);
 ?>
</h2>
</body>
</html>
