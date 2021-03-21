<html>
<head>
  <title>page de saisir</title>
  <link href="1.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h1>Saisir le note des eleves</h1>
  <h2>
<?php
$dbhost = 'tuxa.sme.utc';
$dbuser = 'nf92a153';
$dbpass = 'zq2mKmQR';
$dbname = 'nf92a153';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
$seance=$_POST['menuChoixSeance'];
$query = "SELECT * FROM eleves, inscription  WHERE inscription.ideleve=eleves.ideleve AND inscription.idseance=$seance";
$result = mysqli_query($connect, $query);
assert($result);
$compteur = mysqli_num_rows($result);
$query1 = "SELECT * FROM seances where seances.idseance=$seance";
$result1=mysqli_query($connect, $query1);
assert($result1);
$row1=mysqli_fetch_array($result1);
$i=0;
  if($compteur==1){
    echo "<form method='post' action='noter_eleves.php'";
    echo "<table border='2'>";
    echo "seance du ".$row1[1];
    echo "<input type='hidden' name='menuChoixSeance' value='$seance'>";
    echo "<tr><td> nom </td><td> prenom </td><td> Notes </td></tr>";
    while($row=mysqli_fetch_array($result)){
      echo "<tr><td>$row[1]</td><td>$row[2]</td>";
      if($row[7]!=-1){
      echo "<td><input name='note".$i."' type='number' min='0' max='40' value='$row[7]'></td</tr>";}
      else{
        echo "<td><input name='note".$i."' type='number' min='0' max='40'></td</tr>"
      }
      $i = $i + 1;
      }
      echo "</tr>";
      echo "<tr><td><input type='submit' value='Valider'></td></tr>";
      echo "</table>";
      echo "</form>";
  }
  mysqli_close($connect);
 ?>
</h2>
<p>ATTENTION:si le nombre de faute est -1,<br>
  c'est-à-dire que le nombre de faute n'est pas encore noté.</p>
 </body>
 </html>
