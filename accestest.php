<?php
$servername = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "ecommerce";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connecté avec succès";
} catch(PDOException $e) {
  echo "Échec de la connexion : " . $e->getMessage();
}
?>
