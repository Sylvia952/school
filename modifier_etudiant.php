<?php
include "connexion.php";

if (!isset($_GET['id_etudiant'])) {
    die("ID de l'étudiant manquant.");
}

$id_etudiant = $_GET['id_etudiant'];

$stmt = $pdo->prepare("SELECT * FROM etudiant WHERE id_etudiant = ?");
$stmt->execute([$id_etudiant]);
$etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$etudiant) {
    die("Étudiant introuvable.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $stmt = $pdo->prepare("UPDATE etudiant SET nom = ?, prenom = ?, adresse = ?, email = ?, mdp = ? WHERE id_etudiant = ?");
    $stmt->execute([$nom, $prenom, $adresse, $email, $mdp, $id_etudiant]);

    if ($stmt->rowCount() > 0) {
        header("Location: etudiant_cours.php");
        exit();
    } else {
        echo "<p style='color:red;'>Erreur lors de la mise à jour de l'étudiant ou aucune modification n'a été effectuée.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier l'Étudiant</title>
    <!-- Lien vers la feuille de style Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Modifier l'Étudiant</h2>

    <form method="POST" action="modifier_etudiant.php?id_etudiant=<?= $id_etudiant ?>" class="mt-4">
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" value="<?= htmlspecialchars($etudiant['nom']) ?>" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value="<?= htmlspecialchars($etudiant['prenom']) ?>" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" name="adresse" id="adresse" value="<?= htmlspecialchars($etudiant['adresse']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($etudiant['email']) ?>" required>
        </div>

        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" name="mdp" id="mdp" value="<?= htmlspecialchars($etudiant['mdp']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
