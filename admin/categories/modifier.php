<?php
session_start();

// Vérifie si les données sont envoyées via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $id = $_POST['idc'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $createur = $_SESSION['id'];
    $date_modification = date('Y-m-d'); 

    // Inclusion du fichier de connexion
    include "../../inc/function.php";
    $conn = connect();

    // Préparation de la requête SQL
    $requette = "UPDATE categories SET nom='$nom', description='$description', date_modification='$date_modification' WHERE id='$id'";

    // Exécution de la requête
    $resultat = $conn->query($requette);
    if ($resultat) {
        header('location:liste.php?modifier=ok');
        exit(); // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la modification de la catégorie.";
    }
} else {
    echo "Erreur : méthode de requête invalide.";
}
?>
