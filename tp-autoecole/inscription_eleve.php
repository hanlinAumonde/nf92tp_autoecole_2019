<html>
<head>
  <title>page de saisir</title>
  <link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h1>Inscription des eleves</h1>
    <h2>
    <?php
    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a153';
    $dbpass = 'zq2mKmQR';
    $dbname = 'nf92a153';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    assert($connect);
    $connect!=FALSE;
    date_default_timezone_set('Europe/Paris');
    $today = date("Y-m-d");
    echo "<FORM METHOD='POST' ACTION='inscrire_eleve.php' >";
    $result1 = mysqli_query($connect,"SELECT idseance, DateSeance, nom FROM seances, themes WHERE DateSeance>='$today' AND seances.idtheme=themes.idtheme");
    echo "seance:<br>";
    echo "<select name='choixseance' size='1'>";
    while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM))
    {
    echo "<option value='$row1[0]'>seance $row1[0]</option>";
    }
    echo "</select><br>";
    $result2 = mysqli_query($connect,"SELECT * FROM eleves");
    echo "eleve:<br>";
    echo "<select name='choixeleve' size='1'>";
    while ($row2 = mysqli_fetch_array($result2, MYSQL_NUM))
    {
    echo "<option value='$row2[0]'>eleve $row2[0]</option>";
    }
    echo "</select><br>";
    echo "<input type='submit' value='enregistrer'>";
    echo "</form>";
     ?>
    </h2>
  </body>
</html>
