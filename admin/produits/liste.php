
<?php
session_start();
include "../../inc/function.php";
$categories = getAllCategories(); 
$produit=getAllProducts();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>ADMIN : profile </title>
 
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Déconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php
      include "../template/navigation.php";

      ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des Produits</h1>
           

            <div>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ajouter</a>
           
            </div>
            
    
          </div>

           <!-- liste start -->
           <div>
                    <?php
                    if (isset($_GET['ajout'])&& $_GET['ajout'] =="ok"){
                      print'       <div class="alert alert-success">
                      Produits Ajouter avec succes
        
                    </div>';
                    }
                    ?>
            
                    
                    <?php
                    if (isset($_GET['delete'])&& $_GET['delete'] =="ok"){
                      print'       <div class="alert alert-success">
                      Produits Supprimer avec succes
        
                    </div>';
                    }
                    ?>
                    <?php
                    if (isset($_GET['modifier'])&& $_GET['modifier'] =="ok"){
                      print'       <div class="alert alert-success">
                     Produits modifier avec succes
        
                    </div>';
                    }
                    ?>       
                    
          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
   
     foreach($produit as $i =>$p){
     $i++; 
      print'     <tr>
      <th scope="row">'.$i.'</th>
      <td>'.$p['nom'].'</td>
      <td>'.$p['description'].'</td>
      <td>
        <a data-bs-toggle="modal" data-bs-target="#editModal'.$p['id'].'" class="btn btn-success">Modifier</a>
        <a href="http:supprimer.php?idc='.$p['id'].'" class="btn btn-danger">Supprimer</a>
      </td>
    </tr>';
    }
    ?>
  </tbody>
</table>
            </div>   
        </main>
      </div>
    </div>
            </div>   
        </main>
      </div>
    </div>


<!-- Modal ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout produits</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="post" enctype="multipart/form-data">

          <div class="form-group mb-2">
            <input type="text" name="nom" class="form-control" placeholder="nom de produits ...">
          </div>

          <div class="form-group mb-2">
          
            <textarea  name="description" class="form-control" placeholder="description de produits ..."></textarea>
          </div>

          <div class="form-group mb-2">
            <input type="number" step="0.01" name="prix" class="form-control" placeholder="prix de produits ...">
          </div>
          <div class="form-group mb-2">
            <input type="file" name="image" class="form-control" placeholder="image de produits ...">
          </div>
          <div class="form-group mb-2">
            <select name="categorie" class="form-control" >
              <?php
              foreach($categories as $index =>$c)
              print '<option value="'.$c['id'].'">'.$c['nom'].'</option>';
              ?>
              
            </select>
          </div>
            <div class="form-group mb-2 ">
              <input type="number" name="quantite" class="form-control"placeholder="Taper la quantité de produits">
              </div>
  </div>


      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
foreach($categories as $index =>$categorie){ ?>

<!-- Modal modifier -->
<div class="modal fade" id="editModal<?php echo $categorie['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier categorie</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="modifier.php" method="post">
            <input type="hidden" value="<?php echo $categorie['id'];?>"name="idc" />

          <div class="form-group">
            <input type="text" name="nom" class="form-control" value="<?php echo $categorie['nom'];?>"placeholder="nom de categorie ...">
          </div>

          <div class="form-group">

            <textarea  name="description" class="form-control "placeholder="description de categorie ..."><?php echo $categorie['description'];?></textarea>
          </div>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php
}

?>

    <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
  <!-- Graphs -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
  <script>
    // JavaScript pour afficher le modal lorsque le bouton "ajouter" est cliqué
    document.getElementById('ajouterBtn').addEventListener('click', function() {
      $('#exampleModal').modal('hide'); // Masquer le modal "exampleModal" s'il est déjà ouvert
    });

    // JavaScript pour afficher le modal lorsque le bouton "demo" est cliqué
    document.getElementById('demoBtn').addEventListener('click', function() {
      $('#exampleModal').modal('show'); // Afficher le modal "exampleModal"
    });
  </script>

  </body>
</html>