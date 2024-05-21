<?php
session_start();
include "inc/function.php";
$categories = getAllCategories();


if (!empty($_POST)){

    //echo "button search clicked"; ntasti behom mlowl
    //echo $_POST['search'];ntasti behom mlowl

    $produit = SearchProduits($_POST['search']);
}else{
    $produit = getAllProducts();

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
    
<?php
include "inc/header.php";
?>

<div class="row col-12">
    <?php
    foreach ($produit as $prod) {
        echo '<div class="col-3">
        <div class="card" style="width: 18rem;">
        <img src="./images/'.$prod['image'].'" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">' . $prod['nom'] . '</h5>
            <p class="card-text">' . $prod['description'] . '</p>
            <a href="produit.php?id=' . $prod['id'] . '" class="btn btn-primary">Afficher</a>
            </div>
        </div>
    </div>';
    }
    ?>
</div>

   
</div>
<footer class="bg-dark text-center text-white p-5 mt-4">
    <p>Tous les droits réservés</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
