<?php
include "connexion.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_cours = $_POST['nom_cours'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO cours (nom_cours, description) VALUES (?, ?)");
    $stmt->execute([$nom_cours, $description]);

    if ($stmt->rowCount() > 0) {
        header("Location: inscription.php?nouveau_cours=true");  
        exit(); 
    } else {
        echo "<p style='color:red;'>Erreur lors de l'ajout du cours.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Ajouter un nouveau cours</h2>


<form method="POST">
    <label for="nom_cours">Nom du Cours :</label>
    <input type="text" name="nom_cours" placeholder="Nom du cours" required>

    <label for="description">Description :</label>
    <textarea name="description" placeholder="Description du cours" required></textarea>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>



