<html>
<head>
  <title>page de saisir</title>
  <link href="1.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h1>Statistique pour les eleves par theme</h1>
  <h2>
<?php
$dbhost = 'tuxa.sme.utc';
$dbuser = 'nf92a153';
$dbpass = 'zq2mKmQR';
$dbname = 'nf92a153';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
date_default_timezone_set('Europe/Paris');
$date = date("Y-m-d");
$query1 = "SELECT themes.idtheme,nom from themes,seances where seances.DateSeance<$date and themes.idtheme=seances.idtheme";
$result1 = mysqli_query($connect,$query1);
assert($result1);
$query2 = "SELECT COUNT(inscription.ideleve),themes.idtheme,EffMax from inscription,themes,seances where themes.idtheme=seances.idtheme and inscription.idseance=seances.idseance and inscription.note>20";
$result2 = mysqli_query($connect,$query2);
assert($result2);
$row2 = mysqli_fetch_array($result2);
echo "<table border='2'>";
echo "<tr><td>Themes</td><td>pourcentage</td></tr>";
while($row1=mysqli_fetch_array($result1)){
echo "<tr><td>Theme ".$row1[0]." ".$row1[1]."</td>";
echo "<td>";
  while($row2[1]==$row1[0]){
    $effele = $row2[0];
    $effmax = $row2[2];
  }
$pourcentage = round((1-($effele/$effmax))*100,2);
echo $pourcentage."%</td></tr>";
}
echo "</table>";
mysqli_close($connect);
?>
</h2>
</body>
</html>
