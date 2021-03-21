<html>
<head>
<link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h1>Affichage d'eleve:</h1>
    <h2>
      <?php
      $dbhost = 'tuxa.sme.utc';
      $dbuser = 'nf92a153';
      $dbpass = 'zq2mKmQR';
      $dbname = 'nf92a153';
      $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
      $eleve = $_POST['menuChoixEleve'];
      $query = "SELECT * FROM eleves WHERE ideleve=$eleve";
      $result = mysqli_query($connect, $query);
      assert($result);
      echo "<table border='2'>";
      echo "<tr><td>Idetu</td><td>Nom</td><td>Prénom</td><td>Date de naissance</td><td>Date d'inscription</td></tr>";
      while($row=mysqli_fetch_array($result)){
          echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
      }
      echo "</table>";
       ?>
     </h2>
  </body>
</html>
