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
date_default_timezone_set('Europe/Paris');
$date = date("Y-m-d");
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$naissance = $_POST['naissance'];
$choix = $_POST['choix'];
if($choix==0){
    $query="INSERT INTO eleves VALUES (NULL, '$nom', '$prenom', '$naissance', '$date')";
    mysqli_query($connect, $query);
    echo "<br>".$nom."a été ajouté(e) à la bdd comme un nouveau élève.<br><br>";
    echo "<table><tr><td>Nom :</td>";
    echo "<td>".$nom."</td></tr>";
    echo "<tr><td>Prénom :</td>";
    echo "<td>".$prenom."</td></tr>";
    echo "<tr><td>Date de naissance :</td>";
    echo "<td>".$naissance."</td></tr>";
    echo "<tr><td>Date d'inscription :</td>";
    echo "<td>".$date."</td></tr></table>";
}
else{
    echo "<br><br>L'enregistrement du nouvel élève est annulé.";
}
 ?>
</h2>
</body>
</html>
