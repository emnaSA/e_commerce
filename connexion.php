<?php
Session_start();

if (isset($_SESSION['nom'])){
  header('location:profil.php');

}
include "inc/function.php";
$user = true;
$categories = getAllCategories();
if (!empty($_POST)) {    // click sur le bouton sauvegarder

    $user = ConnectVisiteur($_POST);
    if (count($user) > 0 ) { // Vérifiez si $user est un tableau non vide
        Session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['mp'] = $user['mp'];
        $_SESSION['telephone'] = $user['telephone'];

        header('location:profil.php'); // redirection vers la page profile
    } 
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.8/sweetalert2.min.css">

  </head>
<body>
    
<?php
include "inc/header.php";
?>


<div class="col-12 p-5">
    <h1 class="text-center">Connexion</h1>
    <form action="connexion.php" method="post">
        <div class="mb-3 ">

          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email"name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
          </div>
    
        <button type="submit" class="btn btn-primary">Connecter</button>
      </form>

</div>



<!---footer-->
<div class="bg-dark text-center p-5 mt-5">
    <p class="text-white"> Tous les droits réservées</p>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
<?php
if(!$user){
    print"

<script>
Swal.fire({
  title: 'Erreur',
  text: 'Vérifier votre cordonnes',
  type: 'Erreur',
  confirmButtonText: 'OK',
  timer:2000
})

</script>
";
}

?>
</html>
