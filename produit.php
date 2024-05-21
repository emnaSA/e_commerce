<?php
include "inc/function.php";
$categories = getAllCategories();
if (isset($_GET['id'])){
    $produit = getProduitById($_GET['id']);

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

<div class="row col-12 mt-4">
  <div class="card col-8 offset-2">
     <img src="images/<?php echo $produit ['image'] ?>" class="card-img-top" alt="...">
     <div class="card-body">
     <h5 class="card-title"><?php echo $produit ['nom'] ?></h5>
    <p class="card-text"><?php echo $produit ['description'] ?> </p>
   </div>
   <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $produit['prix'] ?>DT</li>
    <?php 
        foreach($categories as $index => $c){
            if ($c['id']==$produit['categorie']){

print ' <button class="btn btn-success mb-2">'.$c['nom'].'</button>';
 
            }

        }
    ?>
   </ul>
   <div>
    <form action="actions/commander.php" method="POST">
        <input type="hidden" value="<?php echo $produit ['id'] ?>" name="produit">
        <input type="number"class="form-control" name="quantite"step="1"placeholder="Quantité du produit...">
    <button type="submit" class="btn btn-primary">Commander</button>

    </form>
   </div>
   
</div>
    
   
</div>
<footer class="bg-dark text-center text-white p-5 mt-4">
    <p>Tous les droits réservés</p>
</footer>

<!-- Bootstrap JS -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
