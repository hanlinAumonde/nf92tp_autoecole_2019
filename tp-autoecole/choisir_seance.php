<html>
<head>
<link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h1>Choisir un seance</h1>
    <h2>
      <?php
      $dbhost = 'tuxa.sme.utc';
      $dbuser = 'nf92a153';
      $dbpass = 'zq2mKmQR';
      $dbname = 'nf92a153';
      $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
      date_default_timezone_set('Europe/Paris');
      $date = date("Y-m-d");
      $eleve=$_POST["menuChoixEleve"];
      $query = "SELECT inscription.idseance, DateSeance, nom FROM inscription, seances, themes WHERE ideleve=$eleve AND inscription.idseance=seances.idseance AND seances.idtheme=themes.idtheme AND seances.DateSeance>='$date'";
      $result = mysqli_query($connect, $query);
      $compteur = mysqli_num_rows($result);
      if($compteur==0){
          echo "<br>Cet élève est inscrit à aucune séance après.<br>";
          echo "=>La procédure de désincription est annulée.";
      }
      else{
        echo "<form method='POST' action='desinscrire_eleve.php'>";
        echo "<table>";
        echo "<tr><td>Séance :</td><td>";
        echo "<select name='menuChoixSeance' size='1'>";
        while($row=mysqli_fetch_array($result)){
        echo "<option value='$row[0]'>".$row[1].":".$row[2]."</option>";
        }
        echo "</select></td></tr>";
        echo "<input type='hidden' name='menuChoixEleve' value='$eleve'>";
        echo "<tr><td><input type='submit' value='Choisir séance'></td></tr>";
        echo "</table>";
        echo "</form>";
      }
       ?>
     </h2>
  </body>
</html>
