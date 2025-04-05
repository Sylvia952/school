<?php
include "connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_inscription = $_POST['id_inscription'];

    $stmt = $pdo->prepare("DELETE FROM inscription WHERE id_inscription = ?");
    $stmt->execute([$id_inscription]);

    header("Location: etudiant_cours.php");
}
?>
