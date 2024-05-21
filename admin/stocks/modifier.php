<?php
session_start();

// Vérifie si les données sont envoyées via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $id = $_POST['idstock'];
    $quantite = $_POST['quantite'];
   
    // Inclusion du fichier de connexion
    include "../../inc/function.php";
    $conn = connect();

    // Préparation de la requête SQL
    $requette = "UPDATE stocks SET quantite='$quantite' WHERE id='$id'";

    // Exécution de la requête
    $resultat = $conn->query($requette);
    if ($resultat) {
        header('Location: liste.php?modifier=ok');
        exit(); // Assurez-vous de terminer l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la modification de la quantité.";
    }
} else {
    echo "Erreur : méthode de requête invalide.";
}
?>
