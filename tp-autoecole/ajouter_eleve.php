<html>
<head>
  <title>page de saisir</title>
  <link href="1.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php
    date_default_timezone_set('Europe/Paris');
    $date = date("Y\-m\-d");
    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a153';
    $dbpass = 'zq2mKmQR';
    $dbname = 'nf92a153';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateN = $_POST['date_n'];
    if($dateN<$date){
     $query1 = "SELECT * FROM eleves WHERE nom='$nom' AND prenom='$prenom'";
     $result1 = mysqli_query($connect, $query1);
     $compteur1 = mysqli_num_rows($result1);
         if($compteur1==0){
           $query2 = "INSERT INTO eleves values (NULL,"."'$nom'".","."'$prenom'".","."'$dateN'".","."'$date'".")";
           echo "<br>$query2<br>";
           $result2=mysqli_query($connect,  $query2);
           echo "Bonjour ".$_POST["prenom"];
           echo "<br>";
           echo "vous avez n&eacute le : ".$_POST["date_n"];
           echo "<br>";
           echo "<br> la date d'inscription est : "."'$date'"." <br>";
         }
         else{
             echo "<br><br>Au moins un élève avec le même nom et prénom déja existe <br>
                 dans la bdd. Voulez-vous ajouter un autre élève ? <br><br>";
             echo "<table>";
             echo "<form method='POST' action='valider_eleve.php'>";
             echo "<tr><td>";
             echo "<input type='radio' name='choix' value='0'>Oui<br>";
             echo "<input type='radio' name='choix' value='1'>Non";
             echo "<input type='hidden' name='nom' value='$nom'>";
             echo "<input type='hidden' name='prenom' value='$prenom'>";
             echo "<input type='hidden' name='naissance' value='$dateN'>";
             echo "</td></tr>";
             echo "<tr><td><input type='submit' value='Valider'></td></tr>";
             echo "</form>";
             echo "</table>";
         }
         }
         else{
         echo "<br><br>ERROR!La date de naissance est pas bon!<br>";
         }
   ?>
</body>
</html>
