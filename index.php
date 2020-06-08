<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ProjetX</title>
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

    <main id="main " role="main" class="main accueil">
      <h1>ProjetX</h1>
      <h2>La course aux points</h2>
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
        <!-- Affichage du tableau des valeurs -->
        <table border=1>

          <?php
          foreach ($resultat as $key => $value) {
            echo "<tr><td>" . $value['nom'] . " " . $value['prenom'] . "</td><td>" . $value['points'] . "pts</td><tr>";
          }
          ?>

        </table>

      <?php
      } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
      }

      ?>

      <a href="administration.php">Page admin</a>
    </main>
  </div>

</body>

</html>