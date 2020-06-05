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
        <p>L'utilisateur pssède t'il une immunité?</p>
        <div>
            <input type="radio" name="immunite" value="Oui" >
            <label>Oui</label>
        </div>

        <div>
            <input type="radio" name="immunite" value="Non" checked>
            <label>Non</label>
        </div>


        <input type="submit" value="Ajouter un utilisateur"></input>
    </form>

</body>

</html>