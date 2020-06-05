<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=ProjetX;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaissance = $_POST['datenaissance'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $points = $_POST['points'];
    $role = $_POST['role'];
    $immunite = $_POST['immunite'];
 
   //$sth appartient à la classe PDOStatement
    $sth = $pdo->prepare("
        INSERT INTO Users(nom,prenom,dateNaissance,pseudo,email,points,role,immunite)
        VALUES (:nom, :prenom, :dateNaissance, :pseudo, :email, :points, :role, :immunite)
    ");
    $sth->execute(array(
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':dateNaissance' => $dateNaissance,
                        ':pseudo' => $pseudo,
                        ':email' => $email,
                        ':points' => $points,
                        ':role' => $role,
                        ':immunite' => $immunite));
    echo "$prenom $nom dit $pseudo a été ajouté ";
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

?>