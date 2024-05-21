<?php
session_start();
include "inc/function.php";
$categories = getAllCategories();

if (!empty($_POST)) {
    // Si le formulaire de recherche est soumis
    $produit = SearchProduits($_POST['search']);
} else {
    // Sinon, récupérer tous les produits
    $produit = getAllProducts();
}

// Initialiser les commandes
$commandes = array();

// Vérifier si le panier existe dans la session
if (isset($_SESSION['panier']) && isset($_SESSION['panier'][3]) && count($_SESSION['panier'][3]) > 0) {
    $commandes = $_SESSION['panier'][3];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<?php include "inc/header.php"; ?>

<div class="container mt-4">
    <h1 class="mb-4">Panier utilisateur</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Produit</th>
                    <th scope="col" class="text-center">Quantité</th>
                    <th scope="col" class="text-center">Total</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($commandes as $index => $commande) {
                    // Vérifier que les indices existent avant de les utiliser
                    $produit = isset($commande[4]) ? $commande[4] : '-';
                    $quantite = isset($commande[0]) ? $commande[0] : 0;
                    $total = isset($commande[1]) ? $commande[1] : 0;

                    echo '<tr>
                        <th scope="row" class="text-center">' . ($index + 1) . '</th>
                        <td class="text-center">' . htmlspecialchars($produit) . '</td>
                        <td class="text-center">' . htmlspecialchars($quantite) . '</td>
                        <td class="text-center">' . htmlspecialchars($total) . '</td>
                        <td class="text-center"><button class="btn btn-danger">Supprimer</button></td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-end">
        <button class="btn btn-success">Valider</button>
    </div>
</div>

<footer class="bg-dark text-center text-white p-3 mt-4">
    <p>Tous les droits réservés</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
