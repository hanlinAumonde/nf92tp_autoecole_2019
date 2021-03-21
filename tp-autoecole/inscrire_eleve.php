<html>
<head>
  <title>page de saisir</title>
  <link href="1.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h2>
<?php
$dbhost = 'tuxa.sme.utc';
$dbuser = 'nf92a153';
$dbpass = 'zq2mKmQR';
$dbname = 'nf92a153';
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
$se=$_POST['choixseance'];
$ele=$_POST['choixeleve'];
$query1 = "SELECT COUNT(ideleve), idseance FROM inscription WHERE idseance=$se";
$result1 = mysqli_query($connect, $query1);
assert($result1);
while($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)){
    $effectif = $row1[0];}
$query2 = "SELECT * FROM inscription WHERE ideleve=$ele AND idseance=$se";
$result2 = mysqli_query($connect, $query2);
assert($result2);
$co2 = mysqli_num_rows($result2);
  if($co2==0){
    $query3 = "SELECT * FROM seances WHERE idseance=$se AND $effectif<EffMax";
    $result3 = mysqli_query($connect, $query3);
    assert($result3);
    $co3 = mysqli_num_rows($result3);
      if($co3==1){
       $query="INSERT into inscription(idseance, ideleve) values("."'$se'".","."'$ele'".")";
       echo "<br>$query<br>";
       $result=mysqli_query($connect,$query);
       echo "<br><br>L'élève est inscrit à la séance.";
     }
     else{
         echo "<br><br>Il y a assez d'etudiants qui ont inscrirt dans cette seance.<br>";
     }
     }
  else{
     echo "<br><br>L'élève est déja inscrit à la séance.<br>";
     }
mysqli_close($connect);
?>
</h2>
</body>
</html>
