<html>
<head>
<link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h1>Choisir un seance pour le supprimer</h1>
    <h2>
      <?php
      $dbhost = 'tuxa.sme.utc';
      $dbuser = 'nf92a153';
      $dbpass = 'zq2mKmQR';
      $dbname = 'nf92a153';
      $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
      date_default_timezone_set('Europe/Paris');
      $date = date("Y-m-d");
      $query = "SELECT idseance, DateSeance, nom FROM seances, themes WHERE seances.DateSeance>='$date' AND seances.idtheme=themes.idtheme";
      $result = mysqli_query($connect, $query);
      $compteur = mysqli_num_rows($result);
      if($compteur==0){
          echo "<br>Il n'y a pas de séance après.<br>";
      }
      else{
        echo "<form method='POST' action='supprimer_seance.php'>";
        echo "<table>";
        echo "<tr><td>Séance :</td><td>";
        echo "<select name='menuChoixSeance' size='1'>";
        while($row=mysqli_fetch_array($result)){
        echo "<option value='$row[0]'>".$row[1].":".$row[2]."</option>";
        }
        echo "</select></td></tr>";
        echo "<tr><td><input type='submit' value='Supprimer séance'></td></tr>";
        echo "</table>";
        echo "</form>";
      }
      ?>
     </h2>
  </body>
</html>
