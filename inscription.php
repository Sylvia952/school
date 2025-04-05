<?php
include "connexion.php";


$id_etudiant = isset($_GET['id_etudiant']) ? $_GET['id_etudiant'] : null;


$sql = "SELECT * FROM cours";
$stmt = $pdo->query($sql);
$cours = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_etudiant']) && isset($_POST['id_cours'])) {
    $id_etudiant = $_POST['id_etudiant'];
    $id_cours = $_POST['id_cours'];


    $sql = "INSERT INTO inscription (id_etudiant, id_cours, date_inscription) VALUES (?, ?, NOW())";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id_etudiant, $id_cours])) {

        header("Location: etudiant_cours.php?id_etudiant=" . $id_etudiant);
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Cours</title>
    <!-- Lien vers la feuille de style Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Liste des cours disponibles</h2>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>Nom du Cours</th>
                <th>Description</th>
                <th>Inscription</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cours as $coursItem) : ?>
                <tr>
                    <td><?= htmlspecialchars($coursItem['nom_cours']) ?></td>
                    <td><?= htmlspecialchars($coursItem['description']) ?></td>
                    <td>
                        <form method="POST" action="cours.php?id_etudiant=<?= $id_etudiant ?>">
                            <input type="hidden" name="id_cours" value="<?= $coursItem['id_cours'] ?>">
                            <input type="hidden" name="id_etudiant" value="<?= $id_etudiant ?>">
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="supprimer_cours.php" style="display:inline;">
                            <input type="hidden" name="id_cours" value="<?= $coursItem['id_cours'] ?>">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?');">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="ajt_cours.php" class="btn btn-success">Ajouter un cours</a>
</div>

<!-- Ajouter les scripts de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>














