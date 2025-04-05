<?php
include "connexion.php";

$sql = "SELECT e.id_etudiant, e.nom, e.prenom, c.nom_cours, i.date_inscription, i.id_inscription, c.id_cours
        FROM etudiant e
        LEFT JOIN inscription i ON e.id_etudiant = i.id_etudiant
        LEFT JOIN cours c ON i.id_cours = c.id_cours";

$stmt = $pdo->query($sql);
$inscriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Étudiants et leurs Cours</title>
    <!-- Lien vers la feuille de style Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Liste des étudiants et leurs cours</h2>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Cours</th>
                <th>Date d'inscription</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inscriptions as $inscription) : ?>
                <tr>
                    <td><?= htmlspecialchars($inscription['nom']) ?></td>
                    <td><?= htmlspecialchars($inscription['prenom']) ?></td>
                    <td><?= !empty($inscription['nom_cours']) ? htmlspecialchars($inscription['nom_cours']) : '<em>Aucun</em>' ?></td>
                    <td><?= !empty($inscription['date_inscription']) ? htmlspecialchars($inscription['date_inscription']) : '<em>--</em>' ?></td>
                    <td>
                        <?php if (!empty($inscription['id_inscription'])) : ?>
                            <form method="POST" action="supprimer_inscription.php" style="display:inline;">
                                <input type="hidden" name="id_inscription" value="<?= $inscription['id_inscription'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?');">Supprimer</button>
                            </form>
                        <?php endif; ?>

                        <?php if (!empty($inscription['id_cours'])) : ?>
                            <form method="GET" action="modifier_etudiant.php" style="display:inline;">
                                <input type="hidden" name="id_etudiant" value="<?= $inscription['id_etudiant'] ?>">
                                <input type="hidden" name="id_cours" value="<?= $inscription['id_cours'] ?>">
                                <button type="submit" class="btn btn-warning btn-sm">Modifier</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Ajouter les scripts de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

