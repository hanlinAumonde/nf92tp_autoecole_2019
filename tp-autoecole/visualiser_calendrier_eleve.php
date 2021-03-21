<html>
<head>
<link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h1>Calendrier élève</h1>
    <h2>
      <?php
      $dbhost = 'tuxa.sme.utc';
      $dbuser = 'nf92a153';
      $dbpass = 'zq2mKmQR';
      $dbname = 'nf92a153';
      $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
      $eleve = $_POST['menuChoixEleve'];
      date_default_timezone_set('Europe/Paris');
      $date = date("Y-m-d");
      $query = "SELECT DateSeance, nom FROM inscription, seances, themes WHERE inscription.ideleve=$eleve AND inscription.idseance=seances.idseance AND seances.idtheme=themes.idtheme AND seances.DateSeance>='$date'";
      $result = mysqli_query($connect, $query);
      echo "<table border='2'>";
      echo "<tr><td>Date de la séance</td><td>Thème :</td></tr>";
      while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
      }
      echo "</table>";
      mysqli_close($connect);
       ?>
     </h2>
  </body>
</html>
