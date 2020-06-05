<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjetX</title>
</head>
<body>
<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=ProjetX;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    /*Sélectionne toutes les valeurs dans la table users*/
    $sth = $pdo->prepare("SELECT * FROM users");
    $sth->execute();
   
    /*Retourne un tableau associatif pour chaque entrée de notre table
     *avec le nom des colonnes sélectionnées en clefs*/
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
   
    /*print_r permet un affichage lisible des résultats,
     *<pre> rend le tout un peu plus lisible*/
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

?>
</body>
</html>