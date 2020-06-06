<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'utilisateur</title>
</head>

<body>
    <h2>Création d'un utilisateur</h2>
    <form action="form.php" method="post">
        <label>Nom</label>
        <input type="text" name="nom"></input><br>
        <label>Prénom</label>
        <input type="text" name="prenom"></input><br>
        <label>Date de naissance</label>
        <input type="date" name="datenaissance"></input><br>
        <label>Pseudo</label>
        <input type="text" name="pseudo"></input><br>
        <label>Email</label>
        <input type="text" name="email"></input><br>
        <label>Points</label>
        <input type="number" name="points" value=0></input><br>
        <label>Rôle</label>
        <select name="role">
            <option>Stagiaire</option>
            <option>Formateur</option>
            <option>Autre</option>
        </select><br>
        <p>L'utilisateur possède t'il une immunité?</p>
        <div>
            <input type="radio" name="immunite" value="Oui">
            <label>Oui</label>
        </div>

        <div>
            <input type="radio" name="immunite" value="Non" checked>
            <label>Non</label>
        </div>


        <input type="submit" value="Ajouter un utilisateur"></input>
    </form>

<h2>Ajout de points</h2>
    <?php
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=ProjetX;port=3308',
            'root',
            '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*Sélectionne toutes les valeurs dans la table users*/
        $sth = $pdo->prepare("SELECT * FROM users");
        $sth->execute();


        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);


    ?>
        <table border=1>
            <?php
            foreach ($resultat as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php echo $value['pseudo']?>
                    </td>
                    <td>
                        <form action="updatepoint.php" method="post">
                            <input type="hidden" name="user_id" value=<?php echo $value['id']?>>
                            <input type="number" name="points" value="<?php echo $value['points']?>">
                            <input type="submit" value="Appliquer">
                        </form>
                    </td>
                    <td>

                    </td>
                </tr>
            <?php 
            }
            ?>
        </table>
    <?php
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }


    ?>

<a href="index.php">Retour à la page d'accueil</a>

</body>

</html>