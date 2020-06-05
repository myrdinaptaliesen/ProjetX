
<?php

//On crée la base de données//
$pdo = new PDO('mysql:host=localhost;port=3308','root',''); 
$sql = "CREATE DATABASE IF NOT EXISTS `ProjetX` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

//Creation de la table users//
try{
    $pdo = new PDO('mysql:host=localhost;dbname=ProjetX;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
 
    $sql = "CREATE TABLE IF NOT EXISTS `projetx`.`users` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `nom` VARCHAR(50) NOT NULL , 
        `prenom` VARCHAR(50) NOT NULL , 
        `dateNaissance` DATE NOT NULL , 
        `pseudo` VARCHAR(50) NOT NULL , 
        `email` VARCHAR(100) NOT NULL , 
        `points` INT(5) NOT NULL , 
        `role` VARCHAR(100) NOT NULL , 
        `immunite` BOOLEAN NOT NULL , 
        `dateInscription` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;";
 
    $pdo->exec($sql);
 
    echo 'Félicitations, la table a bien été créée !';
    
}
  catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
 }


?>
