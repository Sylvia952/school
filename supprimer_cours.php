<?php
include "connexion.php";
if (isset($_POST['id_cours'])) {
    $id_cours = $_POST['id_cours'];
 
    $stmt = $pdo->prepare("DELETE FROM inscription WHERE id_cours = ?");
    $stmt->execute([$id_cours]);

    $stmt = $pdo->prepare("DELETE FROM cours WHERE id_cours = ?");
    $stmt->execute([$id_cours]);

    if ($stmt->rowCount() > 0) {
        echo "<p style='color:green;'>Cours supprimé avec succès !</p>";
        header("Location: inscription.php"); 
        exit();
    } else {
        echo "<p style='color:red;'>Erreur lors de la suppression du cours.</p>";
    }
} else {
    echo "<p style='color:red;'>ID du cours manquant.</p>";
}
?>
