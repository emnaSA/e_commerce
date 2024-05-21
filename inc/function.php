<?php


//fcntion conncter bch matb9ch dima tet3wd
function connect(){
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "ecommerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connecté avec succès";
    } catch(PDOException $e) {
        echo "Échec de la connexion : " . $e->getMessage();
    }
    return $conn;

}
function getAllCategories(){
    // Connexion à la base de données
    $conn=connect();

    // Création de la requête
    $requette = "SELECT * FROM categories";

    // Exécution de la requête
    $resultat = $conn->query($requette);

    // Résultat de la requête
    $categories = $resultat->fetchAll();
    return $categories;
}

// Fonction pour récupérer tous les produits
function getAllProducts(){
    // Connexion à la base de données
    $conn=connect();

    // Création de la requête
    $requette = "SELECT * FROM produit";

    // Exécution de la requête
    $resultat = $conn->query($requette);

    // Résultat de la requête
    $produit = $resultat->fetchAll();
    return $produit;
}

// Fonction pour rechercher des produits par mots-clés
function SearchProduits($Keywords){
    // Connexion à la base de données
    $conn=connect();
    // Création de la requête
    $requette = "SELECT * FROM produit WHERE nom LIKE '%$Keywords%'";

    // Exécution de la requête
    $resultat = $conn->query($requette);

    // Résultat de la requête
    $produit = $resultat->fetchAll();
    return $produit;
}
function getProduitById($id){
    // Connexion à la base de données
    $conn = connect();
    // Création de la requête
    $requette = "SELECT * FROM produit WHERE id=$id";
    // Exécution de la requête
    $resultat = $conn->query($requette);
     // Résultat de la requête
     $produit = $resultat->fetch();
     return $produit;

}
// Fonction pour ajouter un visiteur
function AddVisiteur($data){
    $conn = connect();
    $mphash=md5($data['mp']);
    $requete = "INSERT INTO visiteurs(nom, prenom, email, mp, telephone) VALUES ('".$data['nom']."', '".$data['prenom']."','".$data['email']."', '".$mphash."', '".$data['telephone']."')";

    $resultat = $conn->query($requete);
    if ($resultat){
        return true;
    } else {
        return false;
    }
}
///function connexion
function ConnectVisiteur($data){
    $conn = connect();
    $email = $data['email'];
    $mp =md5($data['mp']);
    
    // Utilisation d'une requête préparée avec des paramètres liés
    $requete = "SELECT * FROM visiteurs WHERE email = '$email' AND mp = '$mp'";
    $resultat=$conn->query($requete);
    $user = $resultat->fetch();
    return $user;
}
function connectAdmin($data){
    $conn = connect();
    $email = $data['email'];
    $mp =md5($data['mp']);

    // Utilisation d'une requête préparée avec des paramètres liés
    $requete = "SELECT * FROM administrateur WHERE email = '$email' AND mp = '$mp'";
    $resultat=$conn->query($requete);
    $user = $resultat->fetch();
    return $user;
}
function getAllUsers(){
    $conn = connect();
    $requete = "SELECT * FROM visiteurs WHERE etat = 0";
    $resultat=$conn->query($requete);
    $users=$resultat->fetchAll();
    return $users;
}
//function getStocks(){
  //  $conn = connect();
    //$requete = "SELECT s.id,p.nom,s.quantite FROM produit,p,stock.s WHERE produit.id=stocks.id";
    //$resultat=$conn->query($requete);
    //$stocks=$resultat->fetchAll();
    //return $stocks;

//}
function getStocks() {
    $conn = connect();
    $requete = "SELECT s.id, p.nom, s.quantite 
                FROM stocks s 
                JOIN produit p ON s.produit = p.id";
    $resultat = $conn->query($requete);
    $stocks = $resultat->fetchAll(PDO::FETCH_ASSOC);
    return $stocks;
}

?>
