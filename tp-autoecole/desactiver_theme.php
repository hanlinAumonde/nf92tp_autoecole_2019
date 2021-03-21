<html>
<head>
<link href="1.css" rel="stylesheet" type="text/css">
</head>
<body>
 <h1>  </h1>
 <h2>
   <?php
   $dbhost = 'tuxa.sme.utc';
   $dbuser = 'nf92a153';
   $dbpass = 'zq2mKmQR';
   $dbname = 'nf92a153';
   $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
   $theme=$_POST["menuChoixTheme"];
   $query="UPDATE themes SET supprime=1 where themes.idtheme=$theme";
   $result = mysqli_query($connect, $query);
   echo "<br>$query<br>";
   echo "<br>Le theme est déjà supprimé.<br>"
    ?>
  </h2>
</body>
</html>
