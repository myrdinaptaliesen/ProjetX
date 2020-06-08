<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'utilisateur</title>
    <link rel="stylesheet" href="css/styles.css" media="all">
</head>
<body>
<div class="website">
  <header class="header" role="banner">
    <nav class="navigation" role="navigation">
      <ul class="navigation-list">
        <li class="navigation-item"><a class="navigation-link" href="index.php">Accueil</a></li>
        <li class="navigation-item"><a class="navigation-link" href="administration.php">Administration</a></li>
        <li class="navigation-item"><a class="navigation-link" href="#">Truc</a></li>
        <li class="navigation-item"><a class="navigation-link" href="#">Machin</a></li>
        <li class="navigation-item"><a class="navigation-link" href="#">Chose</a></li>
      </ul>
    </nav>
  </header>

  <main id="main" role="main" class="main admin">
    <div class="one_half">
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
    </div>
<div class="one_half">
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
</div>
  </main>
</div>

</body>

</html>