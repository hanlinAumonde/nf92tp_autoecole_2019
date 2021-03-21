<html>
<head>
<link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h1>Supprimer</h1>
    <h2>
      <?php
      $dbhost = 'tuxa.sme.utc';
      $dbuser = 'nf92a153';
      $dbpass = 'zq2mKmQR';
      $dbname = 'nf92a153';
      $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
      $seance=$_POST["menuChoixSeance"];
      $result1 = mysqli_query($connect, "DELETE FROM seances WHERE idseance=$seance");
      $result2 = mysqli_query($connect, "DELETE FROM inscription WHERE idseance=$seance");
      echo "<br>RESULTAT:La séance a été supprimée de la BDD.";
      mysqli_close($connect);
      ?>
     </h2>
  </body>
</html>
