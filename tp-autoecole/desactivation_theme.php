<html>
<head>
<link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h1>D&eacutesactiver un theme</h1>
    <h2>
      <?php
      $dbhost = 'tuxa.sme.utc';
      $dbuser = 'nf92a153';
      $dbpass = 'zq2mKmQR';
      $dbname = 'nf92a153';
      $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
      $query = "SELECT * FROM themes";
      $result = mysqli_query($connect, $query);
      assert($result);
      echo "<form method='POST' action='desactiver_theme.php'>";
      echo "<table>";
      echo "<tr><td>Choisir un theme pour le supprimer:</td><td>";
      echo "<select name='menuChoixTheme' size='1'>";
      while($row=mysqli_fetch_array($result)){
          echo "<option value='$row[0]'>".$row[1]."</option>";
      }
      echo "</select></td></tr>";
      echo "<tr><td><input type='submit' value='Supprimer'></td></tr>";
      echo "</table>";
      echo "</form>";
      mysqli_close($connect);
       ?>
     </h2>
  </body>
</html>
