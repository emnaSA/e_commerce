<?php 
session_start();

// Vérifiez si l'utilisateur est connecté pour passer la commande
if (!isset($_SESSION['nom']) || !isset($_SESSION['id'])) {
    header('location:../connexion.php');
    exit();
}

// Inclure le fichier de fonction pour la connexion à la base de données
include "../inc/function.php";

// Connexion à la base de données
$conn = connect();
$visiteur = $_SESSION['id'];

// Récupérer les données du formulaire
$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];

// Requête SQL pour sélectionner le prix du produit avec l'id correspondant
$requete = "SELECT prix FROM produit WHERE id=:id_produit";

// Préparation et exécution de la requête avec PDO pour éviter les injections SQL
$stmt = $conn->prepare($requete);
$stmt->execute(['id_produit' => $id_produit]);

// Vérifiez si le produit a été trouvé
if ($stmt->rowCount() > 0) {
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);
    $prix = (float)$produit['prix'];
    $total = $quantite * $prix;

    $date = date("Y-m-d");

    // Vérifiez si le panier n'existe pas encore
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array('visiteur' => $visiteur, 'total' => 0, 'date_creation' => $date, 'produits' => array());
    }

    // Mettre à jour le total du panier
    $_SESSION['panier']['total'] += $total;

    // Ajouter le produit au panier
    $_SESSION['panier']['produits'][] = array(
        'quantite' => $quantite,
        'total' => $total,
        'date_creation' => $date,
        'date_modification' => $date,
        'id_produit' => $id_produit
    );

    // Redirection vers la page du panier
    header('location:../panier.php');
    exit();
} else {
    echo "Produit non trouvé.";
}
?>
