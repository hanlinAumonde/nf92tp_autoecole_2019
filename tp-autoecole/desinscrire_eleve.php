<html>
<head>
<link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h1>DESINSCRIRE</h1>
    <h2>
      <?php
      $dbhost = 'tuxa.sme.utc';
      $dbuser = 'nf92a153';
      $dbpass = 'zq2mKmQR';
      $dbname = 'nf92a153';
      $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
      $eleve = $_POST['menuChoixEleve'];
      $seance = $_POST['menuChoixSeance'];
      $query = "DELETE FROM inscription WHERE idseance=$seance AND ideleve=$eleve";
      $result = mysqli_query($connect, $query);
      echo "<br><br>L'élève a été désinscrit de cette séance.";
      mysqli_close($connect);
      ?>
     </h2>
  </body>
</html>
