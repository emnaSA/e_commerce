<?php
session_start(); // Démarre la session ou restaure la session existante
if (!isset($_SESSION['nom'])){
    header('location:connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "inc/header.php"; ?>
    <h1>Bienvenue <span class="text-primary"><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></span></h1>
    <h2>Email : <?php echo $_SESSION['email'] ; ?> </h2>
    <!----a href="deconnexion.php" class="btn btn-primary">Déconnexion</a---->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
