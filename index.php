<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjetX</title>
</head>
<body>
<h1>ProjetX</h1>
<h2>La course aux points</h2>
<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=ProjetX;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    /*Sélectionne toutes les valeurs dans la table users*/
    $sth = $pdo->prepare("SELECT * FROM users");
    $sth->execute();
   

    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
   
    
    ?>
    <table border=1>
    <?php
    foreach ($resultat as $key => $value) {
        echo "<tr><td>".$value['nom']." ".$value['prenom']."</td><td>".$value['points']."pts</td><tr>";
    }
    ?>
    </table>
<?php
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

?>

<a href="administration.php">Page admin</a>
</body>
</html>