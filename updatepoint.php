<?php
if ($_POST != NULL) {


try{
    $pdo = new PDO('mysql:host=localhost;dbname=ProjetX;port=3308','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $user_id = $_POST['user_id'];
    $points = $_POST['points'];

    $sth = $pdo->prepare("
        UPDATE users
        SET points = $points
        WHERE id = $user_id
    ");
    
    $sth->execute();

    //On redirige l'utilisateur vers la page d'administration lorsque la modification est effectuée
    header("location:administration.php");
    
}
     
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
}
?>