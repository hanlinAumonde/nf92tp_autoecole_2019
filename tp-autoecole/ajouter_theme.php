<html>
<head>
  <title>page de saisir</title>
  <link href="1.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h2>
  <?php
    date_default_timezone_set('Europe/Paris');
    $date = date("Y\-m\-d");
    $dbhost = 'tuxa.sme.utc';
    $dbuser = 'nf92a153';
    $dbpass = 'zq2mKmQR';
    $dbname = 'nf92a153';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $nom = $_POST['nom'];
    $des = $_POST['descriptif'];
    $query1 = "SELECT * from themes where nom='$nom' and supprime=1";
    $result1 = mysqli_query($connect, $query1);
    $co1 = mysqli_num_rows($result1);
    if($co1 == 0){
    $query2 = "SELECT * FROM themes WHERE nom='$nom' AND supprime=0";
    $result2 = mysqli_query($connect, $query2);
    $co2 = mysqli_num_rows($result2);
    if($co2==0){
    $query = "INSERT into themes values (NULL,"."'$nom'".",'0',"."'$des'".")";
    echo "<br>$query<br>";
    $result  =  mysqli_query($connect,  $query);
    echo "<br><br>".$nom." a été ajouté à la base de donnée comme nouveau thème.<br><br>";
    }
    else{
      echo "<br><br>Il y a déja un thème actif avec le même nom.<br>";
    }
    }
    else {
      $query3 = "UPDATE themes SET supprime=0 WHERE nom='$nom'";
      $result3 = mysqli_query($connect, $query3);
      echo "<br>Le theme est reactive<br>";
    }
    mysqli_close($connect);
   ?>
 </h2>
</body>
</html>
