<html>
<head>
<link href="1.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Saisir les informations d'un s&eacuteance</h1>
<h2>
<?php
$dbhost = 'tuxa.sme.utc';
$dbuser = 'nf92a153';
$dbpass = 'zq2mKmQR';
$dbname = 'nf92a153';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
assert($connect);
$connect!=FALSE;
date_default_timezone_set('Europe/Paris');
$today = date("Y-m-d");
$result = mysqli_query($connect,"SELECT * FROM themes WHERE supprime=0");
echo "<FORM METHOD='POST' ACTION='ajouter_seance.php' >";
echo "<select name='menuChoixTheme' size='4'>";
while ($row = mysqli_fetch_array($result, MYSQL_NUM))
{
echo "<option value='$row[0]'>$row[1]</option>";
}
echo "</select>";
echo "<BR>";
echo "saisir la numéro d'eleve maximum:<br>";
echo "<INPUT type='text' name='effmax'><br>";
echo "saisir la date d'un séance:<br>";
echo "<INPUT type='date' name='dateseance' min=$today><br>";
echo "<INPUT type='submit' value='Enregistrer un séance'>";
echo "</FORM>";
mysqli_close($connect);
?>
</h2>
</body>
</html>
