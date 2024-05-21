
<?php
Session_start();

if (isset($_SESSION['nom'])){
  header('location:profil.php');

}
include "inc/function.php";
$showRegistrationAlert = 0;
$categories = getAllCategories();
if (!empty($_POST)){    // click sur le boton sauvgarder

   if(AddVisiteur($_POST)){//traj3 true or false ki ytzed user
    $showRegistrationAlert = 1;
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



    <!-- Formulaire d'inscription -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Registre</h1>
                <form action="registre.php"method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name='nom' class="form-control" id="nom">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" name='prenom' class="form-control" id="prenom">
                    </div>
                    <div class="mb-3">
                        <label for="tele" class="form-label">Téléphone</label>
                        <input type="text" name='telephone' class="form-control" id="tele">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password"name='mp'  class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Pied de page -->
    <div class="bg-dark text-center p-5 mt-5">
        <p class="text-white">Tous les droits réservés</p>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
<?php
if($showRegistrationAlert==1){
    print"

<script>
Swal.fire({
  title: 'Success',
  text: 'creation de compte avec succes',
  type: 'success',
  confirmButtonText: 'OK',
  timer:2000
})

</script>
";
}

?>
</html>