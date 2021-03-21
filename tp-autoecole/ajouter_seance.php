<html>
<head>
  <title>page de saisir</title>
  <link href="1.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h2>
    <?php
    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a153';
    $dbpass = 'zq2mKmQR';
    $dbname = 'nf92a153';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $dates=$_POST['dateseance'];
    $eff=$_POST['effmax'];
    $theme=$_POST['menuChoixTheme'];
    $query1 = "SELECT * FROM seances WHERE DateSeance='$dates' AND idtheme=$theme";
    $result1 = mysqli_query($connect, $query1);
    $compteur = mysqli_num_rows($result1);
    if($compteur==0){
    $query="INSERT into seances values (null,"."'$dates'".","."'$eff'".","."'$theme'".")";
    echo "<br>$query<br>";
    $result  =  mysqli_query($connect,  $query);
    echo "<br><br>La séance a été ajoutée.<br><br>";
    }
    else{
        echo "<br><br>Il y a déja une séance le ".$dates." sur le thème ".$theme." !<br><br>";
      }
    mysqli_close($connect);
   ?>
 </h2>
  </body>
</html>
