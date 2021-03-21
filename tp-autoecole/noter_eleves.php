<html>
<head>
  <title>page de saisir</title>
  <link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
<h1>    </h1>
<h2>
<?php
$dbhost = 'tuxa.sme.utc';
$dbuser = 'nf92a153';
$dbpass = 'zq2mKmQR';
$dbname = 'nf92a153';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
$seance = $_POST['menuChoixSeance'];
$i=0;
$query1 = "SELECT * FROM eleves, inscription  WHERE inscription.ideleve=eleves.ideleve AND inscription.idseance=$seance";
$result1 = mysqli_query($connect, $query1);
assert($result1);
while($row1 = mysqli_fetch_array($result1)){
    $note = $_POST["note".$i];
    if (empty($note)){
      $note = -1;
    }
    $eleve=$row1[0];
    $query2="UPDATE inscription SET note=$note WHERE inscription.idseance=$seance AND inscription.ideleve=$eleve";
    $result2= mysqli_query($connect, $query2);
    $i=$i+1;
  }
$query="SELECT inscription.ideleve, nom, prenom, note FROM inscription, eleves WHERE inscription.idseance=$seance AND inscription.ideleve=eleves.ideleve"
$result=mysqli_query($connect, $query);
assert($result);
$query2 = "SELECT * FROM seances where seances.idseance=$seance";
$result2=mysqli_query($connect, $query2);
assert($result2);
$row2=mysqli_fetch_array($result2);
echo "<table border='2'>";
echo "seance du ".$row2[1];
echo "<tr><td>nom </td><td>prenom </td><td>Notes </td></tr>";
while($row=mysqli_fetch_array($result)){
  echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
  }
echo "</table>";
mysqli_close($connect);
?>
</h2>
<p>ATTENTION:si le nombre de faute est -1,<br>
  c'est-à-dire que le nombre de faute n'est pas encore noté.</p>
</body>
</html>
