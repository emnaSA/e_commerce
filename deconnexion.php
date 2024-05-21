<?php
//deconnexion lel compte
session_start();
session_unset();
session_destroy();
header('location:index.php');
?>