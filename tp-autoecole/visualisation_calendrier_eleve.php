<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
  <body>
    <h1>Visualisation ELEVE-SEANCE</h1>
    <h2>
      <?php
      $dbhost = 'tuxa.sme.utc';
      $dbuser = 'nf92a153';
      $dbpass = 'zq2mKmQR';
      $dbname = 'nf92a153';
      $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
      $query = "SELECT * FROM eleves";
      $result = mysqli_query($connect, $query);
      assert($result);
      echo "<form method='POST' action='visualiser_calendreier_eleve.php'>";
      echo "<table border='2'>";
      echo "<tr><td>Choisir un éleve:</td><td>";
      echo "<select name='menuChoixEleve' size='1'>";
      while($row=mysqli_fetch_array($result)){
        echo "<option value='$row[0]'>".$row[1]." ".$row[2]."</option>";
      }
      echo "</select></td></tr>";
      echo "<tr><td><input type='submit' value='Visualiser Calendrier'></td></tr>";
      echo "</table>";
      echo "</form>";
      mysqli_close($connect);
      ?>
  </body>
</html>
