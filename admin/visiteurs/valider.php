<?php
$idvisiteur = $_GET['id'];
//2_ la chaine de connexion
include "../../inc/function.php";
$conn = connect();
$_requette="UPDATE visiteurs SET etat=1 where id ='$idvisiteur'";
$result=$conn ->query($_requette);
if ($result){
    header('location:liste.php?valider=ok');

}else{
    echo "Erreur de validation ";
}
?>